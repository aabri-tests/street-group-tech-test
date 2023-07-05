<?php

	namespace Unit\Patterns;

	use Amineabri\StreetGroup\Patterns\InitialLastNameMatcher;
	use Amineabri\StreetGroup\Patterns\TitleAndMrsLastNameMatcher;
	use Amineabri\Tests\TestCase;

	final class TitleAndMrsLastNameMatcherTest extends TestCase {
		public function testMatchEntryWithValidEntry(): void {
			$matcher = new TitleAndMrsLastNameMatcher;
			$entry = 'Mr and Mrs Smith';

			$result = $matcher->matchEntry($entry);

			$this->assertTrue($result);
		}

		public function testMatchEntryWithInvalidEntry(): void {
			$matcher = new TitleAndMrsLastNameMatcher;
			$entry = 'Invalid Entry';

			$result = $matcher->matchEntry($entry);

			$this->assertFalse($result);
		}
	}