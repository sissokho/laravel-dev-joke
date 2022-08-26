<?php

namespace Sissokho\LaravelDevJoke\Tests;

use Sissokho\LaravelDevJoke\DevJokeServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<int, string>
     */
    protected function getPackageProviders($app)
    {
        return [
            DevJokeServiceProvider::class,
        ];
    }
}
