--use the stored procedure to compare ingredients listed for the
-- to meal to what is available in the kitchen then output the 
--ingredients that are needed


 DELIMITER //
 CREATE PROCEDURE shoppinglist()
 BEGIN
 select ingredient_name, measurement from ingredients inner join mealplan on ingredients.recipe_id= mealplan.recipe_id in(select ingredientname, measurement from ingredients inner join  kitchen on ingredient.ingredientid=kitchen.ingredientid where ingredient.measurement<kitchen.quantity)
 END //
DELIMITER ;


/*
DELIMITER //
 CREATE PROCEDURE shoppinglist(in mealid char(6))
 BEGIN
 select ingredient_name, measurement 


select ingredientname, measurement from ingredients inner join  kitchen on ingredient.ingredientid=kitchen.ingredientid where ingredient.measurement<kitchen.quantity
 
 END //
DELIMITER ;*/

--

DELIMITER //
 CREATE PROCEDURE kitchen()
 BEGIN
 


 END //
DELIMITER ;