<!doctype html>
<html lang="en">



<?php 
session_start();
if(isset($_SESSION['login_user'])){
  header("Location: homepage.php");
  
}


?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <title>Simposio</title>
  <link rel="stylesheet" href="./css/reset.css"/>
  <script src="webstore.js"></script>

  <style type="text/css">

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
    color:#ff860d;
  }
  footer{
    margin-bottom: 200px;
    background-color: #000000;

  }
  #footer_my{
    background-color: #ff860d;
    opacity: 0.6;
  }
  #jumbo-heading{
    color: #ff860d;
  }

  </style>
</head>
<body class="bg-light">
 
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <header>
    <nav class="navbar navbar-expand-lg bg-cover">
      <a class="navbar-brand" href="index.php">Simposio</a>
      <button class="navbar-toggler  navbar-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <a href="index.php" class="btn btn-outline-warning m my-sm-0  animated lightSpeedIn ml-auto">LogIn</a>
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
        <h1 class="display-2 font-weight-bold" id="jumbo-heading">Simposio</h1>
        <p class="lead font-weight-bold">A communication platform between you and your alumnus.</p>
      </div>
    </div>
  </section>
  <section>

    <div class="col-sm-8 mx-auto">
      <div class="card animated zoomIn">
        <div class="card-body bg-body">
          <form action="signup_modal.php" method="POST">
            <div class="form-group">
              <h5>Your Net Id:</h5>
              <input type="text" class="form-control" id="netid" placeholder="NetId" name="email" required pattern="[a-z][a-z][0-9][0-9][0-9][0-9][0-9][0-9]@dal.ca">
              <span class="error"> <?php echo $emailErr;?></span>
            </div>
              <div class="form-group">
              <h5>Name:</h5>
              <input type="text" class="form-control" id="name" placeholder="Name" name="name" min="2">
              <span class="error" required> <?php echo $nameErr;?></span>
            </div>
            <div class="form-group my-2">
              <h5>Password:</h5>
              <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
            <div class="form-group">
              <h5>Confirm Password:</h5>
              <input type="password" class="form-control" id="c_password" placeholder="Confirm Password" name="confirm_password" required>
            </div>
            <div class="form-group">
              <h5>Address</h5>
              <input type="text" class="form-control" id="address" placeholder="address" name="address" required>
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
