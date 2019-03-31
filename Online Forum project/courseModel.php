<?php 
/** Referred stack-overflow*/
session_start();
include 'database.php';
class courses {
public function course_Headers($id) {
include "database.php";
try{
$query = $conn->prepare("SELECT * FROM course WHERE courseTag=?");
$query->execute(array($_GET['id']));
$result = $query->fetch(PDO::FETCH_ASSOC);
} 
catch(PDOException $e){
echo "Error: " . $e->getMessage();
}
return $result;
}
public function get_questions($id){
include 'database.php';
try{
$query = $conn->prepare("SELECT * FROM question WHERE courseTag=? ORDER BY question_id DESC");
$query->execute(array($_GET['id']));
$result = $query->fetchAll(PDO::FETCH_ASSOC);
} 
catch(PDOException $e){
echo "Error: " . $e->getMessage();
}
return $result;
}
}
?> 
