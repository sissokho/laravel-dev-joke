<?php

namespace Sissokho\LaravelDevJoke\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Sissokho\LaravelDevJoke\DevJoke;

class DisplayRandomJokeCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'devjoke';

    /**
     * @var string
     */
    protected $description = 'Display a random dev joke';

    /**
     * @param  DevJoke  $devJoke
     * @return mixed
     */
    public function handle(DevJoke $devJoke)
    {
        try {
            $joke = $devJoke->random();
        } catch (ConnectionException | RequestException) {
            $this->error('Sorry, could not connect to the DevJoke API.');

            return self::FAILURE;
        }

        $this->line($joke->question);
        $this->info('> '.$joke->punchline);

        return self::SUCCESS;
    }
}
