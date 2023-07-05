<?php

declare(strict_types=1);

namespace Amineabri\StreetGroup\Parsers;

use Amineabri\StreetGroup\EntryParser;
use Amineabri\StreetGroup\Models\Person;

final class InitialLastNameParser implements EntryParser
{
    private string $pattern = "/([a-zA-Z]+)\s+([a-zA-Z])\.?\s+([a-zA-Z]+)/";
    public function parseEntry(string $entry): ?Person
    {
        if(preg_match($this->pattern, $entry, $matches)) {
            return new Person($matches[1], null, $matches[2], $matches[3]);
        }

        return null;
    }
}
