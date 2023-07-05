<?php

declare(strict_types=1);

namespace Amineabri\StreetGroup\Readers;

use Amineabri\StreetGroup\Exceptions\FileNotFoundException;
use Amineabri\StreetGroup\Exceptions\FileReadException;
use Exception;
use Throwable;

final class CSVReader
{
    private string $filePath;
    private string $delimiter;

    public function __construct(string $filePath, string $delimiter = ',')
    {
        $this->filePath = $filePath;
        $this->delimiter = $delimiter;
    }

    /**
     * @throws Exception
     */
    public function readEntries(): array
    {
        $entries = [];

        if (!file_exists($this->filePath)) {
            throw new FileNotFoundException("CSV file not found: {$this->filePath}");
        }

        $handle = fopen($this->filePath, 'r');
        if ($handle === false) {
            throw new FileReadException("Error opening CSV file: {$this->filePath}");
        }

        try {
            while (($data = fgetcsv($handle, 1000, $this->delimiter)) !== false) {
                $entries[] = $data[0];
            }
        } catch (Throwable $e) {
            fclose($handle);
            throw new FileReadException("Error reading CSV file: {$this->filePath}", 0, $e);
        }

        fclose($handle);
        return $entries;
    }
}
