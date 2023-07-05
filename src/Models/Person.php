<?php

declare(strict_types=1);

namespace Amineabri\StreetGroup\Models;

final class Person
{
    public string $title;
    public ?string $first_name;
    public ?string $initial;
    public string $last_name;

    public function __construct($title, $first_name, $initial, $last_name)
    {
        $this->title = $title;
        $this->first_name = $first_name;
        $this->initial = $initial;
        $this->last_name = $last_name;
    }
}
