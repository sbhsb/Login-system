<?php
    require('nav.php');
    require('core.php');
    require("database.php");
    if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
        $query = "SELECT * FROM registration_table";
        $result = $conn->query($query);
        if($result->rowCount()>0){

?>

<html>
    <head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/tachyons@4.8.0/css/tachyons.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/animate.css@3.5.2/animate.css"/>
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.8.0/css/tachyons.min.css"/>
    </head>
    <body class="tc bg-navy">
    <div class="container">
        <table class="table table-striped table-hover ">
        <thead>
            <tr class="info">
                <th> Id </th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> User Name </th>
                <th> Email </th>
                <th> Password </th>
                <th> Profile Picture </th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = $result->fetch()){ ?>
            <tr class="warning">
                <td><?php echo $id = $row['id'];  ?></td>
                <td><?php echo $first_name = $row['first_name'];  ?></td>
                <td><?php echo $last_name = $row['last_name'];  ?></td>
                <td><?php echo $user_name = $row['user_name'];  ?></td>
                <td><?php echo $email = $row['email'];  ?></td>
                <td><?php echo $password = $row['password'];   ?></td>
                <td><img class="w4 h4 w4-ns h4-ns br-100" src="files/<?php echo $filename = $row['file'];?>"></td>

            </tr>
            <?php } ?>
        </tbody>
        </table>

        <?php
            }else{
                echo 'there is some error at the time of fetching';
            }
        }else{
            header('Location:login.php');
        }
        
        ?>
        </div>
    </body>



</html>