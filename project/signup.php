
<!DOCTYPE html>
<html lang="en">
  <head>
	  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	  <title>Simposio-Signup</title>
	  <link rel="stylesheet" href="css/common.css">
	  <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="reset.css">
    <script>
    	var check = function() {
          if (document.getElementById('password').value ==
              document.getElementById('confpassword').value) {
              document.getElementById('message').style.color = 'green';
              document.getElementById('message').innerHTML = '&#x2714';
          } else {
          		document.getElementById('message').style.color = 'red';
              document.getElementById('message').innerHTML = '&#x2718';
          }
      }
  	</script>
  </head>

  <body>
  <!-- Referred w3 schools for the reference
	https://www.w3schools.com/html/html_css.asp -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <nav class="navbar navbar-expand-xl navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-dark fixed-top">
	  <div class="header">
  	  <ul class="navbar-nav">
    		<li>
  		  <a class="navbar-brand" href="index.php"	>S I M P O S I O   </a>
    		</li>
  	  </ul>
  	  <span class="navbar-text">
  		     communicate, collaborate & critique
  	  </span>
	  </div>
    <ul class="navbar-nav">
  <li class="nav-item">
    <a href="index.php" class="btn btn-primary" id="signup">Log In</a>
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
                    <h5> S I M P O S I O - Sign Up </h5>
                    <?php
                    include "geoplugin.class.php";
                    $geoplugin = new geoPlugin();
                    $geoplugin->locate();
                    ?>

                    <form class="form-horizontal" action="registration.php" target="_self" method="post">
                      <div class="error"><span><?php
                					$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                				if (strpos($fullUrl, "register=error") == true) {
                					echo "Unable to Register Please Try Again !" ;
                				}
                				elseif (strpos($fullUrl, "register=emailerr") == true) {
                					echo " NetId / Banner Id Already Exists! " ;
                				}?>
                			</span></div>
                      <div class="form-group">
                        <input required type="text" class="form-control" size="30" name="name" id="name" placeholder="Name" pattern="[A-Za-z]{1,32}" title="Only Alphabets !">
                      </div>
                      <div class="form-group">
                        <input required type="text" class="form-control" name="netid" id="netid" placeholder="NetId" size="30" pattern=".+@dal.ca" title="Must be a dal.ca email address">
                      </div>
                      <div class="form-group">
                        <input required type="password" class="form-control" name="password" id="password" size="30" minlength="8" maxlength="22" onkeyup="check();" placeholder="Password" title="Password must be atleast 8 digits">
                      </div>
                      <div class="input-group form-group">
                        <input required type="password" class="form-control" name="confpassword" id="confpassword" size="30" minlength="8" maxlength="22" onkeyup="check();" placeholder="Confirm Password" >
                        <div class="input-group-append">
                          <span id='message'></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="city" id="city" value="<?php echo $geoplugin->city ?>" disabled>
                      </div>
                      <div class="form-group">
                        <input required type="text" class="form-control" name="bannerid" id="bannerid" placeholder="BannerId" size="30" pattern="[B0-9]{9}" title="Please enter valid Banner Id !">
                      </div>
                      <button onclick="check()" type="submit" class="btn btn-primary" >Sign Up</button>
                    </form>
                  </div>
                </div>
              </div>
          </section>
          </div>
      </div>
    </section>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom footer">
		<span class="navbar-text">
			S I M P O S I O
		</span>
	</nav>

	</body>

</html>

<!-- References:
[1]a. Mark Otto, "Bootstrap", Getbootstrap.com, 2018. [Online]. Available: https://getbootstrap.com/. [Accessed: 28- Jul- 2018].
[2]"Free PHP IP Geolocation API by Geoplugin", Geoplugin.com, 2018. [Online]. Available: https://www.geoplugin.com/webservices/php. [Accessed: 28- Jul- 2018].
[3]2018. [Online]. Available: http://www.opensource.org/licenses/mit-license.html MIT License. [Accessed: 28- Jul- 2018].
 -->
