<?php

include 'database.php';

class Questions{

	public $text=" this is public value";
		#feetches questions according to tag selected in search
		public function get_search($tag){
			include 'database.php';
			try{
		      $query = $conn->prepare("SELECT * FROM question WHERE courseTag = ? ORDER BY question_id DESC");
		      $query->execute(array($_GET['tag']));
		      $result = $query->fetchAll();

		     }
		    catch(PDOException $e){
		        echo "Error: " . $e->getMessage();
		        }

		        	      return $result;


		}


}