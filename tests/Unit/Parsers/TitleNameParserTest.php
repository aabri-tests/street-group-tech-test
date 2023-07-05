<?php

	namespace Unit\Parsers;

	use Amineabri\StreetGroup\Models\Person;
	use Amineabri\StreetGroup\Parsers\TitleNameParser;
	use Amineabri\Tests\TestCase;

	final class TitleNameParserTest extends TestCase {
		public function testParseEntryWithValidEntry(): void {
			$parser = new TitleNameParser;
			$entry = 'Mr John Smith';

			$expectedPerson = new Person('Mr', 'John', null, 'Smith');

			$result = $parser->parseEntry($entry);

			$this->assertEquals($expectedPerson, $result);
		}

		public function testParseEntryWithInvalidEntry(): void {
			$parser = new TitleNameParser;
			$entry = 'Invalid Entry';

			$result = $parser->parseEntry($entry);

			$this->assertNull($result);
		}
	}