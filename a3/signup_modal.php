<?php

include 'database.php';



$net_id = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$name = $_POST['name'];
$city = $_POST['address'];
$hash_pass = password_hash($password, PASSWORD_DEFAULT);




$obj = new Register;
$obj->registerUser($net_id, $password, $name, $city, $hash_pass);


#handles registering; isnerts user data into database
class Register{

	public function registerUser($net_id, $pass, $name, $city, $hash_pass){
					include 'database.php';
					#echo $net_id, $pass, $hash_pass;
			try{
			  $query = $conn->prepare("INSERT INTO user (net_id, password, name, city) VALUES (?, ?, ?, ?)");
			  		$query->bindParam(1, $net_id);
			  		$query->bindParam(2, $pass);
			  		$query->bindParam(3, $name);
			  		$query->bindParam(4, $city);
					$query->execute();

					echo "Thank you for registering".$name."You can now Login, you will be redirected automatically.";
					header( "refresh:5;url= index.php" );
			 } 
			catch(PDOException $e){
			    echo "Error: " . $e->getMessage();
			    }



			}
}














