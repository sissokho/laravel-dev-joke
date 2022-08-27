<?php

namespace Sissokho\LaravelDevJoke\Tests\Commands;

use Illuminate\Support\Facades\Http;
use Sissokho\LaravelDevJoke\Tests\TestCase;

class DisplayRandomJokeCommandTest extends TestCase
{
    /** @test */
    public function it_displays_a_random_joke_in_the_console(): void
    {
        $expectedResponse = [
            'question' => 'How did your dog eat your coding assignment?',
            'punchline' => 'It took him a couple bytes.',
        ];

        Http::fake([
            '*' => Http::response([
                $expectedResponse,
            ]),
        ]);

        $this->artisan('devjoke')
            ->expectsOutput($expectedResponse['question'])
            ->expectsOutput('> '.$expectedResponse['punchline'])
            ->assertSuccessful();
    }

    /** @test */
    public function it_displays_error_in_the_console_when_it_fails_to_fetch_a_joke(): void
    {
        Http::fake([
            '*' => Http::response(status: 404),
        ]);

        $this->artisan('devjoke')
            ->expectsOutput('Sorry, could not connect to the DevJoke API.')
            ->assertFailed();
    }
}
