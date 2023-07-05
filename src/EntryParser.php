<?php

declare(strict_types=1);

namespace Amineabri\StreetGroup;

use Amineabri\StreetGroup\Models\Person;

interface EntryParser
{
    public function parseEntry(string $entry): Person|array|null;
}
