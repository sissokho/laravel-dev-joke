<?php

namespace Sissokho\LaravelDevJoke;

use Illuminate\Support\ServiceProvider;
use Sissokho\LaravelDevJoke\Commands\DisplayRandomJokeCommand;

final class DevJokeServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(
            DevJoke::class,
            fn () => new DevJoke(
                /** @phpstan-ignore-next-line */
                strval(config('devjoke.api.url'))
            )
        );

        if ($this->app->runningInConsole()) {
            $this->commands([
                DisplayRandomJokeCommand::class,
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/devjoke.php',
            'devjoke'
        );
    }
}
