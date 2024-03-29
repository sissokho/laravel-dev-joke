<?php

namespace Sissokho\LaravelDevJoke\DataTransferObjects;

class Joke
{
    public function __construct(
        public readonly string $question,
        public readonly string $punchline
    ) {
    }

    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        return [
            'question' => $this->question,
            'punchline' => $this->punchline,
        ];
    }

    /**
     * @param  array<string, string>  $attributes
     */
    public static function fromArray(array $attributes): self
    {
        return new self(
            $attributes['question'],
            $attributes['punchline']
        );
    }
}
