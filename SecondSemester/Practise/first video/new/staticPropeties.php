<?php 

require_once 'Counter.php';

Counter::$count++;
Counter::$count++;
Counter::$count++;
Counter::$count++;
Counter::$count++;
Counter::$count++;


print Counter::$count . PHP_EOL;