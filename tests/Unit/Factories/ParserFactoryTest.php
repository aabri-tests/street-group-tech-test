<?php

	namespace Unit\Factories;

	use Amineabri\StreetGroup\Exceptions\InvalidParserException;
	use Amineabri\StreetGroup\Factories\ParserFactory;
	use Amineabri\StreetGroup\Parsers\InitialLastNameParser;
	use Amineabri\StreetGroup\Parsers\TitleAndMrsLastNameParser;
	use Amineabri\StreetGroup\Parsers\TitleNameAndTitleNameParser;
	use Amineabri\StreetGroup\Parsers\TitleNameParser;
	use Amineabri\Tests\TestCase;

	final class ParserFactoryTest extends TestCase  {
		/**
		 * @throws InvalidParserException
		 */
		public function testCreateParserWithValidPatternName(): void {
			$parser1 = ParserFactory::createParser('pattern1');
			$parser2 = ParserFactory::createParser('pattern2');
			$parser3 = ParserFactory::createParser('pattern3');
			$parser4 = ParserFactory::createParser('pattern4');

			$this->assertInstanceOf(TitleNameParser::class, $parser1);
			$this->assertInstanceOf(InitialLastNameParser::class, $parser2);
			$this->assertInstanceOf(TitleAndMrsLastNameParser::class, $parser3);
			$this->assertInstanceOf(TitleNameAndTitleNameParser::class, $parser4);
		}

		public function testCreateParserWithInvalidPatternName(): void {
			$this->expectException(InvalidParserException::class);
			$this->expectExceptionMessage("Invalid pattern name: pattern5");

			ParserFactory::createParser('pattern5');
		}
	}