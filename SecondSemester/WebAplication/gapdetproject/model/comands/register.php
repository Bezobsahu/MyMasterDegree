<?php
 // connect DB via PDO instance
 

 $stmt = $conection->prepare("INSERT INTO user (userName, name, surname, email, password) VALUES (:userName, :name, :surname, :email, :password)");

 $stmt->bindParam(':userName', $userName);
 $stmt->bindParam(':name', $name);
 $stmt->bindParam(':surname', $surname);
 $stmt->bindParam(':email', $email);
 $stmt->bindParam(':password', $password);


 // insert row
 $userName = $_POST["userName"];
 $name = $_POST["name"];
 $surname = $_POST["surname"];
 $email = $_POST["email"];
 $password = $_POST["password"];

 

 // run
 $stmt->execute();

 echo "Uživatel registrován"

 ?>

 <br>

 <a href="/">Zpět</a>