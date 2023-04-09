<?php
$checkUserExist=false;
 // import   database connection from connection.php
 include 'sqlconnection.php';
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username=$_POST['username'];
    $password=$_POST['password'];

        $sql = "SELECT * FROM `admintable` where `username`='$username' and `password`='$password'"; //0 
        $result=$con->query($sql);
        if($result->num_rows >0){
            header('Location: admin.php');            
        }      
        else{
            $checkUserExist=true;  
            header('Location: login.php');
        }
        }
?>
 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Madridista Bangladesh</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Register</a>
          </li>
          <li class="nav-item  active">
            <a class="nav-link" href="#">Login<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Navbar End-->
    <div class="wrapper">
	<div class="login-container">
		<div class="card">
			<div class="card-body">
					<h2 class="card-title text-center">Admin login</h2>
					<h3 class="text-center"><?php
						if($checkUserExist==false){
							echo "<p></p>";
						}
						else{
							echo "<p><b>Invalid username and passwords</b></p>";
						}
					?></h3>
					<form method="POST" action="login.php">
						<div class="form-group">
                        <label for="username">Username:</label>
							<span>
								<i class="fa fa-user"></i>
								<input class="form-control" type="text" placeholder="User Name" name="username" required>
							</span><br>
						</div>
						<div class="form-group">
                        <label for="password">Password:</label>
							<span>
								<i class="fa fa-lock"></i>
								<input class="form-control" type="password" placeholder="Password" name="password" required>
							</span><br>
						</div>
						<button type="submit" class="btn btn-primary">Login</button>
					</form>
			</div>
		</div>
	</div>
</div>
    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>