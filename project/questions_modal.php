<?php

include 'database.php';

class Questions{

	public $text=" this is public value";
	#fetch all questions from database; latest first.
	public function get_posts(){
		include 'database.php';
	try{
	      $query = $conn->prepare("SELECT * FROM question ORDER BY question_id DESC");
	      $query->execute();
	      $result = $query->fetchAll();

	     } 
	    catch(PDOException $e){
	        echo "Error: " . $e->getMessage();
	        }

	        	      return $result;

	    }
	    #testing function;doesn't do anything
	    public function testing()
		{
			$text="this is a test function";
			
			return $text;
		}
		#get's a single question's data from the database
		public function get_single($id){
			include 'database.php';
			try{
		      $query = $conn->prepare("SELECT * FROM question WHERE question_id = ?");
		      $query->execute(array($_GET['id']));
		      $result = $query->fetch();

		     }
		    catch(PDOException $e){
		        echo "Error: " . $e->getMessage();
		        }

		        	      return $result;


		}
			#get's questions by person's user_id
			public function get_by_personid($id){
			include 'database.php';
			try{
		      $query = $conn->prepare("SELECT * FROM news WHERE PERSON_ID = ?");
		      $query->execute(array($_GET['id']));
		      $result = $query->fetch();

		     }
		    catch(PDOException $e){
		        echo "Error: " . $e->getMessage();
		        }

		        	      return $result;


		}


}