<?php
include 'database.php';
session_start();




$question = $_GET['question'];
$tag = $_GET['tag'];
$user_id = $_SESSION['login_user_id'];





$obj = new Post_question;
$obj->postQuestion($question, $tag, $user_id);


#handles posting a question by inserting into database
class Post_question{

	public function postQuestion($question, $tag, $user_id){
					include 'database.php';

			try{
			  $query = $conn->prepare("INSERT INTO question (question, user_id, courseTag) VALUES (?, ?, ?)");
			  		$query->bindParam(1, $question);
			  		$query->bindParam(2, $user_id);
			  		$query->bindParam(3, $tag);
					$query->execute();
					header( "refresh:0;url= index.php" );
			 } 
			catch(PDOException $e){
			    echo "Error: " . $e->getMessage();
			    }



			}
}







?>