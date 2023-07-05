<?php

	namespace Unit\Patterns;

	use Amineabri\StreetGroup\Patterns\TitleNameAndTitleNameMatcher;
	use Amineabri\Tests\TestCase;

	final class TitleNameAndTitleNameMatcherTest extends TestCase {
		public function testMatchEntryWithValidEntry(): void {
			$matcher = new TitleNameAndTitleNameMatcher;
			$entry = 'Mr Tom Staff and Mr John Doe';

			$result = $matcher->matchEntry($entry);

			$this->assertTrue($result);
		}

		public function testMatchEntryWithInvalidEntry(): void {
			$matcher = new TitleNameAndTitleNameMatcher;
			$entry = 'Invalid Entry';

			$result = $matcher->matchEntry($entry);

			$this->assertFalse($result);
		}
	}