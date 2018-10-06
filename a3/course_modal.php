<?php

include 'database.php';

class Questions{

	public $text=" this is public value";
		#saerches the database for questions on particular course
		public function get_search($id){
			include 'database.php';
			try{
		      $query = $conn->prepare("SELECT * FROM question WHERE courseTag = ?");
		      $query->execute(array($_GET['id']));
		      $result = $query->fetchAll();

		     }
		    catch(PDOException $e){
		        echo "Error: " . $e->getMessage();
		        }

		        	      return $result;


		}


}