<?php

	use Amineabri\StreetGroup\Exceptions\FileNotFoundException;
	use Amineabri\StreetGroup\Exceptions\FileReadException;
	use Amineabri\StreetGroup\Exceptions\InvalidPatternException;
	use Amineabri\StreetGroup\Processors\EntryProcessor;
	use Amineabri\StreetGroup\Readers\CSVReader;

	require 'vendor/autoload.php';
	$csvFile = 'examples.csv';
	$groups = [
		'pattern1',
		'pattern2',
		'pattern3',
		'pattern4',
	];

	try {
		$reader = new CSVReader($csvFile);
		$entries = $reader->readEntries();
		$data = [];
		$entryProcessor = new EntryProcessor;
		foreach ($entries as $entry) {
			$matchedPattern = $entryProcessor->findMatchingPattern($entry, $groups);

			if ($matchedPattern) {
				$data = array_merge($data, $entryProcessor->processEntry($entry, $matchedPattern));
			}
		}
		print_r($data);
	} catch (FileNotFoundException $e) {
		// Handle the exception for file not found
		echo "File not found error: " . $e->getMessage();
	} catch (FileReadException $e) {
		// Handle the exception for file read error
		echo "File read error: " . $e->getMessage();
	} catch (InvalidPatternException $e) {
		// Handle the exception for an invalid pattern name
		echo "Invalid pattern name: " . $e->getMessage();
	} catch (Exception $e) {
		// Handle any other generic exception
		echo "Error: " . $e->getMessage();
	}