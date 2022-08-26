<?php

namespace Sissokho\LaravelDevJoke\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Sissokho\LaravelDevJoke\DataTransferObjects\Joke;

class JokeTest extends TestCase
{
    protected array $joke;

    protected function setUp(): void
    {
        parent::setUp();

        $this->joke = [
            'question' => 'Waitress: Do you have any questions about the menu?',
            'punchline' => 'Dev: What kind of font it is?',
        ];
    }

    /** @test */
    public function it_can_be_instantiated(): void
    {
        $devJoke = new Joke(...$this->joke);

        $this->assertInstanceOf(Joke::class, $devJoke);
        $this->assertEquals($this->joke['question'], $devJoke->question);
        $this->assertEquals($this->joke['punchline'], $devJoke->punchline);
    }

    /** @test */
    public function it_can_be_created_from_an_array(): void
    {
        $devJoke = Joke::fromArray($this->joke);

        $this->assertInstanceOf(Joke::class, $devJoke);
        $this->assertEquals($this->joke['question'], $devJoke->question);
        $this->assertEquals($this->joke['punchline'], $devJoke->punchline);
    }

    /** @test */
    public function it_returns_all_attributes_as_an_array(): void
    {
        $devJoke = Joke::fromArray($this->joke);

        $attributes = $devJoke->toArray();

        $this->assertIsArray($attributes);
        $this->assertCount(2, $attributes);
    }
}
