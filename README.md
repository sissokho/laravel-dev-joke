# Laravel Dev Joke

[![Latest version on packagist](https://img.shields.io/packagist/v/sissokho/laravel-dev-joke?color=blue&style=flat-square)](https://packagist.org/packages/sissokho/laravel-dev-joke)
[![MIT Licensed](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
![Github Actions tests status](https://img.shields.io/github/workflow/status/sissokho/laravel-dev-joke/Run%20tests?label=tests&style=flat-square)
![Github Actions static analysis status](https://img.shields.io/github/workflow/status/sissokho/laravel-dev-joke/Run%20static%20analysis?label=static%20analysis&style=flat-square)

This package offer a simple way to fetch a random dev joke from this [DevJoke API](https://documenter.getpostman.com/view/16443297/TzkyLee7).

## Prerequisites

This package requires:

-   PHP 8+
-   Laravel 9

## Installation

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

## Artisan

An artisan command is provided for you to display a random joke:

```bash
php artisan devjoke
```

The joke is displayed like this:

![Screenshot from 2022-08-27 15-19-32](https://user-images.githubusercontent.com/31145894/187036552-5a211546-d02c-418c-8cf5-73d167166540.png)

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
