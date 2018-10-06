<?php
          session_start();
          if(!isset($_SESSION['login_user'])){
            header("Location: index.php");
          }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'database.php'; 
          include 'search_modal.php';

    ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Simposio-Home</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="reset.css">
  </head>

  <body>
  <!-- Referred w3 schools for the reference
  https://www.w3schools.com/html/html_css.asp -->
  <nav class="navbar navbar-expand-xl navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-dark fixed-top">
    <div class="header">
      <ul class="navbar-nav">
        <li>
          <a class="navbar-brand" href="homepage.php" >S I M P O S I O </a>
        </li>
      </ul>
      <span class="navbar-text">
           communicate, collaborate & critique
      </span>
    </div>


    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color: white;">
          <?php echo $_SESSION['login_name'];?>
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="profile.php">Account</a>
          <a class="dropdown-item" href="settings.php">Settings</a>
          <form method="GET" action="logout.php">
               <button type="submit" class="btn btn-dark btn-block" value="signout" name="signout">Signout</button>
              </form>
        </div>
      </li>
    </ul>


  </nav>
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
        <form action="post_question.php" method="GET">
           <div class="form-group" >
             <div class="input-group input-group-lg mb-3">
  <input type="text" class="form-control" placeholder="Have a Question?" aria-label="user_ques" name="question" required>
  <select name="tag" class="form-control">
                <option selected value="ML">Machine Learning</option>
                <option value="AWD">Advanced Web Development</option>
                <option value="MLBD">Machine Learning with Big Data</option>
                <option value="DL">Deep Learning</option>
                <option value="SO">Search and Optimisaiton</option>
              </select>
  <div class="input-group-append">
    <button class="btn btn-outline-primary" type="submit">Post</button>
</div>
</div>
</div>

</form>
</div>
            <div>
        <h3>
          <small class="text-muted">Searching Questions related to tag: </small>
        <?php echo $_GET['tag']; ?>
        
      </h3>

      </div>
      <div class="card">
        <div class="card-body">       
    <?php
      $obj = new Questions;
      $resultset = $obj->get_search($_GET['tag']);
      foreach($resultset as $row){ ?>
      <div class="card mt-2">
      <div class="card-body">
          <h3><form action="questionpage.php" method="GET">
          <button type="submit"  style="margin-bottom:4px;white-space: normal;" class="btn btn-link" value="<?php echo $row['question_id'] ?>" name="id"><?php  echo  $row['question'].'</br>'; ?></button>
          </form></h3>
            </div>
            </div>
      <?php }?>

    </div>
    </div>
    </div>
  
    <div class="col-sm-4">
      <div class="card sticky-top" style="top: 60px;">
        <div class="card-body">
          <form action="search_view.php" method="GET">
           <div class="form-group" >
             <div class="input-group mb-3">
<select name="tag" class="form-control">
                <option value="ML">Machine Learning</option>
                <option value="AWD">Advanced Web Development</option>
                <option value="MLBD">Machine Learning with Big Data</option>
                <option value="DL">Deep Learning</option>
                <option value="SO">Search and Optimisaiton</option>
              </select>
  <div class="input-group-append">
    <button class="btn btn-outline-primary" type="submit">Search</button>
  </div>
</div>
            </div>

        </form>
          <h5 class="card-title text-center display-4">MACS</h5>
          <p class="text-center">
          <form action="course_view.php" method="GET">
          <button type="submit" class="display-3 btn btn-outline-primary btn-lg btn-block" value="MLBD" name="id" style="margin-bottom:4px;white-space: normal;">Machine Learning with Big Data</button>
          </form><br>
          <form action="course_view.php" method="GET">
          <button type="submit" class="display-3 btn btn-outline-primary btn-lg btn-block" value="AWD" name="id" style="margin-bottom:4px;white-space: normal;">Advance Web Development</button>
          </form><br>
          <form action="course_view.php" method="GET">
          <button type="submit" class="display-3 btn btn-outline-primary btn-lg btn-block" value="ML" name="id" style="margin-bottom:4px;white-space: normal;">Machine Learning</button>
          </form><br>
          <form action="course_view.php" method="GET">
          <button type="submit" class="display-3 btn btn-outline-primary btn-lg btn-block" value="DL" name="id" style="margin-bottom:4px;white-space: normal;">Deep Learning</button>
          </form><br>
          <form action="course_view.php" method="GET">
          <button type="submit" class="display-3 btn btn-outline-primary btn-lg btn-block" value="SO" name="id" style="margin-bottom:4px;white-space: normal;">Search & Optimisation</button>
          </form><br>
          </p>
        </div>
      </div>
    </div>
  </div>

</section>












  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom">

  </nav>


  </body>

</html>
