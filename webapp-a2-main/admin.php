<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="table.css">
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
            <a class="nav-link" href="#">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Logout<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
<!-- Navbar End-->
<div class="wrapper">
  <main class="admin-container-fluid">
    <section class="card">
      <div class="card-header">
        <h1 class="card-title text-center">Members Data</h1>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Membership</th>
                <th>Message</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include 'sqlconnection.php';
                $sql = "SELECT * FROM `membertable`";
                $result=$con->query($sql);
                if($result->num_rows >0){
                  while($row = $result->fetch_assoc()){
                    echo "<tr>
                      <td data-label='Name'>" .$row["name"]."</td>
                      <td data-label='Email'>" . $row["email"]."</td>
                      <td data-label='Mobile'>". $row["contacts"]."</td>
                      <td data-label='Address'>". $row["curraddress"]."</td>
                      <td data-label='Membership'>". $row["mstype"]."</td>
                      <td data-label='Message'>". $row["message"]."</td>
                    <tr> ";
                  }
                }else{
                  echo "<tr><td colspan='6' class='text-center'>No results</td></tr>";
                }
                $con->close();
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>
</div>
      <!-- Bootstrap JavaScript -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>


