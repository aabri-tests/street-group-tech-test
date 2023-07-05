<?php

	namespace Unit\Parsers;

	use Amineabri\StreetGroup\Models\Person;
	use Amineabri\StreetGroup\Parsers\InitialLastNameParser;
	use Amineabri\Tests\TestCase;

	final class InitialLastNameParserTest extends TestCase {
		public function testParseEntryWithValidEntry(): void {
			$parser = new InitialLastNameParser;
			$entry = 'John D. Doe';
			$expectedPerson = new Person('John', null, 'D', 'Doe');

			$result = $parser->parseEntry($entry);

			$this->assertEquals($expectedPerson, $result);
		}

		public function testParseEntryWithInvalidEntry(): void {
			$parser = new InitialLastNameParser();
			$entry = 'Invalid Entry';

			$result = $parser->parseEntry($entry);

			$this->assertNull($result);
		}
	}