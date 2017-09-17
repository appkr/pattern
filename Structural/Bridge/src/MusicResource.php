<?php

namespace Structural\Bridge;

use Structural\Bridge\Model\Music;

class MusicResource implements Resource
{
    private $music;

    public function __construct(Music $music)
    {
        $this->music = $music;
    }

    public function title(): string
    {
        return $this->music->getTitle();
    }

    public function image(): string
    {
        return $this->music->getImage();
    }

    public function description(): string
    {
        return $this->music->getDescription();
    }
}