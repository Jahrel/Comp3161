<?php
if(isset($_REQUEST["back"])){
  header('Location: landing.html');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>Meal Planner Online</title>
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script> 
      <link href="shoppinlist.css" rel="stylesheet" type="text/css">
      

  </head>
  <body>
    <div class=list>
      
              <div class = "header">
                    <p> Meal Planner Online </p> 
                    <h3>View Kitchen </h3>   
              </div>
          
  
  <!--<img src='https://organisedhq.com.au/wp-content/uploads/2019/10/TOH-shopping-list-notepad-2019-e1571456492413.png' width="400" height="250">-->
    <div class = "SearchFA">
      <h1>You have in your Kitcken:</h1>
      <hr>
    </div>
 

    <div class = "result">
      <!--output data as list from database-->
      <table>
        <tr>
        <td>Ingredient</td>
        <td>Quantity</td>
        <td>Unit</td>
        </tr>

        <?php
        
            session_start();
            require_once "dbconnection.php";
            $userid = $_SESSION['userid'];
            $query="SELECT ingredientname,quantity, unit FROM kitchen WHERE userid = :userid";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':userid', $userid);
            $stmt->execute();
            $ingredients = $stmt -> fetchAll();
            foreach($ingredients as $ingredient){
            echo "<tr>".
            "<td>" . $ingredient["ingredientname"] . "</td>" .
            "<td>" . $ingredient["quantity"]. "</td>" .
            "<td>" . $ingredient["unit"]. "</td>" .
            "</tr>";
        }
    
        ?>
        </table>
    </div>
    <form method="post">
        <button class="btn"  name="back" method="post" type="submit">Back</button>    
            </form>
</div>


    </body> 