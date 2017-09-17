<?php

    $host = 'mysql:host=localhost;dbname=user_registration';
    $username = 'root';
    $password = '';
   // $database = 'user_registration';

   $connect = mysqli_connect("localhost","root","");
   $query = "CREATE DATABASE IF NOT EXISTS user_registration";
   if($connect->query($query)){
    
        $conn = new PDO ( $host , $username , $password);
    
        $scema = "CREATE TABLE registration_table(id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(30) NOT NULL, user_name VARCHAR(30) NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(50) NOT NULL, file VARCHAR(100) NOT NULL)"; 
        $conn->query($scema);
            
        

   }else{
        echo "error in creating database";
          
   }
    
?>