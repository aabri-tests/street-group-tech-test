<?php

declare(strict_types=1);

namespace Amineabri\StreetGroup\Parsers;

use Amineabri\StreetGroup\EntryParser;
use Amineabri\StreetGroup\Models\Person;

final class TitleAndMrsLastNameParser implements EntryParser
{
    private string $pattern = "/^((?:[a-zA-Z]+\s*(?:&|and)\s*)*[a-zA-Z]+)\s+([a-zA-Z]+(?:\s+[a-zA-Z]+)?)$/";
    public function parseEntry(string $entry): Person|array|null
    {
        // Split the string into separate entries
        $entries = preg_split("/\s*,\s*/", $entry);

        $persons = [];
        foreach ($entries as $singleEntry) {
            // Split the entry into title(s) and name(s)
            if (preg_match($this->pattern, $singleEntry, $matches)) {
                $titles = preg_split("/\s*&\s*|\s+and\s+/", $matches[1]);
                $names = preg_split("/\s+/", $matches[2]);
                if (count($names) == 1) { // only last name
                    foreach ($titles as $title) {
                        $persons[] = new Person($title, '', '', $names[0]);
                    }
                } elseif (count($names) == 2) { // first name and last name
                    foreach ($titles as $title) {
                        $persons[] = new Person($title, $names[0], '', $names[1]);
                    }
                }
            }
        }

        if (empty($persons)) {
            return null;
        }

        return count($persons) > 1 ? $persons : $persons[0];
    }
}
