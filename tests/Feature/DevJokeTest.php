<?php

namespace Sissokho\LaravelDevJoke\Tests\Feature;

use Illuminate\Http\Client\Request;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Sissokho\LaravelDevJoke\DataTransferObjects\Joke;
use Sissokho\LaravelDevJoke\DevJoke;
use Sissokho\LaravelDevJoke\Tests\TestCase;

class DevJokeTest extends TestCase
{
    /**
     * @test
     * @group ci-only
     */
    public function it_is_able_to_make_a_real_call_to_the_api(): void
    {
        $joke = resolve(DevJoke::class)->random();

        $this->assertInstanceOf(Joke::class, $joke);
    }

    /** @test */
    public function it_makes_a_http_request_to_the_correct_endpoint(): void
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

        $joke = resolve(DevJoke::class)->random();

        $this->assertInstanceOf(Joke::class, $joke);
        $this->assertEquals($expectedResponse['question'], $joke->question);
        $this->assertEquals($expectedResponse['punchline'], $joke->punchline);

        Http::assertSent(function (Request $request) {
            return $request->method() &&
                $request->url() === config('devjoke.api.url').'/getjoke';
        });
    }

    /** @test */
    public function it_throws_a_request_exception_if_a_500_occurs(): void
    {
        Http::fake([
            '*' => Http::response(status: 500),
        ]);

        $this->expectException(RequestException::class);

        resolve(DevJoke::class)->random();
    }

    /** @test */
    public function it_throws_a_request_exception_if_a_404_occurs(): void
    {
        Http::fake([
            '*' => Http::response(status: 404),
        ]);

        $this->expectException(RequestException::class);

        resolve(DevJoke::class)->random();
    }
}
