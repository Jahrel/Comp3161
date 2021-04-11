<?php
if(isset($_POST["back"])){
    header('Location: landing.html');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>Meal Planner Online</title>
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script> 
      <link href="searchrecipe.css" rel="stylesheet" type="text/css">
      <script src="app.js"></script>

  </head>
  <body>
      <header>
          <div class = "container">
              <div class = "header">
                    <p> Meal Planner Online </p> 
                    <h3>Recipe Search</h3>   
              </div>
          </div>
  </header>
  <marquee behavior="scroll" direction="left"></marquee>
    <div class = "SearchFA">
      <h1>Search by Recipe Name</h1>
   
    </div>
  </marquee>
      <div class="searchbar">

        <form action="" method="post">
        <input type="text" name="recipename" placeholder="SEARCH">
        <button type="Search" name = "srchbutton" class="searchButton" style = "color:white">Search</button>
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
    



    
        

        <?php
        if(isset($_POST["srchbutton"])){
            session_start();
            require_once "dbconnection.php";
            require_once "generatestring.php";
            $userid = $_SESSION['userid'];
            $recipename=$_POST["recipename"];
            //Join all recipe tables . user should only see his table Want to fix
            $query="SELECT recipename, creationdate, caloriecount,preparationtime,instruction,ingredientname from recipe inner join recipe_details on recipe.recipeid=recipe_details.recipe_id inner join recipe_ingredients on recipe_details.recipe_id=recipe_ingredients.recipeid inner join recipe_instructions on recipe_instructions.recipeid=recipe_ingredients.recipeid where recipe.recipeid in(select recipeid from user_recipe where userid=:userid) and recipe.recipename =:recipename";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':userid', $userid);
            $stmt->bindValue(':recipename', $recipename);
            $stmt->execute();
            $recipes = $stmt -> fetchAll();
            echo "RecipeName:" .$recipes[0]["recipename"].
            "<br>".
        
             $recipes[0]["creationdate"].
             "<br>".
             $recipes[0]["caloriecount"] .
             "<br>".
             $recipes[0]["preparationtime"];
            foreach($recipes as $recipe){
            echo 
            
            
               
             
             $recipe["instruction"] ;

            
        }
    }
    if(isset($_POST["details"])){
        header('Location :recipedetail.php');
    }
        ?>

        </table>

       
    </div>

 

    </body> 
</html>