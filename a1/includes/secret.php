<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width"/>
  <meta name="description" content="A website about my kitten"/>
  <meta name="keywords" content="cute,cat,kitten,cats"/>
  <meta name="robots" content="index,follow,noarchive"/>
  <title>MyPet</title>
  <link rel="stylesheet" href="..//css/style.css"/>
</head>

<body>
  <header>
    <div class="container">
      <div id="logo">
        <img src="..//img/front_pose.jpg"/>
      </div>
      <nav>
        <ul>
          <li><a href="..//index.php" onclick="./logout.php">LOGOUT</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <section id="main">
    <div class="container">
      <h1>
        <?php
        $servername="db.cs.dal.ca";
        $username="marya";
        $password="B00784526";
        $dbname="marya";
        try{
          $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $_POST["username"]= stripslashes($_POST["username"]);
          $_POST["username"]= htmlspecialchars($_POST["username"]);
          $_POST["username"]= trim($_POST["username"]);

          $_POST["password"]=stripslashes($_POST["password"]);
          $_POST["password"]=htmlspecialchars($_POST["password"]);
          $_POST["password"]=trim($_POST["password"]);

          $stmt = $conn->prepare("SELECT pass FROM a1_users WHERE username='".$_POST["username"]."'");
          $stmt->execute();

          $result = $stmt->fetchAll();

          //if(password_verify(form_pwd,$hashed_pass)){ redirect to welcome page}
          // if ($result != null)
          // {
            session_start();
            foreach($result as $row)
            {
              echo "From database : ".$row['pass'];
              echo "hashed:".password_hash($_POST['password'],PASSWORD_DEFAULT);
              if(password_verify($_POST['password'],$row['pass']))
              {
                echo "Welcome: ".$_POST["username"].", your email is: ".$row['email'].$row['pass'];

                $_SESSION['username']=$row['username'];
              }

              else{
              //  echo '<script type="text/javascript">alert("Your email and password do not match.");</script>';
                //header( "refresh:3;url=..//login.php" );
                echo "You will be redirected to login page automatically.";
              }
            }
          // }

        }
        catch(PDOException $e){
          echo"Error:". $e->getMessage();
        }
        $conn = null;
        ?>
      </h1>
    </div>
  </section>
  <footer>
    <p>He's not as innocent as he looks</p>
  </footer>
</body>
</html>
