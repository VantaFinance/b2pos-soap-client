<?php

declare(strict_types=1);

namespace Vanta\Integration;

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
