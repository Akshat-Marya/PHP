<?php
#reference https://www.formget.com/login-form-in-php/

include 'database.php';


$error = "";
$username = test_input($_POST['username']);
$password = test_input($_POST["password"]);


					try{
						$query = $conn->prepare("SELECT * FROM user WHERE net_id = ?");
			      $query->execute(array($username));
			      $secret = $query->fetch();

						$validPassword = password_verify($password, $secret['password']);
				      if($validPassword) {
								session_start();
								$_SESSION['login_user'] = $secret['net_id'];
				      	$_SESSION['login_user_id'] = $secret['user_id'];
				      	$_SESSION['login_name'] = $secret['name'];
				      	$_SESSION['login_city'] = $username;
				      	$_SESSION['login_profilepic'] = $username;
				      	$_SESSION['login_bannerid'] = $username;
								header('Location: homepage.php');
							}
				      else {

				      	$error = 'username and password do not match.';
				      	//remove PHPSESSID from browser

								if ( isset( $_COOKIE[session_name()] ) )
								setcookie( session_name(), “”, time()-3600, “/” );
								//clear session from globals
								$_SESSION = array();
								//clear session from disk
								session_destroy();
								header('Location: index.php?register=error');
						  }
					}
					catch(PDOException $e){
					    echo "Error: " . $e->getMessage();
				 	}


		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}





?>
