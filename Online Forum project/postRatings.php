<?php
include 'database.php';
session_start();
$Toughness = $_POST['Toughness'];
$WorkLoad = $_POST['WorkLoad'];
$Strictness = $_POST['Strictness'];
$userId = $_SESSION['login_user_id'];
$courseTag = $_POST['courseTag'];

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query1 = $conn->prepare("INSERT INTO ratings (courseTag,user_id,ratingTitleId,rating) VALUES ('$courseTag', '$userId', '1', '$Toughness');");
$query1->execute();
$query2 = $conn->prepare("INSERT INTO ratings (courseTag,user_id,ratingTitleId,rating) VALUES ('$courseTag', '$userId', '2', '$WorkLoad');");
$query2->execute();
$query3 = $conn->prepare("INSERT INTO ratings (courseTag,user_id,ratingTitleId,rating) VALUES ('$courseTag', '$userId', '3', '$Strictness');");
$query3->execute();
header("Location:course_view.php?id=$courseTag");
?>
