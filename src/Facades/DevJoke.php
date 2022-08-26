<?php

namespace Sissokho\LaravelDevJoke\Facades;

use Illuminate\Support\Facades\Facade;
use Sissokho\LaravelDevJoke\DataTransferObjects\Joke;
use Sissokho\LaravelDevJoke\DevJoke as DevJokeClient;

/**
 * @method static Joke randomJoke()
 *
 * @see DevJokeClient
 */
class DevJoke extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return DevJokeClient::class;
    }
}
