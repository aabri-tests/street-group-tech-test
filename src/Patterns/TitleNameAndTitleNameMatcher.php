<?php

declare(strict_types=1);

namespace Amineabri\StreetGroup\Patterns;

use Amineabri\StreetGroup\EntryMatcher;

final class TitleNameAndTitleNameMatcher implements EntryMatcher
{
    private string $pattern = '/(?:Mr|Mrs|Ms|Mister|Prof|Dr)\s[A-Za-z]+\s[A-Za-z]+\s(?:and|&)\s(?:Mr|Mrs|Ms|Mister|Prof|Dr)\s[A-Za-z]+\s[A-Za-z]+/i'; // Mr Tom Staff and Mr John Doe
    public function matchEntry(string $entry): bool
    {
        return preg_match($this->pattern, $entry) === 1;
    }
}
