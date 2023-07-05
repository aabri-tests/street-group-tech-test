<?php

	namespace Unit\Readers;

	use Amineabri\StreetGroup\Exceptions\FileNotFoundException;
	use Amineabri\StreetGroup\Exceptions\FileReadException;
	use Amineabri\StreetGroup\Readers\CSVReader;
	use Amineabri\Tests\TestCase;
	use Exception;

	final class CSVReaderTest extends TestCase {
		/**
		 * @throws Exception
		 */
		public function testReadEntriesWithValidFile(): void {
			$filePath = __DIR__ . '/testdata/valid-data.csv';
			$delimiter = ',';
			$reader = new CSVReader($filePath, $delimiter);

			$expectedEntries = ['Entry1', 'Entry2', 'Entry3'];

			$result = $reader->readEntries();

			$this->assertEquals($expectedEntries, $result);
		}

		/**
		 * @throws Exception
		 */
		public function testReadEntriesWithMissingFile(): void {
			$filePath = 'path/to/missing/file.csv';
			$delimiter = ',';
			$reader = new CSVReader($filePath, $delimiter);

			$this->expectException(FileNotFoundException::class);

			$reader->readEntries();
		}

		/**
		 * @throws Exception
		 */
		public function testReadEntriesWithUnreadableFile(): void {
			$filePath = __DIR__ . '/testdata/unreadable.csv';
			$delimiter = ',';
			touch($filePath);
			chmod($filePath, 0000); // Set file permissions to make it unreadable

			$reader = new CSVReader($filePath, $delimiter);
			$this->expectException(FileReadException::class);

			$reader->readEntries();
		}
	}