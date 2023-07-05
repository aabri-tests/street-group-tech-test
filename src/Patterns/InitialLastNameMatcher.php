<?php

declare(strict_types=1);

namespace Amineabri\StreetGroup\Patterns;

use Amineabri\StreetGroup\EntryMatcher;

final class InitialLastNameMatcher implements EntryMatcher
{
    private string $pattern = '/^(?:Mr|Mrs|Ms|Mister|Prof|Dr)\s+[A-Z](?:\.[A-Z]|\.)?\s[A-Za-z]+$/i'; // Mr F. Fredrickson || Mr F Fredrickson
    public function matchEntry(string $entry): bool
    {
        return preg_match($this->pattern, $entry) === 1;
    }
}
