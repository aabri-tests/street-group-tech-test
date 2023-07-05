<?php

declare(strict_types=1);

namespace Amineabri\StreetGroup\Patterns;

use Amineabri\StreetGroup\EntryMatcher;

final class TitleNameMatcher implements EntryMatcher
{
    private string $pattern = '/^(Mr|Mrs|Ms|Mister|Prof|Dr)\s+\b\w{2,}\b(\s+\w+(-\w+)*)$/i'; // Mr John Smith
    public function matchEntry(string $entry): bool
    {
        return preg_match($this->pattern, $entry) === 1;
    }
}
