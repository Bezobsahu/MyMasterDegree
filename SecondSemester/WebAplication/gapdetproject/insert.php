<?php
 // connect DB via PDO instance
 $pdo = require 'connect.php';

 $stmt = $pdo->prepare("INSERT INTO meal (meal_name, price, day) VALUES (:meal_name, :price, :day)");

 $stmt->bindParam(':meal_name', $meal_name);
 $stmt->bindParam(':price', $price);
 $stmt->bindParam(':day', $day);

 // insert row
 $meal_name = $_POST["meal_name"];
 $price = $_POST["price"];
 $day = $_POST["day"];

 // run
 $stmt->execute();

 echo "Jídlo přidáno"

 ?>

 <br>

 <a href="/">Zpět</a>