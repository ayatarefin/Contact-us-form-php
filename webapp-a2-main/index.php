<?php
    $submitMessage=false;
    $successMessage = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // import   database connection from connection.php
        include 'sqlconnection.php';
        //echo "<h1>Successfully connected to DB<h1>";
        $name=$_POST['name'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $address=$_POST['address'];
        $membership=$_POST['membership'];
        $message=$_POST['message'];
        // Sql query for insertion 
        $sql= "INSERT INTO `membertable`(`name`, `email`, `contacts`, `curraddress`, `mstype`, `message`) VALUES ('$name','$email','$mobile','$address','$membership','$message')";          
        
        if ($con->query($sql) == true) {
            $submitMessage=true;
            $successMessage = "New record created successfully. Thanks for contacting us!";
        } 
        else{
          echo "Error: " . $sql . "<br>" . ($con->error);
      }
        $con->close();
    } 
?>
<?php
header('Cache-Control: no cache'); // clear browser cache
session_cache_limiter('private_no_expire'); // set cache limiter to private
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
    <title>Registration Page</title>
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
          <li class="nav-item active">
            <a class="nav-link" href="#">Register<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Navbar End-->
    <div class="wrapper">
    <div class="container">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title col-md-12 text-center">Register Today!</h2>
            <?php if ($submitMessage) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $successMessage; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <form  class="contact-form"  method="POST">
              <div class="contact-form-group">
                <label for="name">Name:</label>
                <input type="text" class="contact-form-text" id="name" placeholder="Enter your name" name="name"  required>
              </div>
              <div class="contact-form-group">
                <label for="email">Email:</label>
                <input type="email" class="contact-form-text" id="email" placeholder="Enter your email" name="email" required>
              </div>
              <div class="contact-form-group">
                <label for="email">Mobile Number:</label>
                <input type="text" class="contact-form-text" id="email" placeholder="Enter your phone" name="mobile" required>
              </div>
              <div class="contact-form-group">
                <label for="email">Your Current Address:</label>
                <input type="text" class="contact-form-text" id="email" placeholder="Current Address" name="address" required>
              </div>
              <div class="contact-form-group">
                <label for="email">Membership type you want:</label>
                <select class="contact-form-text" id="semester" name="membership">
                            <option value="bronze">Bronze</option>
                            <option value="Silver">Silver</option>
                            <option value="Gold">Gold</option>
                        </select>
              </div>
              <div class="contact-form-group">
                <label for="message">If you have any query:</label>
                <textarea class="contact-form-text" id="message" rows="5" placeholder="Enter your message" name="message" name="message" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
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