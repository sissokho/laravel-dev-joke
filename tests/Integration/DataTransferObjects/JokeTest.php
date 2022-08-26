<?php

namespace Sissokho\LaravelDevJoke\Tests\Integration\DataTransferObjects;

use Sissokho\LaravelDevJoke\DevJoke;
use Sissokho\LaravelDevJoke\Tests\TestCase;

class JokeTest extends TestCase
{
    /** @test */
    public function it_can_be_resolved_from_the_container(): void
    {
        $client = resolve(DevJoke::class);

        $this->assertInstanceOf(DevJoke::class, $client);
    }
}
