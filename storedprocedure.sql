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

--draft mealplan

DELIMITER //
 CREATE PROCEDURE mealplan( in mealT char(25) )
 BEGIN
 
insert into mealplan (recipe_id, mealtype) values (select recipe_id from recipe in (select * from recipe ORDER BY RAND()
LIMIT 5),mealT);


 END //
DELIMITER ;

--track calorie count
DELIMITER //
 CREATE PROCEDURE calories( )
 BEGIN
 
select calorie_count, meal_id from meal; 


 END //
DELIMITER ;