<?php 


require_once 'Book.php';
require_once 'PhysicalBook.php';
require_once 'Ebook.php';

$book = new Book();

$pbook= new PhysicalBook ('do','not',100,10);
print $pbook->getTitle();
print $pbook->getAuthor();
print $pbook->getPrice();
print $pbook->getWeight();

