# Amine Abri - [Homeowner Names - Technical Test]
This repository contains a solution for the Homeowner Names technical test. The task was to write a program that accepts a CSV file containing homeowner data and splits the names into individual person records based on the provided schema.

## Requirements

- PHP 8.1 or later
- Composer (for dependency installation)

## How it is built
I chose to use native PHP instead of a framework for this project because it offered simplicity and ease of implementation. The task was relatively straightforward and didn't require the complexity and overhead of a full-fledged framework. Native PHP allowed for a lightweight and flexible solution tailored specifically to the requirements. Additionally, using native PHP made the code easier to understand for developers familiar with the core language, without introducing unnecessary learning curves.

## Installation
- Clone the repository to your local machine or download the source code.
- Navigate to the project directory.
- Run `composer install` to install the required dependencies.

## Usage
- Place your CSV file in the project directory or provide the path to the CSV file you want to process.
- Modify the `index.php` file according to your specific needs.
- Run the script using the following command.
 ```shell
    php index.php
```
- The program will process the CSV file and output an array of person records based on the provided schema.
- 
## Useful commands
- `composer install` - install composer.
- `php ./vendor/bin/phpunit` - Run Unit tests.

## Example
Let's consider an example CSV file with the following data (`./examples.csv`):

```text
homeowner,
Mr John Smith,
Mrs Jane Smith,
Mister John Doe,
Mr Bob Lawblaw,
Mr and Mrs Smith,
Mr Craig Charles,
Mr M Mackie,
...

```
Running the script with this CSV file will generate the following output:

```shell
Array
(
    [0] => Amineabri\StreetGroup\Models\Person Object
        (
            [title] => Mr
            [first_name] => John
            [initial] => 
            [last_name] => Smith
        )

    [1] => Amineabri\StreetGroup\Models\Person Object
        (
            [title] => Mrs
            [first_name] => Jane
            [initial] => 
            [last_name] => Smith
        )

    [2] => Amineabri\StreetGroup\Models\Person Object
        (
            [title] => Mister
            [first_name] => John
            [initial] => 
            [last_name] => Doe
        )

    [3] => Amineabri\StreetGroup\Models\Person Object
        (
            [title] => Mr
            [first_name] => Bob
            [initial] => 
            [last_name] => Lawblaw
        )

    [4] => Amineabri\StreetGroup\Models\Person Object
        (
            [title] => Mr
            [first_name] => 
            [initial] => 
            [last_name] => Smith
        )

    [5] => Amineabri\StreetGroup\Models\Person Object
        (
            [title] => Mrs
            [first_name] => 
            [initial] => 
            [last_name] => Smith
        )

    [6] => Amineabri\StreetGroup\Models\Person Object
        (
            [title] => Mr
            [first_name] => Craig
            [initial] => 
            [last_name] => Charles
        )

    [7] => Amineabri\StreetGroup\Models\Person Object
        (
            [title] => Mr
            [first_name] => 
            [initial] => M
            [last_name] => Mackie
        )

    [8] => Amineabri\StreetGroup\Models\Person Object
        (
            [title] => Mrs
            [first_name] => Jane
            [initial] => 
            [last_name] => McMaster
        )

    [9] => Amineabri\StreetGroup\Models\Person Object
        (
            [title] => Mr
            [first_name] => Tom
            [initial] => 
            [last_name] => Staff
        )

    [10] => Amineabri\StreetGroup\Models\Person Object
        (
            [title] => Mr
            [first_name] => John
            [initial] => 
            [last_name] => Doe
        )

    [11] => Amineabri\StreetGroup\Models\Person Object
        (
            [title] => Dr
            [first_name] => 
            [initial] => P
            [last_name] => Gunn
        )

    [12] => Amineabri\StreetGroup\Models\Person Object
        (
            [title] => Dr
            [first_name] => Joe
            [initial] => 
            [last_name] => Bloggs
        )

    [13] => Amineabri\StreetGroup\Models\Person Object
        (
            [title] => Mrs
            [first_name] => Joe
            [initial] => 
            [last_name] => Bloggs
        )

    [14] => Amineabri\StreetGroup\Models\Person Object
        (
            [title] => Ms
            [first_name] => Claire
            [initial] => 
            [last_name] => Robbo
        )

    [15] => Amineabri\StreetGroup\Models\Person Object
        (
            [title] => Prof
            [first_name] => Alex
            [initial] => 
            [last_name] => Brogan
        )

    [16] => Amineabri\StreetGroup\Models\Person Object
        (
            [title] => Mrs
            [first_name] => Faye
            [initial] => 
            [last_name] => Hughes-Eastwood
        )

    [17] => Amineabri\StreetGroup\Models\Person Object
        (
            [title] => Mr
            [first_name] => 
            [initial] => F
            [last_name] => Fredrickson
        )

)

```
The program splits the name strings into individual person records, following the provided schema.

> **Note:** I am comfortable working with frameworks like Laravel and Symfony, but for this particular project, I chose to use native PHP. I believe that frameworks can sometimes introduce unnecessary complexity and constraints, especially for smaller, focused tasks like this. Native PHP offers greater flexibility and allows for a more tailored solution without the overhead of a full-fledged framework. Additionally, using native PHP makes the code more accessible to developers familiar with the core language. However, I recognize that frameworks have their advantages, such as built-in features, conventions, and scalability options, which can be beneficial for larger and more complex projects.
