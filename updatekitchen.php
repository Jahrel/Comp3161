<?php
if(isset($_POST["update"])){
    session_start();
    require_once "dbconnection.php";
    require_once "generatestring.php";

    $userid=$_SESSION['userid'];
    $ingredientname = trim($_POST["ingredient"]);
    $quantity = $_POST['quantity'] + 0;
    $unit = trim($_POST['unit']);

    $query ='INSERT INTO kitchen VALUES (:userid, :ingredientname,:quantity, :unit)';
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':userid',$userid);
    $stmt->bindValue(':ingredientname',$ingredientname);
    $stmt->bindValue(':quantity',$quantity);
    $stmt->bindValue(':unit',$unit);
    $stmt->execute();

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
    <link rel = "stylesheet" href = "updatekitchen.css">
    <title>Update Your Kitchen</title>
</head>
<body>
    <div class = "container">
        <div class ="mealform" id = "myForm">
        <form action="" method="post" enctype="multipart/form-data">
        <div class = "title">
            <h1>Add Ingredients</h1>
        </div>
        <div class = "right">
            <select  name="ingredient">
                <?php
                require_once "dbconnection.php";
                
                $stmt = $conn->prepare("SELECT * FROM ingredients");
                $stmt->execute();
                $ingredients = $stmt -> fetchAll(\PDO::FETCH_ASSOC);
    
                
                foreach ($ingredients as $ingredient ){

                   
                ?>
                
                <option value="<?=$ingredient['ingredientname'];?>"><?=$ingredient['ingredientname'];?></option>
                
                <?php
                }
                ?>
            </select>
            <input type="number" class = "meal" id="meal" name="quantity" placeholder = "How much is left">
            <select  name="unit">
                <?php
                require_once "dbconnection.php";
                
                $stmt = $conn->prepare("SELECT * FROM measurement");
                $stmt->execute();
                $measurements = $stmt -> fetchAll(\PDO::FETCH_ASSOC);
    
                
                foreach ($measurements as $measurement ){

                   
                ?>
                
                <option value="<?=$measurement['measurementunit'];?>"><?=$measurement['measurementunit'];?></option>
                
                <?php
                }
                ?>
            </select>

            <div class = "type">
            
                   
                    
            </div>
            
        
            
        </div>

        
        <div class = "left">
            <
        </div>
        <div class="sendinfo">
            <button  class ="btn" name="update" type="submit">Submit</button>
            <form method="post">
        <button class="btn"  name="back" method="post" type="submit">Back</button>    
            </form>
        </div>
        </div>   
        </form>     
    </div>
        
</body>
</html>