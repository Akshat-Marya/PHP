<!-- Database fetch php - Controller of our web application

    This file is used as a controller for the application. It has different functions written to execute different
    functionalities of the application.
    Functions are called from view pages by creating object of the class in that file.

  -->
<?php
session_start();
include "database.php";

class Questions {
  public function questions_homepage() {
    include "database.php";

    try{
      $stmt = $conn->prepare("SELECT * FROM question ORDER BY question_id DESC");
			$stmt->execute();
			$output = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e)
  	{
  	  echo "Cannnot Retreive Questions: Please try again Later ! " . $e->getMessage();
  	}
    return $output;
  }

  public function courses_homepage() {
    include "database.php";

    try{
      $stmt = $conn->prepare("SELECT * FROM course");
			$stmt->execute();
			$output = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e)
  	{
  	  echo "Cannnot Retreive Questions: Please try again Later ! " . $e->getMessage();
  	}
    return $output;
  }

  public function individual_question($id) {
    include "database.php";

    try{
      $stmt = $conn->prepare("SELECT * FROM question WHERE question_id = ?");
			$stmt->execute(array($_GET['id']));
			$output = $stmt->fetch();
    }
    catch(PDOException $e)
  	{
  	  echo "Cannnot Retreive Questions: Please try again Later ! " . $e->getMessage();
  	}
    return $output;
  }

  public function answers($id) {
    include "database.php";

    try{
      $stmt = $conn->prepare("SELECT * FROM answer WHERE question_id = ? ORDER BY answer_id DESC");
			$stmt->execute(array($_GET['id']));
			$output = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e)
  	{
  	  echo "Cannnot Retreive Questions: Please try again Later ! " . $e->getMessage();
  	}
    return $output;
  }

  
  public function questions_profilepage() {
    include "database.php";

    try{
      $stmt = $conn->prepare("SELECT DISTINCT(q.question_id ), question FROM `question` q LEFT JOIN `answer` a ON q.question_id=a.question_id WHERE q.user_id=:uid OR a.user_id=:uid ORDER BY q.question_id DESC");
      $stmt->bindParam(':uid', $_SESSION['login_user_id']);
      $stmt->execute();
      $output = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e)
    {
      echo "Cannnot Retreive Questions: Please try again Later ! " . $e->getMessage();
    }

    return $output;
  }
}

?>

<!--
[1]a. Mark Otto, "Bootstrap", Getbootstrap.com, 2018. [Online]. Available: https://getbootstrap.com/. [Accessed: 28- Jul- 2018].
[2]"Free PHP IP Geolocation API by Geoplugin", Geoplugin.com, 2018. [Online]. Available: https://www.geoplugin.com/webservices/php. [Accessed: 28- Jul- 2018].
[3]2018. [Online]. Available: http://www.opensource.org/licenses/mit-license.html MIT License. [Accessed: 28- Jul- 2018].
 -->
