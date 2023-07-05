<?php

	namespace Unit\Parsers;

	use Amineabri\StreetGroup\Models\Person;
	use Amineabri\StreetGroup\Parsers\TitleAndMrsLastNameParser;
	use Amineabri\Tests\TestCase;

	final class TitleAndMrsLastNameParserTest extends TestCase {
		/**
		 * @dataProvider validEntryProvider
		 */
		public function testParseEntryWithValidEntry(string $entry, array $expectedPersons): void {
			$parser = new TitleAndMrsLastNameParser();

			$result = $parser->parseEntry($entry);

			$this->assertEquals($expectedPersons, $result);
		}

		/**
		 * @dataProvider invalidEntryProvider
		 */
		public function testParseEntryWithInvalidEntry(string $entry): void {
			$parser = new TitleAndMrsLastNameParser();

			$result = $parser->parseEntry($entry);

			$this->assertNull($result);
		}

		public static function validEntryProvider(): array {
			return [
				[
					'Dr & Mrs Joe Bloggs',
					[
						new Person('Dr', 'Joe', '', 'Bloggs'),
						new Person('Mrs', 'Joe', '', 'Bloggs'),
					]
				],
				[
					'Mr and Mrs Smith',
					[
						new Person('Mr', '', '', 'Smith'),
						new Person('Mrs', '', '', 'Smith'),
					]
				],
				// ...
			];
		}

		public static function invalidEntryProvider(): array {
			return [
				['Invalid Entry 1'],
				['Invalid Entry 2'],
			];
		}
	}