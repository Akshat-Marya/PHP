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
          //username
          $isError = "False";
            if(empty($_POST['username']))
            {
              $usernameErr = "Name is required";
              $isError = "True";
            }
            else {
              // code...
            }

            //FirstName
            if(empty($_POST['first_name']))
            {
              $firstnameErr = "Name is required";
              $isError = "True";
            }
            else {
              // code...
            }

            //LastName
            if(empty($_POST['username']))
            {
              $lastnameErr = "Name is required";
              $isError = "True";
            }
            else {
              // code...
            }

            //password
            if(empty($_POST['password']))
            {
              $passErr = "password is required";
              $isError = "True";
            }
            else {
              // code...
            }

            //ConfirmPassword
            if($_POST['password'] != $_POST['c_password'])
            {
              $c_passErr = "password do not match";
              $isError = "True";
            }
            else {
              // code...
            }

            //address
            if(empty($_POST['address']))
            {
              $addErr = "address is required";
              $isError = "True";
            }
            else {
              // code...
            }

            //postal code
            if(empty($_POST['postal_code']))
            {
              $postal_codeErr = "postal code is required";
              $isError = "True";
            }
            else {
              // code...
            }



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


              $hashed_pass=password_hash($_POST["password"],PASSWORD_DEFAULT);

                if($isError == "False"){

                                $stmt = $conn->prepare("INSERT INTO a1_users VALUES (:username, :firstname, :lastname, :password, :email, :address, :postal_code)");

                                $stmt->bindParam(':username', $_POST["username"]);
                                $stmt->bindParam(':firstname', $_POST["first_name"]);
                                $stmt->bindParam(':lastname', $_POST["last_name"]);
                                $stmt->bindParam(':password',$hashed_pass);
                                $stmt->bindParam(':email', $_POST["email"]);
                                $stmt->bindParam(':address', $_POST["address"]);
                                $stmt->bindParam(':postal_code', $_POST["postal_code"]);

                                $stmt->execute();
                echo ":".$_POST["username"].", there are no more cute pics! But i have your details haha!";
              }
              else {
                echo "Invalid user.\n \n You will be redirected Automatically.";
                 header( "refresh:5;url=..//register.php" );

              }
            }
               catch(PDOException $e){
                 echo "error message".$e->getMessage();
                 echo "\n \n You will be redirected Automatically.". $e->getMessage();
                 header( "refresh:5;url=..//register.php" );
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
