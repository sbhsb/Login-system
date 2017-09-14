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
	<title>EXPLORE</title>
	<link rel="stylesheet" type="text/css" href="new_site.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/tachyons@4.8.0/css/tachyons.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/animate.css@3.5.2/animate.css"/>
		<link rel="stylesheet" href="https://unpkg.com/tachyons@4.8.0/css/tachyons.min.css"/>
</head>
<body class="tc bg-navy">

		<nav class="navbar-nav-scroll">
				<div class="container-fluid">
					
					<!-- logo -->
					<div class="navbar-header">
						<a href="" class="navbar-brand white">MY WEBSITE</a>
					</div>
		
					<!--menu-->
					<div>
						<ul class="nav navbar-nav">
							<li><a href="" class="white">Home</a></li>
							<li><a href="" class="white">About</a></li>
							<li><a href="" class="white">Contact Us</a></li>
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
					</div>
		
				</div>
			</nav>
<div id= "main" class="jumbotron">

<div id="First"><a>Our work</a></div>
<div id="Second"><a>About</a></div>
</div>
<div class="panel panel-success pa3 pa5-ns">
  <div class="panel-heading">
    <h3 class="panel-title">About this site</h3>
  </div>
  <div class="panel-body">
    ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </div>
</div>

</body>
</html>