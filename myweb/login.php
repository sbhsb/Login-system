<?php

    require_once("core.php");
    require("database.php");

    $message = '';
    if(isset($_POST['UserName']) && isset($_POST['Password'])){
         $username = $_POST['UserName'];
         $password = md5($_POST['Password']);
        if(!empty($username) && !empty($password)){
            $query = "SELECT id FROM registration_table WHERE user_name=? AND password=?";
            $result = $conn->prepare($query);
            if($result->execute(array($username, $password))){
               if($result->rowCount()>0){
               $id = $result->fetch();
               $_SESSION['id'] = $id["id"];
               header('Location: user.php');
               }elseif(($username=='admin') && ($password =='21232f297a57a5a743894a0e4a801fc3')){
                    $_SESSION['admin'] = $username;
                    header('Location:admin.php');
               }             
               else{
                   $message = 'username password combination not match';
               }
               
            }else{
                $message = "error in connection";
            }
        }else{
            $message = 'fill the text field';
        }
    }
?>






<html>
    <head>
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.8.0/css/tachyons.min.css"/>
    </head>
    
    <body class="tc bg-navy">
        <form class="pa4 black-80 georgia bg-white center mt7 br3" style="width: 370px;" action="<?php $action?>" method="POST">
         Username: <input type="text" name="UserName"><br><br>
         Password: <input type="password" name="Password"><br>
        <input class="b mt2 ph3 pv2 input-reset ba b--black bg-transparent grow pointer f6"  type="submit" value="Login">
        <a class="link dim dark-blue" href="forgetpassword.php">Forget Password?</a>
        </form>
        <div class="white"><?php echo $message; ?></div>    
    </body>
</html>