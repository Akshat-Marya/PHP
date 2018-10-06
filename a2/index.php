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
    background-image: url('./images/banner_image4.jpg');
    background-repeat: no-repeat;
    width: 100%
    top: 50%;
    left: 50%;
  }

  a{
    color: black;
  }
  a:hover{
    color:#ff860d;
  }
  footer{
    margin-bottom: 200px;
    background-color: yellow;

  }
  #footer_my{
    background-color: #ff860d;
    opacity: 0.6;
  }
  body{

  }
  .special-class{
    opacity: 1;
    color:#ff860d;
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
        <button type="button" class="btn btn-outline-warning m my-sm-0  animated lightSpeedIn" data-toggle="modal" data-target="#exampleModal">LogIn</button>

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
                  <button type="submit" class="btn btn-outline-warning my-2 my-sm-0 mx-2  animated bounce" >SignIn</button>
                </form>
              </div>
              <div class="modal-footer">
              </div>
            </div>
          </div>
        </div>
        <a href="./signup.php" class="btn btn-outline-warning mx-2 my-sm-0  animated lightSpeedIn">Sign up</a>
      </div>
    </nav>
  </header>
  <section>
    <div class="jumbotron jumbotron-fluid bg-light bg-cover">
      <div class="overlay"></div>
      <div class="container bg-text">
        <h2 class="display-2 font-weight-bold special-class">Simposio</h2>
        <p class="lead font-weight-bold special-class">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>
    </div>
  </section>
  <section>
    <div class="row mx-2 animated lightSpeedIn">
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title display-4">Connect</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>

          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title display-4">Communicate</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>

          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title display-4">Critique</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="card text-center fixed-bottom mx-2 text-white" id="footer_my">
      <div class="card-body">
        <h1 class="card-title display-4">About Us</h1>
        <p class="card-text md-2">Our purpose and more info.</p><br>
        <a href="./about.html" class="btn btn-warning my-2 my-sm-0 mx-2">Know more</a>
      </div>
    </div>
  </footer>



</body>
</html>
