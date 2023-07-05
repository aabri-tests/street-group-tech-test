<?php

declare(strict_types=1);

namespace Amineabri\StreetGroup\Patterns;

use Amineabri\StreetGroup\EntryMatcher;

final class TitleAndMrsLastNameMatcher implements EntryMatcher
{
    private string $pattern = '/^(?:Mr|Mrs|Ms|Mister|Prof|Dr)\s+(?:and|&)\s+Mrs\s+[A-Za-z]+\b/i'; // Mr and Mrs Smith
    public function matchEntry(string $entry): bool
    {
        return preg_match($this->pattern, $entry) === 1;
    }
}
