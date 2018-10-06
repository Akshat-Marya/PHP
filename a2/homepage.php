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
    background-image: url('front_pose.jpg');
    background-repeat: no-repeat;
    width: 100%
    }
    a{
      color: black;
    }
    a:hover{
    color:blue;
    }
    footer{
      margin-bottom: 200px;

    }
  </style>
</head>
<body class="bg-light">
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<header>
  <nav class="navbar navbar-expand-lg bg-light">
    <a class="navbar-brand " href="index.php">Simposio</a>
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

      <button class="btn btn-outline-primary my-2 my-sm-0 mx-2 animated lightSpeedIn" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Now hover out." type="submit">Hello, User</button>
      <a href="index.php" class="btn btn-outline-primary my-2 my-sm-0 mx-2 animated lightSpeedIn" >Signout</a>

    </div>
  </nav>
</header>
<section>
  <div class="jumbotron jumbotron-fluid bg-light bg-cover">
    <div class="overlay"></div>
    <div class="container">
      <h1 class="display-4">Simposio</h1>
      <p class="lead">A communication platform between you and your alumnus.</p>
    </div>
  </div>
</section>
<section>
  <div class="row mx-2 animated lightSpeedIn">
    <div class="col-sm-8">
      <div>
        <form>
           <div class="form-group" >
             <div class="input-group input-group-lg mb-3">
  <input type="text" class="form-control" placeholder="Have a Question?" aria-label="user_ques" >
  <div class="input-group-append">
    <button class="btn btn-outline-primary" type="button">Post</button>
  </div>
</div>
            </div>

        </form>
      </div>
      <div class="card">
        <div class="card-body">

          <a href="$questionId" class="display-3"> Question1 </a><br>
          <a href="$questionId" class="display-3"> Question1 </a><br>
          <a href="$questionId" class="display-3"> Question1 </a><br>
          <a href="$questionId" class="display-3"> Question1 </a><br>
          <a href="$questionId" class="display-3"> Question1 </a><br>
          <a href="$questionId" class="display-3"> Question1 </a><br>
          <a href="$questionId" class="display-3"> Question1 </a><br>

        </div>
      </div>
    </div>
	
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <form>
           <div class="form-group" >
             <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username">
  <div class="input-group-append">
    <button class="btn btn-outline-primary" type="button">Search</button>
  </div>
</div>
            </div>

        </form>
          <h5 class="card-title text-center display-4">MACS</h5>
          <p class="text-center ">
            <a href="#" class="display-3 btn btn-outline-primary btn-lg btn-block" role="button" aria-pressed="true"> Databse </a><br>
          <a href="#" class="display-3 btn btn-outline-primary btn-lg btn-block"> Web Design </a><br>
          <a href="#" class="display-3 btn btn-outline-primary btn-lg btn-block" role="button" aria-pressed="true"> Quality Assur.</a><br>
          <a href="#" class="display-3 btn btn-outline-primary btn-lg btn-block"> Mobile Comp.</a><br>
          <a href="#" class="display-3 btn btn-outline-primary btn-lg btn-block"> Machine Learning </a><br>
          <a href="#" class="display-3 btn btn-outline-primary btn-lg btn-block"> Deep Learning </a><br>
          <a href="#" class="display-3 btn btn-outline-primary btn-lg btn-block"> Search and Opt. </a><br>
          </p>
        </div>
      </div>
    </div>
	</div>

</section>


</body>
</html>
