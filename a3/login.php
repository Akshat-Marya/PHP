








<?php
session_start();
#reference https://www.formget.com/login-form-in-php/

include 'database.php';


$error = "";
$username = $_POST['username'];
$password = $_POST['password'];
#handles login, fetching from database to check if username and apssword match
try{
$query = $conn->prepare("SELECT * FROM user WHERE net_id = ?");
		      $query->execute(array($username));
		      $secret = $query->fetch();

		      if(strcmp($secret['password'],$password))
		      {
		      	echo 'username and password do not match.';
		      	$error = 'username and password do not match.';
		      	//remove PHPSESSID from browser
				if ( isset( $_COOKIE[session_name()] ) )
				setcookie( session_name(), “”, time()-3600, “/” );
				//clear session from globals
				$_SESSION = array();
				//clear session from disk
				session_destroy();
				header('Location: index.php');
		      }
		      else{
		      	$_SESSION['login_user'] = $secret['net_id'];
		      	$_SESSION['login_user_id'] = $secret['user_id'];
		      	$_SESSION['login_name'] = $username;
		      	$_SESSION['login_city'] = $username;
		      	$_SESSION['login_profilepic'] = $username;
		      	$_SESSION['login_bannerid'] = $username;
		      	echo $_SESSION['login_user'];
		      	header('Location: homepage.php');
		      }

 }
catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    }







?>