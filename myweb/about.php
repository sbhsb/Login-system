<?php

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
					}
				}
			}
?>
<html>

    <head>
        <title>About</title>
        <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width,initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.8.0/css/tachyons.min.css"/>
        <link rel="stylesheet" href="https://unpkg.com/animate.css@3.5.2/animate.css"/>
		<link rel="stylesheet" href="https://unpkg.com/tachyons@4.8.0/css/tachyons.min.css"/>
    </head>
    <body>
    <nav class="navbar navbar-default mb0">
      <div class="container-fluid">
        <div class="navbar-header">
	        <a class="navbar-brand" href="#">MY WEBSITE</a>
        </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
	        <li><a href="about.php">About <span class="sr-only">(current)</span></a></li>
	        <li><a href="#">Contact Us</a></li>
	      </ul>
        <?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])){ ?>
							<ul class="nav navbar-nav navbar-right">
								<li class="hover"><a style="padding:0px; margine:0px;" class="w3 h3 w3-ns h3-ns br-100 mt1 mb0" href="user.php"><img class="w3 h3 w3-ns h3-ns br-100 mt1 mb0 mr2" src="files/<?php echo $file_name?>"></a></li>
								<li><a href="logout.php" class="white">Logout</a></li>
							</ul>
						<?php } elseif(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){?>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="admin.php" class="white">Admin Panel</a></li>
								<li><a href="logout.php" class="white">Logout</a></li>
							</ul>
						<?php } else{ ?>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="login.php" class="white">Login</a></li>
								<li><a href="registration.php" class="white">Register</a></li>
							</ul>
						<?php } ?>
	      <!--<ul class="nav navbar-nav navbar-right">
          <li><a href="login.php">Login</a></li>
					<li><a href="registration.php">Register</a></li>
      	</ul>-->
      </div>
    </div>
  </nav>

    <div class="jumbotron bg-navy white">
      <div class="container">
        <h1 class="display-3">About Us</h1>
        
            <p class="white">Write something that you want about this login projectWrite something that you want about this login projectWrite something that you want about this login projectWrite something that you want about this login projectWrite something that you want about this login projectWrite something that you want about this login projectWrite something that you want about this login projectWrite something that you want about this login projectWrite something that you want about this login project</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        
      </div>
    </div>
      <div class="container"
      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="rounded-circle" src="b42c78ff-4c54-4867-b2eb-b9a20a1ea1ee.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Our Valus</h2>
          <p>Write something that you want about this login project Write something that you want about this login project Write something that you want about this login project Write something that you want about this login projectWrite something that you want about this login projectWrite something that you want about this login project</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">View Details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="rounded-circle" src="62ad746b-97d6-40f6-ab00-09e53e4fbfd3.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Our Mission</h2>
          <p>Write something that you want about this login projectWrite something that you want about this login projectWrite something that you want about this login projectWrite something that you want about this login projectWrite something that you want about this login projectWrite something that you want about this login project</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">View Details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="rounded-circle" src="99aa9c73-7b66-4a4f-9342-7c2520eb74bc.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Our Vision</h2>
          <p>Write something that you want about this login projectWrite something that you want about this login projectWrite something that you want about this login projectWrite something that you want about this login projectWrite something that you want about this login projectWrite something that you want about this login project</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">View Details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row --> 
      </div> 
      <hr>
       
    </body>



</html>