<?php
session_start();
?>

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
              <li class="current_page"><a href="login.php">Login</a></li>
              <li><a href="register.php">register</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <section id="main">
      <div class="container">
        <h1>Login to see cute pics of kittens!</h1>
        <form method="POST" id ="login_form" action="./includes/welcome.php" >
          <input type="text" placeholder="username" name="username"><br>
          <input type="password" placeholder="password" name="password"><br>
          <button type="submit" class="button">Login</button>
        </form>
      </div>
    </section>
    <footer>
        <p>He's not as innocent as he looks</p>
      </footer>
  </body>
</html>
