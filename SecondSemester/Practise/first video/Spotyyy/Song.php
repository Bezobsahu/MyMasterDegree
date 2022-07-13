<?php

class Song
{
    public $name;
    public $numberOfPlays;

    public function __construct($name, $numberOfPlays)
    {
        $this->name = $name;
        $this->numberOfPlays= $numberOfPlays;
    }
}