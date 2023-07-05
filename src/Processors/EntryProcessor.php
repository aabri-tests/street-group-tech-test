<?php

declare(strict_types=1);

namespace Amineabri\StreetGroup\Processors;

use Amineabri\StreetGroup\Exceptions\InvalidParserException;
use Amineabri\StreetGroup\Exceptions\InvalidPatternException;
use Amineabri\StreetGroup\Factories\MatcherFactory;
use Amineabri\StreetGroup\Factories\ParserFactory;
use Amineabri\StreetGroup\Models\Person;

final class EntryProcessor
{
    /**
     * @throws InvalidPatternException
     */
    public function findMatchingPattern($entry, $groups)
    {
        foreach ($groups as $patternName) {
            $matcher = MatcherFactory::createMatcher($patternName);

            if ($matcher->matchEntry($entry)) {
                return $patternName;
            }
        }

        return null;
    }

    /**
     * @throws InvalidParserException
     */
    public function processEntry(string $entry, string $patternName): Person|array
    {
        $parser = ParserFactory::createParser($patternName);
        $parsedData = $parser->parseEntry($entry);

        if (is_array($parsedData)) {
            return $parsedData;
        } else {
            return [$parsedData];
        }
    }
}
