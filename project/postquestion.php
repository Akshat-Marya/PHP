<!-- postquestion is a controller for this application
It allows user to either post a question in the forum or post a reply to any question in the corresponding pages.
 -->
<?php

include "database.php";
session_start();

$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($fullUrl, "register=question") == true) {

  $Tag = ($_POST['tag']);
  $UserId = $_SESSION['login_user_id'];
  $Question = $_POST['question'];

  try {
  $sql = "INSERT INTO question (question, user_id, courseTag)
      VALUES ('$Question', '$UserId', '$Tag')";
    if($conn->exec($sql)){
      header("location:home.php");
    }
    else {
      header("location:home.php?register=questionerror");
    }
  }
  catch(PDOException $e){
    header("location:home.php?register=questionerror");
  }

}
else if(strpos($fullUrl, "register=profilequestion") == true) {

  $Tag = ($_POST['tag']);
  $UserId = $_SESSION['login_user_id'];
  $Question = $_POST['question'];

  try {
  $sql = "INSERT INTO question (question, user_id, courseTag)
      VALUES ('$Question', '$UserId', '$Tag')";
    if($conn->exec($sql)){
      header("location:profile.php");
    }
    else {
      header("location:profile.php?register=questionerror");
    }
  }
  catch(PDOException $e){
    header("location:profile.php?register=questionerror");
  }

}
else if(strpos($fullUrl, "register=answer") == true)
{
  $Question_Id = $_POST['question_id'];
  $UserId = $_SESSION['login_user_id'];
  $Answer = $_POST['answer'];

  try{
    $query = $conn->prepare("INSERT INTO answer (answer, user_id, question_id) VALUES (?, ?, ?)");
        $query->bindParam(1, $Answer);
        $query->bindParam(2, $UserId);
        $query->bindParam(3, $Question_Id);
      if($query->execute()){
        header("location:questionpage.php?id=$Question_Id");
      }
      else {
        header("location:questionpage.php?register=questionerror");
      }
    }
    catch(PDOException $e){
      header("location:questionpage.php?register=questionerror");
    }

}

?>

<!-- References:
[1]a. Mark Otto, "Bootstrap", Getbootstrap.com, 2018. [Online]. Available: https://getbootstrap.com/. [Accessed: 28- Jul- 2018].
[2]"Free PHP IP Geolocation API by Geoplugin", Geoplugin.com, 2018. [Online]. Available: https://www.geoplugin.com/webservices/php. [Accessed: 28- Jul- 2018].
[3]2018. [Online]. Available: http://www.opensource.org/licenses/mit-license.html MIT License. [Accessed: 28- Jul- 2018].
 -->
