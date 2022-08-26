<?php

namespace Sissokho\LaravelDevJoke;

use Illuminate\Support\ServiceProvider;

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
                strval(config('devjoke.api.url'))
            )
        );
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/devjoke.php',
            'devjoke'
        );
    }
}
