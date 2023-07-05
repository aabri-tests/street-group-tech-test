<?php

	namespace Unit\Processors;

	use Amineabri\StreetGroup\Exceptions\InvalidParserException;
	use Amineabri\StreetGroup\Exceptions\InvalidPatternException;
	use Amineabri\StreetGroup\Models\Person;
	use Amineabri\StreetGroup\Processors\EntryProcessor;
	use Amineabri\Tests\TestCase;

	final class EntryProcessorTest extends TestCase {
		/**
		 * @throws InvalidPatternException
		 */
		public function testFindMatchingPatternWithValidEntry(): void {
			$processor = new EntryProcessor;
			$entry = 'Mr John Smith';
			$groups = ['pattern1', 'pattern2'];

			$result = $processor->findMatchingPattern($entry, $groups);

			$this->assertEquals('pattern1', $result);
		}

		/**
		 * @throws InvalidPatternException
		 */
		public function testFindMatchingPatternWithInvalidEntry(): void {
			$processor = new EntryProcessor;
			$entry = 'Invalid Entry';
			$groups = ['pattern1', 'pattern2'];

			$result = $processor->findMatchingPattern($entry, $groups);

			$this->assertNull($result);
		}

		/**
		 * @throws InvalidParserException
		 */
		public function testProcessEntryWithValidEntry(): void {
			$processor = new EntryProcessor;
			$entry = 'Mr John Smith';
			$patternName = 'pattern1';

			$result = $processor->processEntry($entry, $patternName);

			$this->assertCount(1, $result);
			$this->assertInstanceOf(Person::class, $result[0]);
		}
	}