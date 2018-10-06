<?php
      session_start();
      include 'database.php';
      include 'questions_modal.php';
      if(!isset($_SESSION['login_user'])){
        header("Location: index.php");
      }


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Course
    </title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/course.css">
        <link rel="stylesheet" href="reset.css"/>
  </head>
  <body>
    <!-- Referred w3 schools for the reference
https://www.w3schools.com/html/html_css.asp -->
    <nav class="navbar navbar-expand-xl navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-dark fixed-top">
      <div class="header">
        <ul class="navbar-nav">
          <li>
            <a class="navbar-brand" href="homepage.php"	>S I M P O S I O
            </a>
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
               <button type="submit" class="btn btn-outline-primary btn-block" value="signout" name="signout">Signout</button>
              </form>
        </div>
      </li>
    </ul>

    </nav>
    <section>
  <div class="jumbotron jumbotron-fluid bg-light bg-cover">
    <div class="overlay"></div>
    <div class="container">
      <h1 class="h1">Have a question?</h1>
      <p class="lead">Communicate with your peer and alumnus</p>
    </div>
  </div>
</section>

            <?php
/** Referred stack-overflow */
include "database.php";
include "courseModel.php";
$course = new courses;
$headers = $course->course_Headers($_GET['id']);?>
<div class="row mx-2 animated lightSpeedIn">
<div class="col-sm-8">
<div class="h3">
<?php
echo  $headers['courseName'];
?>
</div>
        <?php
$question = $course->get_questions($_GET['id']);
echo $question['question_id'];
foreach($question as $row){ ?>
      <div class="card mt-2">
      <div class="card-body">
          <h3><form action="questionpage.php" method="GET">
          <button type="submit" style="margin-bottom:4px;white-space: normal;" class="btn btn-link" value="<?php echo $row['question_id'] ?>" name="id"><?php  echo  $row['question'].'</br>'; ?></button>
          </form></h3>
            </div>
            </div>
        <?php } ?>
      </div>


  <!-- sidebar -->
  <div class="row mx-2 animated lightSpeedIn">
  <div class="col-sm-4">
      <div class="Details">
        <h4 class="h4"> Course Description
        </h4>
        <p>
          <?php
echo  $headers['courseDesc'];
?>
        </p>
        <div class="heading2">
          <h4 class="h4"> Ratings
          </h4>
        </div>
        <div class="sub-heading1">
          <span id="ratingTitle">
          </span>
          <?php
		  /** Referred weblesson tutorial for the fetching titles and calculating avg reviews from database */
include 'database.php';
$Tag = $_GET['id'];
$query = $conn->prepare("SELECT * FROM ratingtitles");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$output = '';
foreach($result as $row)
{
$rating = count_rating($row["ratingTitleId"], $conn);
$color = '';
$output .=
'<h4 style="color:#005DA6">'.$row['Title'].'</h4>
<ul class="list-inline" data-rating="'.$rating.'"
title="Average rating - '.$rating.'" >
';
for($count=1; $count <=5; $count++)
{
if ($count <= $rating)
{
$color = 'color:#ffcc00;';
}
else
{
$color = 'color:#ccc;';
}
$output .= '<li title="'.$count.'" ratingTitleId="'.$row['ratingTitleId'].'-'.
$count.'" data-index="'.$count.'" data-ratingTitleId="
'.$row['ratingTitleId'].'" data-rating="'.$rating.'"
class="rating" style="cursor:pointer; '.$color.'
font-size:20px;">&#9733;</li>';
}
$output .= '
</ul>
';
}
echo $output;
function count_rating($ratingTitleId, $conn){
include('database.php');
$Tag = $_GET['id'];
$output = 0;
$query = $conn->prepare("SELECT AVG(rating) as rating FROM ratings WHERE ratingTitleId = '".$ratingTitleId."' AND courseTag = '$Tag'");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$total_row = $query->rowCount();

if($total_row > 0)
{

foreach($result as $row)
{
$output = round($row["rating"]);

}
}
return $output;
}
?>
        </div>
        <?php
		/** Referred stack-overflow for disabling post review function when user already rated */
include 'database.php';
$userId = $_SESSION['login_user_id'];
$Tag = $_GET['id'];
$showDiv=true;
$query = $conn->prepare("SELECT user_id, courseTag FROM ratings WHERE user_id='$userId' AND courseTag='$Tag'");
$query->execute();
$temp = $query->fetchAll(PDO::FETCH_ASSOC);
$rows = $query->rowCount();
if ($rows > 0)
{
$showDiv=false;
}
else {}
?>
        <?php if ($showDiv===false){?>
        <?php echo "<p class='message' style='color:#005DA6'> You have Rated the Subject!</p> ";  } ?>
        <div class="box"
             <?php if ($showDiv===false){?>style="display:none"
        <?php  } ?>>
        <a class="button" href="#popup1">Your Rating
        </a>
      </div>
      <div id="popup1" class="overlay">
        <div class="popup">
          <h2>Rating
          </h2>
          <a class="close" href="#">×
          </a>
          <form method="POST" action="postRatings.php">
            <div>
              <label for="Title1"> Toughness
              </label>
              <div class="slidecontainer">
                <input type="range" min="1" max="5" value="0" class="slider" id="Title1" name="Toughness">
                <p>rating:
                  <span id="rating1">
                  </span>
                </p>
              </div>
              <label for="Title2"> WorkLoad
              </label>
              <div class="slidecontainer">
                <input type="range" min="1" max="5" value="0" class="slider" id="Title2" name="WorkLoad">
                <p>rating:
                  <span id="rating2">
                  </span>
                </p>
              </div>
              <label for="Title3"> Strictness
              </label>
              <div class="slidecontainer">
                <input type="range" min="1" max="5" value="0" class="slider" id="Title3" name="Strictness">
                <p>rating:
                  <span id="rating3">
                  </span>
                </p>
              </div>
              <input type="hidden" value="<?php $Tag = $_GET['id']; echo $Tag ?>" name="courseTag">
              <button type="submit" data-inline="true" value="submit" >Submit
              </button>
            </div>
          </form>
          <div class="w-form-done succesbox">
            <?php if (!empty($_REQUEST['success'])) { ?>
            <p>Thank you! your rating submitted successfully.
            </p>
            <?php exit();} ?>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom">
    <span class="navbar-text">
      S I M P O S I O
    </span>
  </nav>
  </body>
</html>

<script>
  var slider1 = document.getElementById("Title1");
  var output1 = document.getElementById("rating1");
  var slider2 = document.getElementById("Title2");
  var output2 = document.getElementById("rating2");
  var slider3 = document.getElementById("Title3");
  var output3 = document.getElementById("rating3");
  output1.innerHTML = slider1.value;
  slider1.oninput = function() {
    output1.innerHTML = this.value;
  }
  output2.innerHTML = slider2.value;
  slider2.oninput = function() {
    output2.innerHTML = this.value;
  }
  output3.innerHTML = slider1.value;
  slider3.oninput = function() {
    output3.innerHTML = this.value;
  }
</script>
