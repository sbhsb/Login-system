<?php
    require("core.php");
    require("nav.php");
    if(isset($_SESSION['id']) && !empty($_SESSION['id'])){

    }elseif(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){

    }else{
        header("Location: login.php");
    }



?>

<html>
    <head>
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.8.0/css/tachyons.min.css"/>
    </head>
    
    <body class="tc bg-navy">
        <div class="pa4 black-80 georgia bg-white center mt7 br3" style="width: 370px;">
         Phone no: <label for="">+91 869754123589</label><br>
         Address: <label for="">"6/12 Northan Avenew", kolkata-700081</label>
        </div>    
    </body>
</html>