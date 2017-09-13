<?php
    require('nav.php');
    require('core.php');
    require('database.php');
    if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
        $id = $_SESSION['id'];
        $query = "SELECT * FROM registration_table WHERE id =?";
        $result = $conn->prepare($query);
        if($result->execute(array($id))){
            if($result->rowCount()>0){
            $row = $result->fetch();
             $file_name = $row['file'];
             $first_name = $row['first_name'];
             $last_name = $row['last_name'];
             $user_name = $row['user_name'];
             $email = $row['email'];
            }
            else{

            }
        }else{

        }
    }else{
        header('Location:login.php');
    }
    


?>


<html>
<head>
<title>User information</title>
</head>
<body class="tc bg-navy">
    <div class="pa4 black-80 georgia bg-white center mt6 br3" style="width: 370px">
    <img class="w5 h5 w5-ns h5-ns br-100" src="files/<?php echo $file_name?>"><br>
    First name:&nbsp;&nbsp;<label for=""><?php echo $first_name;?></label><br>
    Last name:&nbsp;&nbsp;<label for=""><?php echo $last_name;?></label><br>
    User name:&nbsp;&nbsp;<label for=""><?php echo $user_name;?></label><br>
    Email:&nbsp;&nbsp;<label for=""> <?php echo $email;?></label><br>
    </div>
</body>
</html>