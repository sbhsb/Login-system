<?php

    $host = 'mysql:host=localhost;dbname=user_registration';
    $username = 'root';
    $password = '';
   // $database = 'user_registration';

   try{
    $conn = new PDO ( $host , $username , $password);
    $conn-> setAttribute( PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "connection faild".$e->getMessage();
     }
    

?>