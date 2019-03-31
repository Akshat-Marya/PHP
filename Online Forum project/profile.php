<?php

/**
 * Start the session.
 */
session_start();
// $_SESSION['User_Name'] ='saichand';
// $_SESSION['User_Id'] = 4;
if(($_SESSION['login_user']) == null)
	{
	    header("Location:index.php");
	    exit;
}

// Database file
include 'database.php';

$uid = $_SESSION['login_user_id'];
// $_SESSION['User_Id'];
$query = "SELECT * FROM user where user_id=:uid";

$stmt_base = $conn->prepare($query);
$stmt_base->bindParam(':uid', $uid);
$stmt_base->execute();
$data = $stmt_base->fetch(PDO::FETCH_ASSOC);
$name =$data['name'];
// $dob =$data['dob'];
$email =$data['net_id'];
$banner = $data['bannerId'];
if($data['profilepic']){
	$profilepic =$data['profilepic'];
}
else{
	$profilepic = '/images/user_img.jpeg';
}

// Form submission code - inserts new question
// if(isset($_POST['submit-btn'])){


// 	$Tag = ($_POST['tag']);
// 	$UserId = $_SESSION['User_Id'];
// 	$Question = $_POST['question'];

// 	try {
// 		$sql = "INSERT INTO question (question, user_id, courseTag)
// 		VALUES ('$Question', '$UserId', '$Tag')";
// 		if($conn->exec($sql)){
// 			header("location:profile.php");
// 		}
// 		else {
// 			header("location:profile.php?register=questionerror");
// 		}
// 	}
// 	catch(PDOException $e){
// 		header("location:profile.php?register=questionerror");
// 	}

// }
?>


<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Profile Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/esk-style.css">
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="reset.css"/>
	<!-- Bootstrap scripts -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>



	<!-- Scripts for jQuery, Popper.js, Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</head>
<body>

	<!-- Header section - UI decided by team -->
	<nav class="navbar navbar-expand-xl navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-dark fixed-top">
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
		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color: white;">
					<?php echo $name?>
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="homepage.php">Home</a>
					<a class="dropdown-item" href="settings.php">Settings</a>
					<form method="GET" action="logout.php">
         			 <button type="submit" class="btn btn-outline-primary btn-block" value="signout" name="signout">Signout</button>
        			</form>
				</div>
			</li>
		</ul>

	</nav>

	<!-- Main body -->
	<div class="container-fluid">
		<div class="row">
			<div class="column col-xl-8 col-lg-8 col-md-8 col-sm-8" id="left">


			<!-- This section was designed as part of a team - start -->
			<div class="card mt-2">
				<div class="card-body">
					<h3 class="card-title"> Post a Question </h3>
					<form method="post" action="postquestion.php?register=profilequestion">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<select name="tag" class="form-control">
				                <option selected value="ML">Machine Learning</option>
				                <option value="AWD">Advanced Web Development</option>
				                <option value="MLBD">Machine Learning with Big Data</option>
				                <option value="DL">Deep Learning</option>
				                <option value="SO">Search and Optimisaiton</option>
								</select>
							</div>
							<input required type="text" class="form-control" id="question" name="question" aria-label="Text input with dropdown button" placeholder="Have a Question ?" title="Please enter any question">
							<div class="input-group-append">
								<button class="btn btn-primary" name='submit-btn' type="submit" id="button-addon2">Post</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- This section was designed as part of a team - end -->


			<br>

			<h5>
			  Your Interactions
			  <small class="text-muted">with the community</small>
			</h5>
			<?php
			include "database.php";
			include "database_fetch.php";

			$questions = new Questions;
			$display_qs = $questions->questions_profilepage();
			if(!empty($display_qs)) {
				foreach($display_qs as $question){
					?>
					<div class="card mt-2">
						<div class="card-body">
							<form action="questionpage.php" method="GET">
								<button type="submit" class="btn btn-link" value="<?php echo $question['question_id'] ?>" name="id"><?php  echo  $question['question'].'</br>'; ?></button>
							</form>
						</div>
					</div>

				<?php }
				}
			else{ ?>
			<div class="card mt-2">
					<div class="card-body">
						<a>Any questions you asked or answers you gave will appear here</a>
					</div>
			</div>

			<?php } ?>
			</div>

			<!-- Side bar containing user information -->
			<div class="column col-xl-4 col-lg-4 col-md-8 col-sm-4" id="right">
				<div class="panel rounded shadow">
					<div class="panel-body-new">
						<div class="inner-all">
							<ul class="list-unstyled">
								<li class="text-center">
									<img data-no-retina="" class="img-circle img-responsive img-bordered-primary" src="images/<?php echo $profilepic; ?>">
								</li>
								<li class="text-center">
									<h4 class="text-capitalize" style="font-size:2.5vw;"><?php echo $name ?></h4>
									<p class="text-capitalize" style="font-size:1.5vw;">MACS</p>
								</li>
								<li><br></li>
								<li>
									<p style="font-size:1.5vw;"><?php echo $email?></p>
								</li>
								<li class="text-center" style="font-size:1.5vw;"><?php echo $banner?></li>
								<li><br></li>
								<li>
									<div class="btn-group-vertical btn-block">
										<a href="settings.php" class="btn btn-default"><i class="fa fa-cog pull-right"></i>Edit Account</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

</body>
