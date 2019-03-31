<?php
	session_start();

	$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if(($_SESSION['login_user']) == null)
	{
	    header("Location:index.php");
	    exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	  <title>Simposio-Questions</title>
	  <link rel="stylesheet" href="css/common.css">
	  <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="reset.css">
    <script>
    $(window).on("navigate", function (event, data) {
      var direction = data.state.direction;
      if (direction == 'back') {
        window.location.href='home.php';
        event.preventDefault();
      }
    });
    </script>

  </head>

  <body>
  <!-- Referred w3 schools for the reference
	https://www.w3schools.com/html/html_css.asp -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<div class="row" style="bottom: 0px;">
	<nav class="navbar navbar-expand-xl navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-dark fixed-top" >
	  <div class="header">
  	  <ul class="navbar-nav">
    		<li>
    		  <a class="navbar-brand" href="homepage.php"	>S I M P O S I O   </a>
    		</li>
  	  </ul>
  	  <span class="navbar-text">
  		     communicate, collaborate & critique
  	  </span>
	  </div>
<!-- 		<ul class="navbar-nav">
  		<li class="nav-item">
        <form method="GET" action="logout.php">
          <button type="submit" class="btn btn-link" value="signout" name="signout">Signout</button>
        </form>
  		</li>
	  </ul> -->


        <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color: white;">
          <?php echo $_SESSION['login_name'];?>
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="profile.php">Account</a>
          <a class="dropdown-item" href="settings.php">Settings</a>
          <form method="GET" action="logout.php">
               <button type="submit" class="btn btn-outline-primary btn-block" value="signout" name="signout">Signout</button>
              </form>
        </div>
      </li>
    </ul>


	</nav>
</div>
<section>
  <div class="jumbotron jumbotron-fluid bg-light bg-cover">
    <div class="overlay"></div>
    <div class="container">
      <h1 class="h1">Have a question?</h1>
      <p class="lead">Communicate with your peer and alumnus</p>
    </div>
  </div>
</section>
  <section>
    <!-- Displayingn the question itself. -->
    <div class="container-fluid row">
    <div class="col-sm-8">
        <div class="card mt-2">
          <div class="card-body">
              <?php
              include "database.php";
              include "database_fetch.php";

              $question = new Questions;
              $display_qs = $question->individual_question($_GET['id']); ?>

              <h4><strong><?php	echo  $display_qs['question'].'</br><br> <small class="text-muted">Question related to tag </small>'.$display_qs['courseTag']; ?> </strong> </h4>
            </div>
          </div>
          <!-- Posting a reply to the Question -->
      <div class="card mt-2">
        <div class="card-body">
            <h6 class="card-title"> Your answer   </h6>
            <form action="postquestion.php?register=answer" method="POST">
              <div class="input-group mb-3">
                <input required type="text" class="form-control" id="answer" name="answer" aria-label="Text input with dropdown button" pattern=".{6,}" placeholder="Your answer" title="Please enter any answer">
                <input type="hidden" id="question_id" value="<?php echo $_GET['id']; ?>" name="question_id">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit" id="button-addon2">Reply</button>
                </div>
              </div>
            </form>
        </div>
      </div>
      <div class="card text-center mt-2">
        <div class="card-header">
          <h5 class="card-title"> Answers </h5>
        </div>
      </div>
      <!-- Displaying top answers -->

          <?php

          $answers = $question->answers($_GET['id']);

          foreach($answers as $answer){
          ?>
          <div class="card mt-2">
            <div class="card-body">
              <div class="card-text">
                <p><?php  echo  $answer['answer'].'</br>'; ?></p>
              </div>
            </div>
          </div>

          <?php } ?>

      </div>

    <div class="col-sm-4">
      <div class="card sticky-top" style="top: 50px;">
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


  <!-- Footer -->
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom footer">
		<span class="navbar-text">
			S I M P O S I O
		</span>
	</nav>

	</body>

</html>


<?php

include 'database.php';

?>

<!-- References:
[1]a. Mark Otto, "Bootstrap", Getbootstrap.com, 2018. [Online]. Available: https://getbootstrap.com/. [Accessed: 28- Jul- 2018].
[2]"Free PHP IP Geolocation API by Geoplugin", Geoplugin.com, 2018. [Online]. Available: https://www.geoplugin.com/webservices/php. [Accessed: 28- Jul- 2018].
[3]2018. [Online]. Available: http://www.opensource.org/licenses/mit-license.html MIT License. [Accessed: 28- Jul- 2018].
 -->
