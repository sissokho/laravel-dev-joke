<?php

namespace Sissokho\LaravelDevJoke;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Sissokho\LaravelDevJoke\DataTransferObjects\Joke;

class DevJoke
{
    public function __construct(
        private string $baseUrl
    ) {
    }

    /**
     * @throws RequestException
     */
    public function random(): Joke
    {
        $response = Http::baseUrl($this->baseUrl)
            ->get('/getjoke')
            ->throw();

        /** @var array<int, array<string, string>> $results */
        $results = $response->json();

        return Joke::fromArray($results[0]);
    }
}
