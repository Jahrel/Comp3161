<?php
    
    //Add to recipe table
    if(isset($_POST["addrecipe"])){
        require_once "dbconnection.php";
        require_once "generatestring.php";
        session_start();
        echo"Hello";
        print("Hello");
        $recipename = trim($_POST["recipename"]);
        $preptime = trim($_POST["preptime"]);
        $calories = trim($_POST["calorie"]);
        $creationdate = date("Y-m-d");
        $ingredients = $_POST['ingredients'];
        $instructions = $_POST['instruction'];

        
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
            //$row = $stmt ->fetch(PDO::FETCH_ASSOC);
        }
        
        
        //
        $query ='INSERT INTO recipe VALUES (:recipeid, :recipename)';
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':recipeid',$recipeid);
        $stmt->bindValue(':recipename',$recipename);
        $stmt->execute();

        $query='INSERT INTO user_recipe VALUES (:userid, :recipeid)';
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':userid',$_SESSION['userid']);
        $stmt->bindValue(':recipeid',$recipeid);
        
        $stmt->execute();

        //INSERT new recipe in the database
        $query ='INSERT INTO recipe_details VALUES (:recipeid, :preparationtime, :creationdate, :caloriecount)';
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':recipeid',$recipeid);
        $stmt->bindValue(':preparationtime', $preptime);
        $stmt->bindValue(':creationdate', $creationdate);
        $stmt->bindValue(':caloriecount', $calories);
        $stmt->execute();
    

    
        foreach ($ingredients as $ingredient){
            $query ='INSERT INTO recipe_ingredients VALUES (:recipeid, :ingredient)';
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':recipeid',$recipeid);
            $stmt->bindValue(':ingredient', $ingredient);
            $stmt->execute();
        }
        //Create a new instruction page for this
        foreach ($instructions as $instruction){
            $query ='INSERT INTO recipe_instruction VALUES (:recipeid, :instruction)';
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':recipeid',$recipeid);
            $stmt->bindValue(':instruction', $instruction);
            $stmt->execute();
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multilpe Select</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="recipe.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script>
        function addFields(){
            var number = document.getElementById("number").value;
            var container = document.getElementById("generate");
            
            
            for (i=0;i <number;i++){
                container.appendChild(document.createTextNode("Instruction" + (i+1)))
                var input = document.createElement("input");
                input.type="text";
                input.name="instruction[]" ;
                container.appendChild(input);
            }
        
            
        }
        
        
        
        
    </script>

    
    
    
</head>
<body>
    <div class = "container">
        <div class ="mealform" id = "myForm">
        
        
        <form action="#" method="post" >
        <div class = "title">
            <h1> Recipe Form</h1>
        </div>
        <div class = "right">
            <input type="text" class = "meal" name="recipename" placeholder= "Recipe Name" >  
            <input type="number" class = "meal" name="preptime" placeholder= "Preparation Time(In Minutes)">      
            <input type="number" class = "meal" name="calorie" placeholder= "Amount of calories">
            <input type="number" class = "meal" name= "number" id="number" placeholder="Enter the number of instructions to be generated">      
            <button id = "addstep" type= 'btn' onclick="addFields()">Add Instructions</button>
            <hr>
            <br>
            <div id = "generate">  
            </div>
            <hr>
            <div id = "showdata"></div>

        
        
        <style>
            .mul-select{
                width: 100%;
                height: 40%;
                margin: 10px 0;
                border: 0px;
                border-bottom: 2px solid black;
                padding: 10px;
                color: black;
            }
        </style>
            <br>
        
                

                    <div class="form-group">
                        <select class="mul-select" name="ingredients[]" multiple="true">
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
                    </div> 
               </div>
            </div>
            <div class="sendinfo">
                <button  class ="btn" name="addrecipe" type="submit">Submit</button>
            </div>
    </div>
        </form>     
       
</div>
</body>
      <!-- 
         This is a multiline comment and it can
         span through as many as lines you like.
      
        <script>
            
            $(document).ready(function(){
                $(".mul-select").select2({
                        placeholder: "select Ingredietnts", //placeholder
                        tags: true,
                        tokenSeparators: ['/',',',';'," "] 
                    });
                })
            */
        </script>
        -->
        

        
    

</html>
