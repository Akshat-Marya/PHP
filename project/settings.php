<?php


session_start();

// Checking if session is active

if((isset($_SESSION['login_user']) == "") ||(!(isset($_SESSION['login_user']))))
{
	header("Location:index.php");
	exit;
}


// adding dependant files
include 'password.php';
include 'database.php';


//Setting session variables and queries necessary for page data
$uid = $_SESSION['login_user_id'];
$query = "SELECT * FROM user where user_id=:uid";

$stmt_base = $conn->prepare($query);
$stmt_base->bindParam(':uid', $uid);
$stmt_base->execute();
$data = $stmt_base->fetch(PDO::FETCH_ASSOC);
$name =$data['name'];
$city =$data['city'];
$email =$data['net_id'];
if($data['profilepic']){
	$profilepic =$data['profilepic'];
}

else{
	$profilepic = 'user_img.jpeg';
}


// Code for user settings to be saved
if(isset($_POST['btn-add'])){
	$name = $_POST['name'];
	$city = $_POST['city'];
	$pass = $_POST['password'];

	$image = $_FILES['profile']['name'];
	$tmp_dir=$_FILES['profile']['tmp_name'];
	$imageSize = $_FILES['profile']['size'];

	$upload_dir = 'images/';
	$imgExt = strtolower(pathinfo($image,PATHINFO_EXTENSION));
	$valid_extensions = array('jpeg','jpg','png','gif');
	// $picProfile = rand(1000,1000000).".".$imgExt;
	// move_uploaded_file($tmp_dir, $upload_dir.$picProfile);


	if( (isset($pass)) && (empty($_FILES['profile']['name'])) ){
		$pwd = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
		$query = "UPDATE user SET name=:userName, city=:userCity, password=:pwd WHERE user_id=:uid";
	}

	elseif( (!isset($pass)) &&  (!empty($_FILES['profile']['name'])) ) {
		$picProfile = rand(1000,1000000).".".$imgExt;
		move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
		chmod($upload_dir.$picProfile, 0755);
		$query = "UPDATE user SET name=:userName, city=:userCity, profilepic=:upic WHERE user_id=:uid";
	}

	elseif( (isset($pass)) &&  (!empty($_FILES['profile']['name'])) ){
		$pwd = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
		$picProfile = rand(1000,1000000).".".$imgExt;
		move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
		chmod($upload_dir.$picProfile, 0755);
		$query = "UPDATE user SET name=:userName, city=:userCity, password=:pwd, profilepic=:upic WHERE user_id=:uid";
	}


	$stmt = $conn->prepare($query);
	$stmt->bindParam(':userName', $name);
	$stmt->bindParam(':userCity', $city);
	$stmt->bindParam(':uid', $uid);
	if(!empty($_FILES['profile']['name'])){
		$stmt->bindParam(':upic', $picProfile);
	}
	if(isset($pwd)){
		$stmt->bindParam(':pwd', $pwd);
	}

	//Execute.
	$stmt->execute();

	$stmt_base->execute();
	$data = $stmt_base->fetch(PDO::FETCH_ASSOC);
	if($data['profilepic']){
		$profilepic =$data['profilepic'];
	}

	else{
		$profilepic = 'user_img';
	}

	console.log($profilepic);
}
?>


<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>User Settings</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS Stylesheets -->
	<link rel="stylesheet" href="css/esk-style.css">
	<link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="reset.css"/>
	<!-- Script for font -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Bootstrap scripts -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>



	<!-- Scripts for jQuery, Popper.js, Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

	<!-- validation scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
	<script type="text/javascript" src="js/validations.js"></script>
	<script type="text/javascript">
		function confirmPass() {
			var pass = document.getElementById("password").value
			var confPass = document.getElementById("confirmpassword").value
			if(pass != confPass) {
				alert('Passwords do not match!');
			}
		}
	</script>

	<!-- geolocation script start -->
	<script>
		var x = document.getElementById('city');

		function getLocation(){
			if(navigator.geolocation){
				navigator.geolocation.getCurrentPosition(showPosition);
			}
		}

		function showPosition(position){

			var localAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+position.coords.latitude+","+position.coords.longitude+"&sensor=true";


			$.get({

				url:localAPI,
				success: function(data){
					$fetch_city = data.results[0].address_components[4].long_name;
					$city_form = document.getElementById('city').value;
					console.log('$city_form');
					if($city_form != $fetch_city){
						document.getElementById('city').value = $fetch_city;
					}
				}

			})
		}
	</script>
	<!-- geolocation script end -->


