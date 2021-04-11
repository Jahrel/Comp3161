<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>Meal Planner Online</title>
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script> 
      <link href="searchmeal.css" rel="stylesheet" type="text/css">
      

  </head>
  <body>
      <header>
          <div class = "container">
              <div class = "header">
                    <p> Meal Planner Online </p> 
                    <h3>Meal Search</h3>   
              </div>
          </div>
  </header>
  <marquee behavior="scroll" direction="left"></marquee>
    <div class = "SearchFA">
      <h1>Search by Meal Name</h1>
   
    </div>
  </marquee>
      <div class="searchbar">

        <form action="" method="post">
        <input type="text" id = "text_field" name="name" class="searchTerm" placeholder="e.g Baked chicken">
        <button type="Search" id = "srchbutton" name = "searchmeal" class="searchButton" style = "color:white">Search</button>
        <form method="post">
        <button class="btn"  name="back" method="post" type="submit">Back</button>    
            </form>
        </form>
    </div>
    <div class = "Results">
        <h2>RESULT</h2>
        <hr>

    </div>

    <div id = "result">
      <table>
        <tr>
        <td>Mealname</td>
        <td>Meal Type</td>
        <td>Serving</td>
        <td>Image</td>
        </tr>

        <?php
        if(isset($_POST["searchmeal"])){
            session_start();
            require_once "dbconnection.php";
            require_once "generatestring.php";
    
            $mealname = trim($_POST["name"]);
            //Join all meal tables . user should only see his table
            $query="SELECT mealname,mealtype,serving,image FROM meal WHERE mealname LIKE :mealname";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':mealname', '%'.$mealname.'%' );
            $stmt->execute();
            $meals = $stmt -> fetchAll();
            foreach($meals as $meal){
            echo "<tr>".
            "<td>" . $meal["mealname"] . "</td>" .
            "<td>" . $meal["mealtype"]. "</td>" .
            "<td>" . $meal["serving"]. "</td>" .
            "<td>"."<img src=".$meal['image'].">"."</td>".
            "</tr>";
        }
    }
    if(isset($_POST["back"])){
      header('Location: landing.html');
  }
        ?>
        </table>
    </div>

 

    </body> 
