<?php

require_once 'Song.php';

$song = new Song(['a','hmmm','aa'], 'hello there');

var_dump($song->name);