</head>

<body onload="getLocation()">
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
					<a class="dropdown-item" href="profile.php">Account</a>
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
			<div class="col">
				<div class="panel rounded shadow" max-width="300px" max-height="300px">
					<div class="panel-body">
						<div class="inner-all">
							<!-- Profile picture -->
							<ul class="list-unstyled">
								<li class="text-center">
									<img data-no-retina="" class="img-circle img-responsive img-bordered-primary" src="./images/<?php echo $profilepic ?>" alt="John Doe" width="300" height="300">
								</li>
							</ul>
							<div class="row">
								<!-- left column -->
								<div class="col-xl-3 col-lg-3 col-md-3">

								</div>

								<!-- Form with user settings -->
								<div class="col-md-9 personal-info">
									<div class="text-center">
										<h6>Please chose a JPEG or PNG file less than 1MB in size.</h6>
										<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
											<div class="col-md-8 col-lg-8 col-xl-8 text-center">
												<input type="file" name='profile' class="form-control" accept="*/image">
											</div>
										</div>
										<div class="alert alert-info alert-dismissable col-xl-8 col-lg-8 col-md-8">
											<a class="panel-close close" data-dismiss="alert">×</a>
											<i class="fa fa-coffee"></i>
											On this page you can <strong>modify</strong> your details. Fields with * are <strong>mandatory</strong>.
										</div>
										<h3> Personal info</h3>
										<div class="form-group">
											<label class="col-lg-3 col-xl-3 col-md-3 control-label">* Username:</label>
											<div class="col-lg-8 col-xl-8 col-md-8">
												<input required type="text" class="form-control" size="30" name="name" id="name" placeholder="Name" pattern="[A-Za-z]{1,10}" title="Upto 10 characters only without spaces!" value="<?php echo $name?>">
												<!-- <input class="form-control" type="text" id="name" name="name" value="<?php $name?>"> -->
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-3 control-label">Program:</label>
											<div class="col-lg-8 col-xl-8 col-md-8">
												<input class="form-control" type="text" name="program" value="MACS" readonly="">
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-3 control-label">Email:</label>
											<div class="col-lg-8 col-xl-8 col-md-8">
												<input class="form-control" type="text" name="email" id="email" value="<?php echo $email?>" readonly="">
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-3 control-label">Current City:</label>
											<div class="col-lg-8 col-xl-8 col-md-8">
												<input class="form-control" type="text" name="city" id="city" value="<?php echo $city?>"readonly="">

											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-3 control-label">New Password:</label>
											<div class="col-lg-8 col-xl-8 col-md-8">
												<input class="form-control" type="password" id="password" name="password" id="password" minlength="8" maxlength="22" title="Password must be atleast 8 digits">
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-3 control-label">Confirm Password:</label>
											<div class="col-lg-8 col-xl-8 col-md-8">
												<input class="form-control" type="password" id="confirmpassword" name="confirmpassword" id="password" minlength="8" maxlength="22" title="Password must be atleast 8 digits" onblur="confirmPass()">
											</div>
										</div>
										<div class="form-group">
											<button type="submit" name="btn-add" id="submit-btn" class="btn btn-primary animated bounce col-lg-8 col-xl-8 col-md-8">Submit</button>
										</div>
									</form>
								</div>
							</div>

							<!-- Placeholder -->
							<div class="col-xl-3 col-lg-3 col-md-3"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
