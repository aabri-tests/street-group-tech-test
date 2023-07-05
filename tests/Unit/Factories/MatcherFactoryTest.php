<?php

	namespace Unit\Factories;

	use Amineabri\StreetGroup\Exceptions\InvalidPatternException;
	use Amineabri\StreetGroup\Factories\MatcherFactory;
	use Amineabri\StreetGroup\Patterns\InitialLastNameMatcher;
	use Amineabri\StreetGroup\Patterns\TitleAndMrsLastNameMatcher;
	use Amineabri\StreetGroup\Patterns\TitleNameAndTitleNameMatcher;
	use Amineabri\StreetGroup\Patterns\TitleNameMatcher;
	use Amineabri\Tests\TestCase;

	final class MatcherFactoryTest extends TestCase {
		/**
		 * @throws InvalidPatternException
		 */
		public function testCreateMatcherWithValidPatternName(): void {
			$matcher1 = MatcherFactory::createMatcher('pattern1');
			$matcher2 = MatcherFactory::createMatcher('pattern2');
			$matcher3 = MatcherFactory::createMatcher('pattern3');
			$matcher4 = MatcherFactory::createMatcher('pattern4');

			$this->assertInstanceOf(TitleNameMatcher::class, $matcher1);
			$this->assertInstanceOf(InitialLastNameMatcher::class, $matcher2);
			$this->assertInstanceOf(TitleAndMrsLastNameMatcher::class, $matcher3);
			$this->assertInstanceOf(TitleNameAndTitleNameMatcher::class, $matcher4);
		}

		public function testCreateMatcherWithInvalidPatternName(): void {
			$this->expectException(InvalidPatternException::class);
			$this->expectExceptionMessage("Invalid pattern name: pattern5");

			MatcherFactory::createMatcher('pattern5');
		}
	}