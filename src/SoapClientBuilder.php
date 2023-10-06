<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient;

use Doctrine\Common\Annotations\AnnotationReader;
use Psr\Http\Client\ClientInterface as PsrHttpClient;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyInfo\Extractor\ConstructorExtractor;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\BackedEnumNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\Serializer as SerializerSymfony;
use Vanta\Integration\B2posSoapClient\Client\LoanAgreement\SoapLoanAgreementClient;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\SoapLoanApplicationClient;
use Vanta\Integration\B2posSoapClient\Client\LoanProduct\SoapLoanProductClient;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\ConfigurationClient;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\HttpClient;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Middleware\ClientErrorMiddleware;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Middleware\InternalServerMiddleware;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Middleware\Middleware;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Middleware\PipelineMiddleware;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Middleware\UrlMiddleware;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\Base64Normalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\CountryIsoNormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\DivisionCodeNormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\EmailNormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\MoneyPositiveOrZeroNormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\NumericStringDenormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\ObjectDenormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\PhoneNumberNormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\RequestNormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\ResponseContentReportsErrorDenormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\RussianPassportDocumentNormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\RussianPassportNumberNormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\RussianPassportSeriesNormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\XmlSerializer;

final class SoapClientBuilder
{
    private readonly XmlSerializer $serializer;

    private readonly PsrHttpClient $client;

    /**
     * @var non-empty-string
     */
    private readonly string $url;

    /**
     * @var non-empty-array<int, Middleware>
     */
    private readonly array $middlewares;

    /**
     * @param non-empty-string       $url
     * @param array<int, Middleware> $middlewares
     */
    private function __construct(
        XmlSerializer $serializer,
        PsrHttpClient $client,
        string $url = 'https://api.b2pos.ru',
        array $middlewares = [],
    ) {
        $this->serializer  = $serializer;
        $this->client      = $client;
        $this->url         = $url;
        $this->middlewares = array_merge($middlewares, [
            new UrlMiddleware(),
            new ClientErrorMiddleware(),
            new InternalServerMiddleware(),
        ]);
    }

    /**
     * @param numeric-string   $userId
     * @param non-empty-string $userToken
     */
    public static function create(PsrHttpClient $client, string $userId, string $userToken): self
    {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));

        $phpDocExtractor = new PhpDocExtractor();
        $typeExtractor   = new PropertyInfoExtractor(
            typeExtractors: [new ConstructorExtractor([$phpDocExtractor]), $phpDocExtractor]
        );

        $objectNormalizer = new ObjectNormalizer(
            classMetadataFactory: $classMetadataFactory,
            propertyTypeExtractor: $typeExtractor,
        );

        $propertyAccessor  = PropertyAccess::createPropertyAccessor();
        $serializerSymfony = new SerializerSymfony(
            [
                new PhoneNumberNormalizer(),
                new MoneyPositiveOrZeroNormalizer(),
                new RussianPassportDocumentNormalizer(),
                new CountryIsoNormalizer(),
                new DivisionCodeNormalizer(),
                new RussianPassportNumberNormalizer(),
                new RussianPassportSeriesNormalizer(),
                new EmailNormalizer(),
                new Base64Normalizer(),
                new BackedEnumNormalizer(),
                new DateTimeNormalizer(),
                new ResponseContentReportsErrorDenormalizer(),
                new UnwrappingDenormalizer(),
                new NumericStringDenormalizer(),
                new ArrayDenormalizer(),
                new RequestNormalizer(
                    $objectNormalizer,
                    $propertyAccessor,
                    $userId,
                    $userToken,
                ),
                new ObjectDenormalizer(
                    $objectNormalizer,
                    $propertyAccessor,
                ),
                $objectNormalizer,
            ],
            [
                new XmlEncoder(),
            ],
        );

        $serializer = new XmlSerializer($serializerSymfony);

        return new self($serializer, $client);
    }

    public function withSerializer(XmlSerializer $serializer): self
    {
        return new self(
            $serializer,
            $this->client,
            $this->url,
            $this->middlewares,
        );
    }

    public function withClient(PsrHttpClient $client): self
    {
        return new self(
            $this->serializer,
            $client,
            $this->url,
            $this->middlewares,
        );
    }

    /**
     * @param non-empty-string $url
     */
    public function withUrl(string $url): self
    {
        return new self(
            $this->serializer,
            $this->client,
            $url,
            $this->middlewares,
        );
    }

    /**
     * @param non-empty-array<int, Middleware> $middlewares
     */
    public function withMiddlewares(array $middlewares): self
    {
        return new self(
            $this->serializer,
            $this->client,
            $this->url,
            $middlewares,
        );
    }

    public function addMiddleware(Middleware $middleware): self
    {
        return new self(
            $this->serializer,
            $this->client,
            $this->url,
            array_merge($this->middlewares, [$middleware]),
        );
    }

    public function createLoanProductClient(): LoanProductClient
    {
        return new SoapLoanProductClient(
            $this->serializer,
            new HttpClient(
                new ConfigurationClient($this->url),
                new PipelineMiddleware($this->middlewares, $this->client),
            ),
        );
    }

    public function createLoanApplicationClient(): LoanApplicationClient
    {
        return new SoapLoanApplicationClient(
            $this->serializer,
            new HttpClient(
                new ConfigurationClient($this->url),
                new PipelineMiddleware($this->middlewares, $this->client),
            ),
        );
    }

    public function createLoanAgreementClient(): LoanAgreementClient
    {
        return new SoapLoanAgreementClient(
            $this->serializer,
            new HttpClient(
                new ConfigurationClient($this->url),
                new PipelineMiddleware($this->middlewares, $this->client),
            ),
        );
    }
}
