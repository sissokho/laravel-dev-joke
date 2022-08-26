<?php

namespace Sissokho\LaravelDevJoke\Tests\Unit\DataTransferObjects;

use PHPUnit\Framework\TestCase;
use Sissokho\LaravelDevJoke\DevJoke;

class DevJokeTest extends TestCase
{
    /** @test */
    public function it_can_be_instantiated(): void
    {
        $client = new DevJoke('https://dummy.test');

        $this->assertInstanceOf(DevJoke::class, $client);
    }
}
