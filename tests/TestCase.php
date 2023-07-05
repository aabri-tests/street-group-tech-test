<?php
	declare(strict_types=1);

	namespace Amineabri\Tests;

	use Mockery;
	use PHPUnit\Framework\TestCase as BaseTestCase;

	/**
	 * TestCase
	 */
	abstract class TestCase extends BaseTestCase
	{
		/**
		 * Actions to perform after each test.
		 */
		public function tearDown(): void
		{
			Mockery::close();
			parent::tearDown();
		}
	}
