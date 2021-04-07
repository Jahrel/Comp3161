<?php

require_once "dbconnection.php";
require_once "generatestring.php";

session.start();

$currentdate = date("Y-m-d");
$userid = $_SESSION['userid'];
$recipename = trim($_REQUEST["recipe"]);
$preptime = trim($_REQUEST["preparationtime"]);

//Generate a random id
$recipeid='RID';
$recipeid.= generate_string($permitted_chars,10);

//Is id in database?
$query = 'SELECT COUNT(recipeid) AS amount FROM recipe WHERE recipeid = :recipeid';
$stmt = $conn->prepare($query);
$stmt->bindValue(':recipeid', $recipeid);
$stmt->execute();
$row = $stmt ->fetch(PDO::FETCH_ASSOC);

//generates new id until id is unique and not in db
while($row['amount'] > 0){
    $recipeid='RID';
    $recipeid.= generate_string($permitted_chars,10);
    $stmt->bindValue(':recipeid', $recipeid);
    $stmt->execute();
    $row = $stmt ->fetch(PDO::FETCH_ASSOC);
}




$query = "INSERT INTO recipe VALUES (:recipeid"