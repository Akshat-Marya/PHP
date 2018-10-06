<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <title>Simposio</title>
  <link rel="stylesheet" href="./css/reset.css"/>
  <style type="text/css">
  .bg-cover {
    background-color: #333333;
  }
  .bg-body{
    background-color: #e6e6e6;
  }
  .bg-jumbotron{
    background-color: #d9d9d9;
  }
  a{
    color: black;
  }
  a:hover{
    color:#bfbfbf;
  }
  footer{
    margin-bottom: 200px;
    background-color: #000000;

  }
  #footer_my{
    background-color: #ff860d;
    opacity: 0.6;
  }

  </style>
</head>
<body class="bg-light">
  <?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }    
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  <header>
    <nav class="navbar navbar-expand-lg bg-cover">
      <a class="navbar-brand" href="index.php">Simposio</a>
      <button class="navbar-toggler  navbar-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./homepage.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li>
        </ul>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-light m my-sm-0  animated lightSpeedIn" data-toggle="modal" data-target="#exampleModal">LogIn</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">LogIn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="formGroupExampleInput">Your Net Id:</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="NetId">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Password:</label>
                    <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-outline-secondary my-2 my-sm-0 mx-2  animated bounce" >SignIn</button>
                </form>
              </div>
              <div class="modal-footer">
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <section>
    <div class="jumbotron jumbotron-fluid bg-jumbotron">
      <div class="overlay"></div>
      <div class="container bg-text text-center">
        <h1 class="display-2 font-weight-bold">Simposio</h1>
        <p class="lead font-weight-bold">A communication platform between you and your alumnus.</p>
      </div>
    </div>
  </section>
  <section>

    <div class="col-sm-8 mx-auto">
      <div class="card animated zoomIn">
        <div class="card-body bg-body">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="form-group">
              <h5>Your Net Id:</h5>
              <input type="text" class="form-control" id="netid" placeholder="NetId" name="email">
              <span class="error"> <?php echo $nameErr;?></span>
            </div>
            <div class="form-group my-2">
              <h5>Password:</h5>
              <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-group">
              <h5>Confirm Password:</h5>
              <input type="password" class="form-control" id="c_password" placeholder="Confirm Password">
            </div>
            <div class="form-group">
              <h5>Address</h5>
              <input type="password" class="form-control" id="address" placeholder="address">
            </div>
            <div class="form-group">
              <h5>Select The Top 3 Courses You Are Interested In</h5>
              <select id="tag1" class="form-control">
                <option selected>MACS</option>
                <option>Machine Learning</option>
                <option>Advanced Web Development</option>
                <option>Machine Learning with Big Data</option>
                <option>Deep Learning</option>
                <option>Search and Optimisaiton</option>
              </select>
            </div>
            <div class="form-group">
              <select id="tag2" class="form-control">
                <option selected>MACS</option>
                <option>Machine Learning</option>
                <option>Advanced Web Development</option>
                <option>Machine Learning with Big Data</option>
                <option>Deep Learning</option>
                <option>Search and Optimisaiton</option>
              </select>
            </div>
            <div class="form-group">
              <select id="tag3" class="form-control">
                <option selected>MACS</option>
                <option>Machine Learning</option>
                <option>Advanced Web Development</option>
                <option>Machine Learning with Big Data</option>
                <option>Deep Learning</option>
                <option>Search and Optimisaiton</option>
              </select>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-outline-dark my-2 my-sm-0 mx-2  animated bounce" >Signup</button>
            </div>
          </form>
        </div>
      </div>
    </div>







  </section>







</body>
</html>
