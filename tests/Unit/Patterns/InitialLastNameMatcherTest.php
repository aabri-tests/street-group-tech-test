<?php

	namespace Unit\Patterns;

	use Amineabri\StreetGroup\Patterns\InitialLastNameMatcher;
	use Amineabri\Tests\TestCase;

	final class InitialLastNameMatcherTest extends TestCase {
		public function testMatchEntryWithValidEntry(): void {
			$matcher = new InitialLastNameMatcher;
			$entry = 'Mr F. Fredrickson';

			$result = $matcher->matchEntry($entry);

			$this->assertTrue($result);
		}

		public function testMatchEntryWithInvalidEntry(): void {
			$matcher = new InitialLastNameMatcher;
			$entry = 'Invalid Entry';

			$result = $matcher->matchEntry($entry);

			$this->assertFalse($result);
		}
	}