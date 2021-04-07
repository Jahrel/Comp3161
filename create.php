<?php

require_once "dbconnection.php";
require_once "generatestring.php";

session_start();

if(isset($_REQUEST["createmeal"])){
    $mealname = trim($_REQUEST["meal"]);
    $mealtype = trim($_REQUEST["type"]);
    $inputservings=trim($_REQUEST["inputservings"]) + 0;
    $img=$_FILES['image']['tmp_name'];
    $imgcont = addslashes(file_get_contents($img));

//Generate a random id
$mealeid='MID';
$mealid.= generate_string($permitted_chars,10);

//Is id in database?
$query = 'SELECT COUNT(mealid) AS amount FROM meal WHERE mealid = :mealid';
$stmt = $conn->prepare($query);
$stmt->bindValue(':mealid', $mealid);
$stmt->execute();
$row = $stmt ->fetch(PDO::FETCH_ASSOC);

//generates new id until id is unique and not in db
while($row['amount'] > 0){
    $mealid='MID';
    $mealid.= generate_string($permitted_chars,10);
    $stmt->bindValue(':mealid', $mealid);
    $stmt->execute();
    $row = $stmt ->fetch(PDO::FETCH_ASSOC);
}

//INSERT new meal in the database
$query ='INSERT INTO meal VALUES (:mealid, :mealname, :mealtype, :inputservings, :img)';
$stmt = $conn->prepare($query);
$stmt->bindValue(':mealid',$mealid);
$stmt->bindValue(':mealname', $mealname);
$stmt->bindValue(':mealtype', $mealtype);
$stmt->bindValue(':inputservings', $inputservings);
$stmt->bindValue(':img', $imgcont);

$result = $stmt->execute();

if($result){
    echo '<script>alert("Registration has been successful")</script>';
}