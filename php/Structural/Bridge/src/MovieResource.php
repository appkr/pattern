<?php

namespace Structural\Bridge;

use Structural\Bridge\Model\Movie;

class MovieResource implements Resource
{
    private $movie;

    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }

    public function title(): string
    {
        return $this->movie->getTitle();
    }

    public function image(): string
    {
        return $this->movie->getImage();
    }

    public function description(): string
    {
        return $this->movie->getDescription();
    }
}