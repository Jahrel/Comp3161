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

        <form action="">
        <input type="text" id = "text_field" name="name" class="searchTerm" placeholder="e.g Baked chicken">
        <button type="Search" id = "srchbutton" name = "searchmeal" class="searchButton" style = "color:white">Search</button>
        </form>
    </div>
    <div class = "Results">
        <h2>RESULT</h2>
        <hr>

    </div>

    <div id = "result">
      <table>
        <tr>
        <td>Recipename</td>
        <td>Creation Date</td>
        </tr>

        <?php
        if(isset($_REQUEST["srchbutton"])){
            session_start;
            require_once "dbconnection.php";
            require_once "generatestring.php";
    
            $mealname = trim($_REQUEST["name"]);
            //Join all meal tables . user should only see his table
            $query="SELECT mealname,caloriecount FROM mealplan WHERE mealname LIKE :mealname";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':mealname', '%'.$mealname.'%' );
            $stmt->execute();
            $recipes = $stmt -> fetchAll();
            foreach($meals as $meal){
            echo "<tr>".
            "<td>" . $meal["mealname"] . "</td>" .
            "<td>" . $meal["caloriecount"]. "</td>" .
            "</tr>";
        }
    }
        ?>
        </table>
    </div>

 

    </body> 
