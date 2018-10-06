<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width"/>
    <meta name="description" content="A website about my kitten"/>
    <meta name="keywords" content="cute,cat,kitten,cats"/>
    <meta name="robots" content="index,follow,noarchive"/>
    <title>MyPet</title>
    <link rel="stylesheet" href="./css/style.css"/>
  </head>

  <body>
    <header>
      <div class="container">
        <div id="logo">
          <img src="./img/front_pose.jpg"/>
        </div>
        <nav>
          <ul>
            <li><a href="index.php">Home</a></li>
              <li><a href="login.php">Login</a></li>
              <li class="current_page"><a href="register.php">register</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <section id="main">
      <div class="container">
        <h1>Register to get more cute pics of Kitten!</h1>
        <form method="POST" id="registeration_form" action="./includes/registeration.php" >
          * Your username:<input type="text" placeholder="username" name="username">
          <span class="error"> <?php echo $usernameErr;?></span><br><br><br>
          * Your FIRST name:<input type="text" placeholder="First Name" name="first_name"><br>
          <span class="error"> <?php echo $firstnameErr;?></span><br><br><br>
          * Your LAST name:<input type="text" placeholder="Last Name" name="last_name"><br>
          <span class="error"> <?php echo $lastnameErr;?></span><br><br><br>
          * Your password:<input type="password" placeholder="password" name="password"><br>
          <span class="error"> <?php echo $passErr;?></span><br><br><br>
          Confirm password:<input type="password" placeholder="retype password" name="c_password"><br>
          <span class="error"> <?php echo $c_passErr;?></span><br><br><br>
          * Your EMAIL:<input type="email" placeholder="email" name="email"><br>
          <span class="error"> <?php echo $emailErr;?></span><br><br><br>
          Your Address:<input type="text" placeholder="address" name="address"><br>
          <span class="error"> <?php echo $addErr;?></span><br><br><br>
          Your Postal Code:<input type="text" placeholder="postal_code" name="postal_code"><br>
          <span class="error"> <?php echo $postal_codeErr;?></span><br><br><br>
          <button type="submit" class="button">Register</button>
        </form>
      </div>
    </section>
    <footer>
        <p>He's not as innocent as he looks</p>
      </footer>




  </body>
</html>
