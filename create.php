<?php



if(isset($_POST["createmeal"])){
    require_once "dbconnection.php";
    require_once "generatestring.php";

    session_start();
    $recipename = trim($_POST["recipe"]);
    $mealtype = trim($_POST["type"]);
    $inputservings=trim($_POST["inputservings"]) + 0;
    $img=$_FILES['image']['name'];
    $imgcont = "images/".basename($img);

//Generate a random id
$mealid='MID';
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
$query ='INSERT INTO meal VALUES (:mealid, :recipename, :mealtype, :inputservings, :img)';
$stmt = $conn->prepare($query);
$stmt->bindValue(':mealid',$mealid);
$stmt->bindValue(':recipename', $recipename);
$stmt->bindValue(':mealtype', $mealtype);
$stmt->bindValue(':inputservings', $inputservings);
$stmt->bindValue(':img', $imgcont);

$result = $stmt->execute();

if($result){
    echo '<script>alert("Meal added)</script>';
}
}
if(isset($_POST["back"])){
    header('Location: landing.html');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "create.css">
    <title>Create Meal</title>
</head>
<body>
    <div class = "container">
        <div class ="mealform" id = "myForm">
        <form action="" method="post" enctype="multipart/form-data">
        <div class = "title">
            <h1> Meal Form</h1>
        </div>
        <div class = "right">
        <select class="mul-select"  name="recipe">
                            <?php
                            require_once "dbconnection.php";
                            session_start();
                            $userid=$_SESSION['userid'];
                            $query="SELECT recipename FROM recipe where recipeid in(select recipeid from user_recipe where userid=:userid)";
                            $stmt = $conn->prepare($query);
                            $stmt->bindValue(":userid", $userid);
                            $stmt->execute();
                            $recipes = $stmt -> fetchAll(\PDO::FETCH_ASSOC);
                
                            
                            foreach ($recipes as $recipe ){
            
                               
                            ?>
                            
                            <option value="<?=$recipe['recipename'];?>"><?=$recipe['recipename'];?></option>
                            
                            <?php
                            }
                            ?>
                        </select>
        
            <style>
                .type{
                    margin: 10px 0;
                    border: 0px;
                    padding: 10px;
                    color: black;
                    width: 100%;
                }
            </style>
            <div class = "type">
            <label type ="text" for="type">Meal Type</label>
                    <select name="type" id="type">
                    <option value="Breakfast">Breakfast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                
            </div>
        
            <input type="text" class = "meal" name="inputservings" placeholder= "Input Servings"required>   
        </div>
        <div class = "left">
            <input type="file" accept = "image/*" class = "meal" name="image" placeholder= "Image Upload"required>   
        </div>
        <div class="sendinfo">
            <button  class ="btn" name = "createmeal" type="submit">Submit</button>
            <form method="post">
        <button class="btn"  name="back" method="post" type="submit">Back</button>    
            </form>
        </div>
        </div>   
        </form> 
        
    </div>
        
</body>
</html>