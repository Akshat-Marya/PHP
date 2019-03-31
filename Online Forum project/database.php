<?php
#making database connection
$servername = "db.cs.dal.ca";
$username = "marya";
$password = "B00784526";
$dbname = "marya";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    die();
    }


?>