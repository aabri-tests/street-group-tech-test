<?php

declare(strict_types=1);

namespace Amineabri\StreetGroup;

interface EntryMatcher
{
    public function matchEntry(string $entry): bool;
}
