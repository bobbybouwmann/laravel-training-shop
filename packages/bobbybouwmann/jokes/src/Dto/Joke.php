<?php

namespace Bobbybouwmann\Jokes\Dto;

class Joke
{
    protected $joke;

    public function __construct($joke = '')
    {
        $this->joke = $joke;
    }

    public function getJoke(): string
    {
        return $this->joke;
    }

    public function __toString(): string
    {
        return $this->joke;
    }
}
