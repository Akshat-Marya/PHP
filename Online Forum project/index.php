
<?php
			session_start();
			if(isset($_SESSION['login_user'])){
				header("Location: homepage.php");
			}



?>

<!DOCTYPE html>
<html lang="en">





  <head>
	  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <title>Index</title>
	  <link rel="stylesheet" href="css/common.css">
	  <link rel="stylesheet" href="index.css">
  </head>

  <body>
  <!-- Referred w3 schools for the reference
	https://www.w3schools.com/html/html_css.asp -->
	<nav class="navbar navbar-expand-xl navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-dark fixed-top">
	  <div class="header">
	  <ul class="navbar-nav">
		<li>
		  <a class="navbar-brand" href="index.php">S I M P O S I O  <?php echo $_SESSION['login_user'];?> </a>
		</li>
	  </ul>
	   <span class="navbar-text">
		communicate, collaborate & critique
	   </span>
	   </div>
		  <ul class="navbar-nav">
		<li class="nav-item">
		  <a href="signup.php" class="btn btn-primary" id="signup">Sign Up</a>
		</li>

		<!-- <li class="nav-item dropdown">
		  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
			Profile
		  </a>
		  <div class="dropdown-menu">
			<a class="dropdown-item" href="profile.html">Account</a>
			<a class="dropdown-item" href="settings.html">Settings</a>
			<a class="dropdown-item" href="index.html">SignOut</a>
		  </div>
		</li> -->
	  </ul>

	</nav>


    <section>
        <div class="jumbotron jumbotron-fluid bg-light bg-cover mb-0" style="height:100vh;">
          <div class="container bg-text">
            <section>
                <div class="row animated lightSpeedIn">
                  <div class="card mx-auto col-lg-6">
                    <div class="card-body" >
                      <h4> Login </h4>
                      <div class="error"><span><?php
            				$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            			if (strpos($fullUrl, "register=error") == true) {
            				echo "Invalid Net Id/Password Combination !" ;
            			}
            			elseif (strpos($fullUrl, "register=signup") == true) {
            				echo "Registration Successfull, Login with Net Id & Password !" ;
            			}
            			?>
            		</span></div>
                      <form action="login.php" method="POST">
                        <div class="form-group">
                          <label for="formGroupExampleInput" class="my-2">Your Net Id:</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="NetId" size="30" pattern=".+@dal.ca" title="Must be a dal.ca email address" name="username">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2" class="my-2">Password:</label>
                          <input type="password" class="form-control" id="formGroupExampleInput2" minlength="8" maxlength="22" placeholder="Password" name="password" title="Password must be atleast 8 digits">
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary animated bounce" value="login">
                        <span><?php echo $error; ?></span>
                      </form>
                    </div>
                  </div>
                </div>
            </section>
            </div>
        </div>
      </section>

	</body>

</html>
