  
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>Meal Planner Online</title>
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script> 
      <link href="generatecalorie.css" rel="stylesheet" type="text/css">
      <script src="app.js"></script>

  </head>
  <body>
      <header>
          <div class = "container">
              <div class = "header">
                    <p> Meal Planner Online </p> 
                    <h3>Calorie Generation</h3>   
              </div>
          </div>
  </header>
  <marquee behavior="scroll" direction="left"></marquee>
    <div class = "SearchFA">
      <h1> Generate by Calorie Amount</h1>
   
    </div>
  </marquee>
      <div class="searchbar">

        <form action="">
        <input type="number" id = "text_field" name="name" class="searchTerm" placeholder="e.g 200">
        <button type="Search" id = "srchbutton" class="searchButton" style = "color:white">Generate</button>
        </form>
    </div>
    <div class = "Results">
        <h2>RESULT</h2>
        <hr>
        
        
        <table>
        <tr>
        <td>Meal Name</td>
        <td>Calorie</td>
        </tr>

        <?php
        if(isset($_REQUEST["srchbutton"])){
            session_start;
            require_once "dbconnection.php";
            require_once "generatestring.php";
    
            $recipename = trim($_REQUEST["name"]);
            //Join all recipe tables . user should only see his table
            $query="SELECT recipeid,recipename FROM recipe WHERE recipename LIKE :recipename";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':recipename', '%'.$recipename.'%' );
            $stmt->execute();
            $recipes = $stmt -> fetchAll();
            foreach($recipes as $recipe){
            echo "<tr>".
            "<td>" . $recipe["recipeid"] . "</td>" .
            "<td>" . $recipe["recipename"]. "</td>" .
            "</tr>";
        }
    }
        ?>
        </table>

    </div>

    <div id = "result">
      
    </div>

 

    </body> 
© 2021 GitHub, Inc.
Terms
Privacy
Security
Status
Docs
Contact GitHub
Pricing
API
Training
Blog
About
Loading complete