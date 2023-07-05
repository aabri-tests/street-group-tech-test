<?php

	namespace Unit\Parsers;

	use Amineabri\StreetGroup\Models\Person;
	use Amineabri\StreetGroup\Parsers\TitleNameAndTitleNameParser;
	use Amineabri\Tests\TestCase;

	final class TitleNameAndTitleNameParserTest extends TestCase {
		public function testParseEntryWithValidEntry(): void {
			$parser = new TitleNameAndTitleNameParser;
			$entry = 'Mr John Smith and Mrs Jane Doe';

			$expectedPersons = [
				new Person('Mr', 'John', '', 'Smith'),
				new Person('Mrs', 'Jane', '', 'Doe'),
			];

			$result = $parser->parseEntry($entry);

			$this->assertEquals($expectedPersons, $result);
		}

		public function testParseEntryWithInvalidEntry(): void {
			$parser = new TitleNameAndTitleNameParser;
			$entry = 'Invalid Entry';

			$result = $parser->parseEntry($entry);

			$this->assertNull($result);
		}
	}