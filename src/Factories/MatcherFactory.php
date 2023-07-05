<?php

declare(strict_types=1);

namespace Amineabri\StreetGroup\Factories;

use Amineabri\StreetGroup\EntryMatcher;
use Amineabri\StreetGroup\Exceptions\InvalidPatternException;
use Amineabri\StreetGroup\Patterns\InitialLastNameMatcher;
use Amineabri\StreetGroup\Patterns\TitleAndMrsLastNameMatcher;
use Amineabri\StreetGroup\Patterns\TitleNameAndTitleNameMatcher;
use Amineabri\StreetGroup\Patterns\TitleNameMatcher;

final class MatcherFactory
{
    /**
     * @throws InvalidPatternException
     */
    public static function createMatcher(string $patternName): EntryMatcher
    {
        return match ($patternName) {
            'pattern1' => new TitleNameMatcher(),
            'pattern2' => new InitialLastNameMatcher(),
            'pattern3' => new TitleAndMrsLastNameMatcher(),
            'pattern4' => new TitleNameAndTitleNameMatcher(),
            default => throw new InvalidPatternException("Invalid pattern name: $patternName"),
        };
    }
}
