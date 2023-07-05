<?php

declare(strict_types=1);

namespace Amineabri\StreetGroup\Parsers;

use Amineabri\StreetGroup\EntryParser;
use Amineabri\StreetGroup\Models\Person;

final class TitleNameAndTitleNameParser implements EntryParser
{
    private string $pattern = "/([a-zA-Z]+)\s+([a-zA-Z]+)\s+([a-zA-Z]+)/";
    public function parseEntry(string $entry): Person|array|null
    {
        // Split the string into separate entries
        $entries = preg_split("/\s+and\s+|\s*,\s*/i", $entry);

        $persons = [];
        foreach ($entries as $singleEntry) {

            if (preg_match($this->pattern, $singleEntry, $matches)) {
                $persons[] = new Person($matches[1], $matches[2], '', $matches[3]);
            }
        }

        if (empty($persons)) {
            return null;
        }

        return count($persons) > 1 ? $persons : $persons[0];
    }
}
