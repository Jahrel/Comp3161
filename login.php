<?php

require_once "dbconnection.php";
require_once "generatestring.php";



if(isset($_REQUEST["signupbtn"])){
    $firstname = trim($_REQUEST["firstname"]);
    $lastname = trim($_REQUEST["lastname"]);
    $password = trim($_REQUEST["password"]);

    //Generate a random id
    $id='UID';
    $id.= generate_string($permitted_chars,10);

    //Is id in database?
    $query = 'SELECT COUNT(userid) AS amount FROM user WHERE userid = :userid';
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':userid', $id);
    $stmt->execute();
    $row = $stmt ->fetch(PDO::FETCH_ASSOC);

    //generates new id until id is unique and not in db
    while($row['amount'] > 0){
        $id='UID';
        $id.= generate_string($permitted_chars,10);
        $stmt->bindValue(':userid', $id);
        $stmt->execute();
        $row = $stmt ->fetch(PDO::FETCH_ASSOC);
    }

    //INSERT new user in the database
    $query ='INSERT INTO user VALUES (:userid, :userpassword, :userfname, :userlname)';
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':userid',$id);
    $stmt->bindValue(':userpassword', $password);
    $stmt->bindValue(':userfname', $firstname);
    $stmt->bindValue(':userlname', $lastname);

    $result = $stmt->execute();
    
    if($result){
        echo '<script>alert("Registration has been successful")</script>';
    }

    
}

//Checks for signin
if(isset($_REQUEST["signinbtn"])){
    session_start();
    $firstname = trim($_REQUEST["firstname"]);
    $lastname = trim($_REQUEST["lastname"]);
    $password = trim($_REQUEST["password"]);

    $query = "SELECT userid,userpassword,userfname, userlname FROM user WHERE userpassword = :userpassword AND userfname =:userfname AND userlname=:userlname";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':userpassword', $password);
    $stmt->bindValue(':userfname', $firstname);
    $stmt->bindValue(':userlname', $lastname);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user === false){
        echo '<script>alert("There was a problem verifying the user. Please Try Again")</script>';
    } else{
        $_SESSION['user_id'] = $user['userid'];
        echo '<script>alert("Loginwas succesful")</script>';
        echo '<script>window.location("landing.html")</script>';
        header('Location: landing.html');
    }

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Meal Planner Online System </title>
    <link rel="stylesheet" href="login.css" />
    <script src="login.js"></script>
  </head>
  <body>
   
 
    <div class="form">
        <div class="name">
            <h1>Meal Planner Online</h1>
            <p> Meal Planner is the friendliest and most exciting interfece you will use to effectively schedule your meals</p>

        </div>
        <div class="form-container sign-in-container">
            <form action="#">
                <h1>Log in</h1>
                <input type="text" name="firstname" placeholder="First Name" />
                <input type="text" name="lastname" placeholder="Last Name" />
                <input type="password" name = "password" placeholder="Password" />
                <button type = "submit" name= "signinbtn" onclick = "redirecting()">Log In</button>
            </form>
            <script>
                function redirecting() {
                    window.location = "landing.html"
                }
            </script>
        </div>
 
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>Sign up</h1>
                <input type="text" name = "firstname" placeholder="First Name" />
                <input type="text" name = "lastname" placeholder="Last Name" />
                <input type="password" name = "password" placeholder="Password" />
                <button type= "submit" name = signupbtn>Sign Up</button>
            </form>
        </div>
        
    </div>
       
    </div>
</html>