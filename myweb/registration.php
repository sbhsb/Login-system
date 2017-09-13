<?php
require("core.php");
require_once("database.php");

$message = '';
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_FILES['file']['name'])){
    echo $FirstName = $_POST['firstname'];
    echo $LastName = $_POST['lastname'];
    echo $UserName = $_POST['username'];
    echo $Email = $_POST['email'];
    echo $Password = md5($_POST['password']);
    echo $ConfirmPassword = md5($_POST['confirmpassword']);
    echo $name = $_FILES['file']['name'];
   if((!empty($FirstName)) && (!empty($LastName)) && (!empty($UserName)) && (!empty($Email)) && (!empty($Password)) && (!empty($ConfirmPassword)) && (!empty($name))){
        if($Password==$ConfirmPassword){
            $query1 = "SELECT * FROM registration_table WHERE user_name = ? OR email = ?";
            $checkStmt = $conn->prepare($query1);
            $checkStmt->execute(array($UserName, $Email));
            if ($checkStmt->rowCount() > 0){
                $message ='Duplicate Username or Email';
            }else{
                $query = "INSERT INTO registration_table (first_name,last_name,user_name,email,password,file) VALUES (?,?,?,?,?,?)";
                if($conn->prepare($query)->execute(array($FirstName,$LastName,$UserName,$Email,$Password,$name))){
                   
                   $temp = $_FILES['file']['tmp_name'];
                   $loation = 'files/';
                   if(move_uploaded_file($temp,$loation.$name)){
                        $message = "registared";
                        header('Location: login.php');
                   }else{
                        $message = "there is some error at the time of registration";
                   }
                }else{
                    $message = "there is  some error";
                }
            }

        }else{
            $message = "password and confirmpassword dont match";
        }
   }
   else{
       $message = "fill all the field properly";
        }
}else{
    $message = "field is not set";
}

?>
<html>
    <head>
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.8.0/css/tachyons.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/animate.css@3.5.2/animate.css"/>

    </head>
    <body class="tc bg-navy">
        <form class="pa3 black-80 georgia bg-white center mt6 br3" style="width:450px;" action="<?php $action ?>" method="POST" enctype = "multipart/form-data">
            <span class="dib mb2 w-33 tl">FirstName:</span> <input class="dib w-60" type="text" name="firstname">
            <span class="dib mb2 w-33 tl">LastName:</span> <input class="dib w-60" type="text" name="lastname">
            <span class="dib mb2 w-33 tl">UserName:</span> <input class="dib w-60" type="text" name="username">
            <span class="dib mb2 w-33 tl">Email:</span> <input class="dib w-60" type="text" name="email">
            <span class="dib mb2 w-33 tl">Password:</span> <input class="dib w-60" type="password" name="password">
            <span class="dib mb2 w-33 tl">Confirm Password:</span> <input class="dib w-60" type="password" name="confirmpassword">
            <span class="dib mb2 w-33 tl">Profile Picture:</span> <input class="dib w-60" type="file" name="file">
            <input class="b mt2 ph3 pv2 input-reset ba b--black bg-transparent grow pointer f6" type="submit" value="Submit">

        </form>
        <div class="white"><?php echo $message; ?></div>
    </body>
</html>