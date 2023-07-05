<?php

declare(strict_types=1);

namespace Amineabri\StreetGroup\Parsers;

use Amineabri\StreetGroup\EntryParser;
use Amineabri\StreetGroup\Models\Person;

final class TitleNameParser implements EntryParser
{
    private string $pattern = '/^(Mr|Mrs|Ms|Mister|Prof|Dr)\s+(\b\w{2,}\b)(\s+\w+(-\w+)*)$/i';
    public function parseEntry(string $entry): ?Person
    {
        if (preg_match($this->pattern, $entry, $matches)) {
            $title = $matches[1];
            $firstName = $matches[2];
            $lastName = str_replace(' ', '', $matches[3]);

            return new Person($title, $firstName, null, $lastName);
        }

        return null;
    }
}
