<?php

class Playlist
{
    private $songs =[];

    public function addSong(Song $song): void
    {
        $this->songs[]=$song;
    }

    public function getSongs()
    {
        return $this->songs
    }

    public function getLegth():int
    {
        return count($this->songs);
    }
}