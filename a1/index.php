<? php
  session_start();
  if(isset($_SESSION['username'])) {
    echo "Your session is running " . $_SESSION['username'];
    header( "refresh:3;url=./login.php" );
  }
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width"/>
    <meta name="description" content="A website about my kitten"/>
    <meta name="keywords" content="cute,cat,kitten,cats"/>
    <meta name="robots" content="index,follow,noarchive"/>
    <title>MyPet</title>
    <link rel="stylesheet" href="./css/reset.css"/>
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
            <li class="current_page"><a href="index.php">Home</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="register.php">register</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <section id="banner_hero">
      <div class="container">
        <h1>Get hooked to kittens</h1>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>
    </section>

    <section id="wrapper">
      <div class="container">
        <div class="wrapper_1">
          <img src="./img/front_pose.jpg">
          <h3>First cute pic</h3>
          <p>this is when we brought him</p>
        </div>
        <div class="wrapper_1">
          <img src="./img/front_pose.jpg">
          <h3>Second cute pic</h3>
          <p> this is when he was posing for pics</p>
        </div>
        <div class="wrapper_1">
            <img src="./img/front_pose.jpg">
          <h3> Third cute pic</h3>
          <p> this is when she was eating.</p>
        </div>
      </div>

    </section>

    <footer>
        <p>He's not as innocent as he looks</p>
      </footer>




  </body>
</html>
