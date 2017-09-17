<?php

namespace Structural\Bridge\Model;

class Music
{
    private $title;
    private $image;
    private $description;

    public function __construct(string $title, string $image, string $description)
    {
        $this->title = $title;
        $this->image = $image;
        $this->description = $description;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getDescription()
    {
        return $this->description;
    }
}