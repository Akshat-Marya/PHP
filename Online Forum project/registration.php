<!-- Registration.php - This file will handle backend functionality of user Registration
	It will validate user entered data and store them in the databse and authenticates him using his details
 -->

<!DOCTYPE html>
<html lang="en-US">
<html>

	<body>

	<?php
	include ("database.php");
	include ("password.php");
	include ("geoplugin.class.php");
	$geoplugin = new geoPlugin();
	$geoplugin->locate();

	if(empty($_POST['name']) || (preg_match("/^[a-zA-Z]$/", $_POST['name'])) || empty($_POST['netid'])
	|| empty($_POST['password']) || empty($_POST['confpassword']) || empty($_POST['bannerid'])) {
		header("location:signup.php?register=error");
		exit();
	}

	$Name= test_input($_POST['name']);
	$NetId = test_input($_POST['netid']);
	$Password = ($_POST['password']);
	$ConfirmPassword = test_input($_POST['password']);
	$City = $geoplugin->city;
	$BannerId = test_input($_POST['bannerid']);

			$pwd = password_hash($Password, PASSWORD_BCRYPT, array("cost" => 12));

			$stmt = $conn->prepare("SELECT * FROM user WHERE net_id = '$NetId' OR bannerid = '$BannerId'");
			$stmt->execute();
			$count = $stmt->rowCount();

			if($count > 0) {
				header("location:signup.php?register=emailerr");
			}
			elseif($Password != $ConfirmPassword){
				header("location:signup.php?register=emailerr");
			}
			else {
				try {
				$sql = "INSERT INTO user (name, net_id, password, city, bannerid)
		    		VALUES ('$Name', '$NetId', '$pwd', '$City', '$BannerId')";
					if($conn->exec($sql)){
							    header("location:index.php?register=signup");
					}
					else {
						header("location:signup.php?register=error");
					}
				}
				catch(PDOException $e){
					header("location:signup.php?register=error");
				}
			}


		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

	?>


	</body>


</html>

<!-- References:
[1]a. Mark Otto, "Bootstrap", Getbootstrap.com, 2018. [Online]. Available: https://getbootstrap.com/. [Accessed: 28- Jul- 2018].
[2]"Free PHP IP Geolocation API by Geoplugin", Geoplugin.com, 2018. [Online]. Available: https://www.geoplugin.com/webservices/php. [Accessed: 28- Jul- 2018].
[3]2018. [Online]. Available: http://www.opensource.org/licenses/mit-license.html MIT License. [Accessed: 28- Jul- 2018].
 -->
