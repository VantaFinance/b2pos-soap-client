<?php

declare(strict_types=1);

namespace Vanta\Integration;

use UnexpectedValueException;

/**
 * @param  array<int|string, mixed> $subject
 * @return array<int|string, mixed>
 */
function arrayReplaceValueRecursive(array $subject, string $search, ?string $replace): array
{
    foreach ($subject as &$subjectItem) {
        if (is_array($subjectItem)) {
            $subjectItem = arrayReplaceValueRecursive($subjectItem, $search, $replace);
        }

        if ($search === $subjectItem) {
            $subjectItem = $replace;
        }
    }

    return $subject;
}

/**
 * При subject = [
 *   'a' => [
 *     'b' => [
 *       'c' => 'd',
 *     ],
 *   ],
 * ]
 * и $keyItemList = ['a', 'b', 'c'] удалит 'c'
 *
 * @param  array<int|string, mixed>     $subject
 * @param  non-empty-array<int, string> $keyItemList
 * @return array<int|string, mixed>
 */
function arrayRemoveValueByDynamicKey(array $subject, array $keyItemList): array
{
    $keyItem = array_shift($keyItemList);
    if (count($keyItemList) > 0) {
        if (!array_key_exists($keyItem, $subject)) {
            throw new UnexpectedValueException(sprintf('Key item %s not exists in subject %s', $keyItem, var_export($subject, true)));
        }

        /* @phpstan-ignore-next-line */
        $subject[$keyItem] = arrayRemoveValueByDynamicKey($subject[$keyItem], $keyItemList);

        return $subject;
    }

    unset($subject[$keyItem]);

    return $subject;
}
