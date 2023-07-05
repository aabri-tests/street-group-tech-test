<?php

declare(strict_types=1);

namespace Amineabri\StreetGroup\Factories;

use Amineabri\StreetGroup\EntryParser;
use Amineabri\StreetGroup\Exceptions\InvalidParserException;
use Amineabri\StreetGroup\Parsers\InitialLastNameParser;
use Amineabri\StreetGroup\Parsers\TitleAndMrsLastNameParser;
use Amineabri\StreetGroup\Parsers\TitleNameAndTitleNameParser;
use Amineabri\StreetGroup\Parsers\TitleNameParser;

final class ParserFactory
{
    /**
     * @throws InvalidParserException
     */
    public static function createParser(string $patternName): EntryParser
    {
        return match ($patternName) {
            'pattern1' => new TitleNameParser(),
            'pattern2' => new InitialLastNameParser(),
            'pattern3' => new TitleAndMrsLastNameParser(),
            'pattern4' => new TitleNameAndTitleNameParser(),
            default => throw new InvalidParserException("Invalid pattern name: $patternName"),
        };
    }
}
