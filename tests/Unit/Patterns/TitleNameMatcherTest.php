<?php

	namespace Unit\Patterns;

	use Amineabri\StreetGroup\Patterns\TitleNameMatcher;
	use Amineabri\Tests\TestCase;

	final class TitleNameMatcherTest extends TestCase {
		public function testMatchEntryWithValidEntry(): void {
			$matcher = new TitleNameMatcher;
			$entry = 'Mr John Smith';

			$result = $matcher->matchEntry($entry);

			$this->assertTrue($result);
		}

		public function testMatchEntryWithInvalidEntry(): void {
			$matcher = new TitleNameMatcher;
			$entry = 'Invalid Entry';

			$result = $matcher->matchEntry($entry);

			$this->assertFalse($result);
		}
	}