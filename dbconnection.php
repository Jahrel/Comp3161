<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "recipeapp";

try {
    $conn = new PDO("mysql:host=$servername;dbname=recipeapp", $username, $password);

    $conn-> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
} catch (PDOExceotin $e){
    echo $e->getMessage();
}
?>