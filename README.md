# Laravel Dev Joke

This package offer a simple way to fetch a random dev joke from this [DevJoke API](https://documenter.getpostman.com/view/16443297/TzkyLee7).

## Prerequisites

This package requires:

-   PHP 8+
-   Laravel 9

## Installation

> :warning: This package is not stable yet.

You can install the package via composer:

```bash
composer require sissokho/laravel-dev-joke
```

## Usage

This package can be used by resolving the `Sissokho\LaravelDevJoke\DevJoke` class from the container or by injecting it into a method:

```php
use Sissokho\LaravelDevJoke\DevJoke;

public function joke(DevJoke $devJoke)
{
    $joke = $devJoke->random();

    $joke->question; // retrieve the question
    $joke->punchline; // retrieve the punchline
    $joke->toArray(); // ['question' => 'lorem', 'punchline' => 'ipsum']
}
```

The `randomJoke` method will return a `Sissokho\LaravelDevJoke\DataTransferObjects\Joke` object, which includes the question and the punchline of the joke;

You can also use the Facade:

```php
use Sissokho\LaravelDevJoke\Facades\DevJoke;

$joke = DevJoke::random();
```

## Testing

You can run PHPUnit tests, PHPStan/Larastan static analysis and inspect the code for style errors without changing the files (with Laravel Pint):

```bash
composer test
```

However, you can run these tests separately.

-   Static analysis:

```bash
composer test:types
```

-   PHPUnit tests:

```bash
composer test:unit
```

-   Code inspection:

```bash
composer test:style
```

To fix code style issues, run the following command:

```bash
composer stylefix
```

## Changelog

Please see [CHANGELOG](./CHANGELOG.md) for more information on what has changed recently.

## Credits

-   [Mouhamadou Moustapha SISSOKHO](https://github.com/sissokho)

Huge thanks to [@askudhay](https://twitter.com/askudhay) for providing this API.

## License

The MIT License (MIT). Please see [License File](./LICENSE.md) for more information.
