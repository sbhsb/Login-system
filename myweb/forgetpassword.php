<?php
    require("core.php");
    require("database.php");

    $message = "";
    if(isset($_POST["user_name"]) && isset($_POST["password"])){
         $username = $_POST['user_name'];
         $password = md5($_POST['password']);
        if((!empty($username)) && (!empty($password))){
            $query = "UPDATE registration_table SET password = ? WHERE user_name = ?";
            if($conn->prepare($query)->execute(array($password,$username))){
                $message = "you successfully changed youre password.";
                header('Location:login.php');
            }else{
                $message = "there is some error"; 
            }
        }else{
            $message = "fill all the field";

        }
    }else{
        
    }
?>

<html>
<head>
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.8.0/css/tachyons.min.css"/>
    <title>Forget password</title>
</head>

<body class="tc bg-navy">
    <form class="pa4 black-80 georgia bg-white center mt7 br3" style="width: 370px;" action="<?php $action ?>" method="POST">
    <span class="dib mb2 w-35 tl">User Name:</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="dib w-60" type="text" name="user_name"><br>
    <span class="dib mb2 w-35 tl">New Password:</span> <input class="dib w-60" type="password" name="password"><br>
    <input class="b mt2 ph3 pv2 input-reset ba b--black bg-transparent grow pointer f6" type="submit" value="Submit">
    </form>
    <div class="white"><?php echo $message; ?></div>
</body>


</html>