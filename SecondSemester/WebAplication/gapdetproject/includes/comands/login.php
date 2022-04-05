<?php
$pdo = require 'connect.php';

if(isset($_POST['userName'])){
    echo "neco ";
    $usename=$_POST['userName'];
    $password=$_POST['password'];
    
    $sql="select * from user where userName='".$usename."'AND Password='".$password."' limit 1";
    
    $result=mysqli_query($db,$sql);
    
    if(mysql_num_rows($result)==1){
        echo " You Have Successfully Logged in";
        exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }
    

}

?>