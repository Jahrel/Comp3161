from faker import Faker
import random

"""

Initializing the faker objects


"""
fake = Faker()
Faker.seed(0)

"""

Contains the tuples of ingredient names, recipe names and mealplanname used for random generation

"""

ingredient_names_tup=('margarine','raw sugar','chipotle pepper','caramel','sugar','mint','huckleberry','chestnut','pecan','marmalade','tonic water','jalapeno','potato','mango','currant','quiche','black-eyed pea','cashew','mascarpone','arugula','brunoise','cornmeal','raisin','date','beancurd','tapioca','marshmallow','soy milk','grapefruit','cilantro','five-spice powder','plum tomato','Kahlua','blackberry','frosting','flax seed','almond milk','white bean','tuber','olive oil','green onion','sauerkraut','pumpkin seed','corn','muffin','curry paste','vanilla bean','carrot','wine','torte','mushroom','tamale','water','chicory','curry leaves','banana','mayonnaise','blueberry','radish','oil','dragonfruit','lemon zest','pomegranate','dandelion','capers','lima bean','sprout','plum','ginger','garlic','almond extract','oregano','allspice','yeast','cornflake','kiwi fruit','rose water','cherry','zinfandel wine','jackfruit','canola oil','nosh','poppy seed','legume','berry','prune','fennel seed','oats','sour cream','noodle','chip','snap pea','endive','black bean','olive','succotash','pilaf','cider','lettuce','ketchup','lemon grass','hot sauce','watercress','citron','aspic','boysenberry','rosemary','brazil nuts','pancetta','coconut ice cream','remoulade','habanero chillies','artificial sweetener','bok choy','leek','coconut','cucumber','barley','honeydew melon','romaine lettuce','flour','saffron','cornstarch','chilli flake','pancake','pea beans','pecans','water chestnut','navy beans','black olive','curry powder','pear','powdered sugar','peanut butter','hazelnut','citrus','kale','soy ice cream','jam','spaghetti','soy sauce','fig','wafer','portabello mushroom','gravy','maraschino cherry','coriander','fennel','Worcestershire sauce','pomelo','potato chip','maize','parsley','brown sugar','taco','apple pie spice','cocoa powder','pineapples','apricot','crouton','licorice','mustard','pastry','hash brown','cashew nut','almond','grape','summer squash','icing','bean','tomato juice','pasta','anise','orange','yam','heavy cream','onion','lime','celery seeds','pumpernickel','corn flour','vegemite','salsa','apple cider vinegar','tomato','rice paper','truffle','celery','thyme','cantaloupe','elderberry','cremini mushrooms','soy beans','syrup','tartar sauce','paprika','sweet pepper','date sugar','marionberry','almond paste','rice','acorn squash','cooking wine','jelly','parsnip','coleslaw','peas','kohlrabi','nectar','vinegar','buckwheat','durian','beet','nutmeg','rice wine','baking soda','cabbage','lemon','melon','maple syrup','spud','apple butter','garlic powder','pepper','Tabasco sauce','wasabi','shish','guava','macaroni','Goji berry','chilli sauce','pine nuts','dill','sherbet','pretzel','hoisin sauce','red beans','rhubarb','Marsala','oatmeal','kumquat','wild rice','balsamic vinegar','cannellini beans','molasses','onion powder','rice milk','cranberry','popcorn','tortilla','wine vinegar','cream of tartar','coconut cream','peapod','barley sugar','tart','jelly bean','bouillon','baking powder','chocolate','cumin','bruschetta','guacamole','sage','lychee','breadcrumb','artichoke','passion fruit','baguette','alfalfa sprout','bagel','wheat','coconut milk','sunflower seed','pumpkin','coconut yogurt','lemon juice','cinnamon','cider vinegar','tomatillo','spinach','red pepper flake','zucchini','tofu','green bean','lemon','broccoli','squash','avocado','panko bread crumbs','sorghum','sweet chilli sauce','tomato puree','rice vinegar','mustard seeds','red chile powder','pesto','pink beans','peach','tomato sauce','chickpeas','cayenne pepper','chives','pea','kidney bean','lemonade','pickle','waffle','salt','nectarine','persimmon','brown rice','walnut','seaweed','chilli powder','corn syrup','provolone','sweet potato','dried leek','split pea','barbecue','toffee','orange peels','acorn','chutney','bean thread','sherry','spearmint','almond butter','coconut milk','eggplant','turnip','peaches','applesauce','lentil','tangerine','mandarin','sorbet','watermelon','cauliflower','quinoa','papaya','bay leaf','raspberry','relish','unsweetened chocolate','asparagus','salad','bean sprout','sesame seed','rye','barbecue sauce','coconut oil','snow pea','rum','pistachios','pineapple','couscous','hummus','turmeric','horseradish','lemon peel','brandy','ravioli','basil','toast','bran','tarragon','red cabbage','brussels sprout','pita bread','ginger ale','sea cucumber','strawberry','strudel','peanut','bean sauce','apple','tomato paste','pinto beans')
recipe_names_tup=('Gambas al Ajillo','Hash Browns','Braised Shortribs','Spicy Feta Burger','Papadum','Charoset','Pastries Filled with Coconut (Modak)','Rosehip Soup','Maple Barbecue Sauce','Tequilla Lime Hot Wings','Desert Rubbed Strip Steaks','Baked Potatoes','Steak, Bacon, and Arugula Salad','Rosogulla','Pudding with Pistachios and Rose Water (Muhallebi)','Buttermilk Biscuits','Aubergine and Onion Vegetable Pie','Pan Seared Duck Breast with Cabernet Reduction','Caramel Sauce (vegan)','Choco-Crunch Cookies','Tater Tot Casserole','Salade Frisee','Campfire Smores','Ravioli/Meat Filling','Pulse Chutney','Italian Seasoning','Bengal Potatoes','Plank-Grilled Salmon','North Carolina-Style BBQ Ribs','Roast Potatoes','Ukrainian Cabbage Soup (Kapusniak)','Vichyssoise','Binagoongan','Kesari','Chocolate Crinkles','Butter Tea','Chicken Curry Mediterranean','Pie Crust Edges','Chocolate Cheese Cake','Buttermilk Fried Chicken with Pan Gravy','Mocha Icing','Lettuce Soup','Dads Favorite Grilled Ribeye','Swedish Meatballs','Rhubarb Crumble','Tequilla Lime Strip Steak','Chicken Soup with Rice and Potatoes','Slow Cooker Pork Chops','Baked potato halves','Menemen','Shephards Pie 2','Fish and Chips','Baozi','Euneo-juk','Mexican Rice Pilaf','Qarabagħli mimli','Sesame Noodle Salad','Corned Beef Pie','Rice Wheat Spread','Tzatziki','Tibetan Steamed Dumplings (Momo)','Bacon Cheese Omelet','Corn Chowder 2','Almond Milk','Roast Butternut, Biltong and Brown Rice Salad','Naan','Khanom Mo Keang','Wonton Soup','Guacamole','Onion Dip','Stingin Nettle Pesto','Arjoli','Minestrone of Rice and Cabbage','Potato and Cabbage Soup','Baked Pork Chops','Almond-Cowitch Matcha Smoothie','Pumpkin Pie','Zwiebelrostbraten','Gyuveche','Bhel Puri','Puff Pastry','Crispy Breaded Burgers','Beef Stroganoff in 20 Minutes','Linguine Primavera Mediterranean','Mediterranean Green Chicken','Simple Roasted Oysters','Frikadeller','Chocolate Chip Cookies (Gluten-Free)','Tomato Paste','Mató de Pedralbes','Yogurt Dip','Jalapeno Sausage and Bacon Appetizers (Atomic Buffalo Turds)','Margarita Grilled Chicken','Goat Cheese Cakes','Beer Marinated Shrimp','Dereniówka','Ghavoot','Rabbit with Abbey Beer (Konijn met Paterbier)','Green Chicken Curry with Coconut Milk','Roast Pork Loin with Cranberry Stuffing','Nutty Brownie Bars','Eggnog','Potato Stew','Alabama White Sauce','Rose Hips Tea','Tuna Rice Casserole','Fresh Pasta with Mozzarella, Tomato and Basil','Shirred Egg','Delicious Pumpkin Pie','Flammekueche','Chicken Broccoli Alfredo','Tahini Goddess Dressing','Pancake Mix','Hyderabad Biryani','Vegemite Sandwich','Schwarzwälder Kirschtorte','Lomo Saltado','Apple Raisin Oat Muffins','Carrot and coriander soup','No-Knead Bread','Apple and Almond Cake','Whole, Roasted Turkey with Stuffing','Ketoprak','Frogs Eye Salad','Cognac Beef Stew','Red Bell Peppers Stuffed with Cheese and Egg (Chushki Byurek)','Nam Phrik Ong','Trifle','Rissoles','Vanilla Fudge II','Butter Chicken','Tempura Baked Halibut with Cilantro Aioli','BLT Sandwich','Quinoa, Shiitake Mushrooms and Adzuki Beans','Fish Pie','Melanzane alla Parmigiana','Brigadeiro','Tapenade','Ploughmans Sandwich','Fried Bread','Italian Dressing','Greek Yogurt Sauce','Chicken and Andouille Sausage Gumbo','Vanillekipferl','Koeksisters','Meatloaf II','Hot Milk Cake','Duck à lOrange','Frappé Coffee','Rice with Milk (Arroz con Leche)','Peanut Sauce (Saus Kacang)','Whole Wheat Waffles','Vanilla Crisps','Tamate Ka Kut','French Fries','Rice with Lemon Coconut and Eggplant (Vangibhat)','Burple Nurples','Pennsylvania Pot Pie','Fried Meatballs','Cinnamon Bun','Ajvar','Mussels with Potatoes','Olive Ascolane','Idiyappam','Israeli Salad','Frito Pie Chili','Sambar','Stuffed Bell Peppers','Chicken Tikka','Stuffed Peppers','Soy Milk','Knoedel','Classic American Apple Pie','Hickory Maple Glazed Wings','Adult Macaroni and Cheese','Booyah','Chocolate Chip Coffee Cake','Dirty rice','Grilled Lamb Chops','Date Nut Bar','Rugelach','Steak and Mushrooms','Chow Mein','Soji','Hamburger Skillet Dinner','Pork Spare Rib Soup (Bah Kut Teh)','Middle Eastern Meatballs','Fruit Cake','Polvorones','Thick-Crust Pizza','Chocolate Mousse','Peach and Tomato Gazpacho','Paprika Chicken','Non-Alcoholic Tiramisu','Beer Batter','Skillet Lasagna','Lemon Curd','Manx Smoked Salmon')
recipe_instructions_tup=('Pre-heat the oven to 170°C','Deseed the unsmoked back bacon','Shred the chillis','Cut the liver into ribbons','Cut the thyme into ribbons','Heat a heavy-bottomed pan over a medium heat for 5 minutes and add the whipped cream','Stir in the cream','Slice the chillis','Heat a heavy-bottomed pan over a medium heat for 4 minutes and add the whipped cream','Bin the chillis','Bring the whipped cream to the boil','Grate the liver','Add the sugar to the mixture','Layer in a pudding basin with the slices of bread','Bake for 47 minutes','Slice the coriander','Soak the lard','Unwrap the sweet potatoes','Quarter the dark chocolate','Pour the lemon juice','Add curry paste and stir well','Deseed the dark chocolate','Roughly chop the coriander','Cover the sweet potatoes','Beat the lemon juice','Peel the sweet potatoes','Serve with rice and Naan bread','Pre-heat the oven to 230°C','Whisk the lemon juice','Shake the hot pepper sauce','Chill the cold water','Season the noodles','Stir in the cream','Put the cold water in the saucepan','Throw away the lemon juice','Put the hot pepper sauce in the saucepan','Roughly chop the noodles','Deseed the noodles','Add the sugar to the mixture','Layer in a pudding basin with the slices of bread','Bake for 31 minutes','Weigh the mushrooms','Chop the limes','Cover the eggs','Bake the eggs','Roughly chop the limes','Season the eggs','Pound the limes','Score the eggs','Wash the limes','Give up and order pizza','Put the oats and milk in a small pan','Mash the sausages','Shred the limes','Roll the chicken thighs','Bring the mint sauce to the boil','Bring the water to the boil in a saucepan with the mint sauce','Sun-dry the chicken thighs','Roll out the limes','Chill the mint sauce','Wash the chicken thighs','Put the mint sauce in the saucepan','Ladle into bowls, sprinkle with sugar, and serve immediate')
measurement_tup= ('cup','tsp','tbsp','pint','quart','gallon','ml','pound','ounce','gram','kg','inch')



"""

                    THE SCRIPT TO CREATE THE SQL
"""

#Add each id to this list when it is generated in the user section then randomly select from it when generating the queries that require userid
useridlist = []
recipeidlist=[]
ingredientidlist=[]
measurementidlist=[]
"""
with open("users.sql", "w",encoding='utf8') as sql_file:

    #USED TO GENERATE DATA FOR THE USER_LOGIN TABLE. SHOULD BE 200_000
    for i in range(200_000):

        #USED TO GENERATE A UNIQUE USERID FOR EACH USER
        userid=fake.unique.numerify(text='UID##########')

        #ADDS THE USERID TO THE LIST
        useridlist.append(userid)

        #USED TO GENERATE THE PASSWORD FOR THE USER
        userpassword=fake.password(length=20)

        #THE QUERY THAT IS WRITTEN TO THE SQL FILE
        query=f'INSERT INTO user_login VALUES ("{userid}","{userpassword}"); \n'

        sql_file.write(query)

    for i in range(200_000):
        userid = random.choice(useridlist)
        #USED TO GENERATE THE USER'S FIRSTNAME
        userfname=fake.first_name()

        #USED TO GENERATE THE USER'S LAST NAME
        userlname=fake.last_name()

        #THE QUERY THAT IS WRITTEN TO THE SQL FILE
        query=f'INSERT INTO user_acc VALUES ("{userid}","{userfname}","{userlname}"); \n'

        sql_file.write(query)
 

with open("recipe.sql", "w",encoding='utf8') as sql_file:    
    #USED TO GENERATE DATA FOR THE RECIPE DATABASE. SHOULD BE 600_000
    for i in range (600_000):

        #USED TO GENERATE A UNIQUE RECIPEID
        recipe_id=fake.unique.numerify(text='RID##########')

        #ADDS THE RECIPEID TO THE LIST
        recipeidlist.append(recipe_id)

        #USED TO GENERATE THE NAME FOR THE RECIPE
        
        recipe_name=fake.random_sample(elements=recipe_names_tup, length=1)
        recipe_name=recipe_name[0]
        
        query=f'INSERT INTO recipe VALUES ("{recipe_id}","{recipe_name}"); \n'

        sql_file.write(query)


    for i in range(600_000):
        #USED TO GENERATE THE DATE THE RECIPE WAS CREATED
        #GENERATES A DATE BETWEEN 5 YEARS AGO AND TODAY
        recipe_id = fake.random_sample(elements=recipeidlist, length=1)

        creation_date=fake.date_between(start_date='-5y', end_date='today')
        

        #USED TO GENERATE THE AMOUNT OF TIME NEEDED TO PREPARE RECIPE. WHOLE NUMBER IN MINS OR REPRESENTED AS HOURS?
        prep_time=fake.random_int(min=5, max=240, step=5)

        #USED TO GENERATE THE QUANTITY OF THE RECIPE. WHAT IS QUANTITY
        calorie_count=fake.random_int(min=200,max=3000,step=5)
        

        query=f'INSERT INTO recipe_details VALUES ("{recipe_id}",{prep_time},"{creation_date}",{calorie_count}); \n'

        sql_file.write(query)

           
    for i in range(20000):

        recipe_id = fake.unique.numerify(text='RID##########')
        #Used to generate the directions for the recipe
        n=fake.random_int(min=4, max=10)
        directions= fake.random_sample(elements=recipe_instructions_tup, length=n, )
        
        for u in range(n):
            instruc=fake.unique.name()
            #THE QUERY THAT IS WRITTEN TO THE SQL FILE
            query=f'INSERT INTO recipe_instructions VALUES ("{recipe_id}","{instruc}"); \n'

            sql_file.write(query)

    
    #USED TO GENERATE THE  DATA FOR THE INGREDIENT DATABASE
    for recipe_id in recipeidlist:
        
        
        #USED TO GENERATE A UNIQUE INGREDIENTID
        #ingredient_id=fake.unique.numerify(text='IID##########')

        #Generates a random unique ingredient name from 
        n=fake.random_int(min=4, max=10)
        ingredient_name=fake.random_sample(elements=ingredient_names_tup, length=n)

        for u in range(n):
            ingred=fake.unique.name()
            query=f'INSERT INTO recipe_ingredients VALUES ("{recipe_id}","{ingred}"); \n'

            sql_file.write(query)

        
"""
with open("recipe.sql", "w",encoding='utf8') as sql_file: 
    #KITCHEN DATABSE
    for i in range(20000):
        userid = fake.unique.numerify(text='UID##########')
        measurement=fake.random_sample(elements=measurement_tup, length=1)
        measurement=measurement[0]
        quantity=fake.random_int(min=1,max=10)
        ingredient_name=fake.random_sample(elements=ingredient_names_tup, length=1)
        for ingred in ingredient_name:
            query=f'INSERT INTO kitchen VALUES ("{userid}","{ingred}",{quantity},"{measurement}"); \n'

            sql_file.write(query)

    for el in measurement_tup:
        query=f'INSERT INTO measurement VALUES ("{el}"); \n'

        sql_file.write(query)
    
    for el in ingredient_names_tup:
        query=f'INSERT INTO ingredients VALUES ("{el}"); \n'

        sql_file.write(query)

    """
    #USED TO GENERATE THE  DATA FOR THE MEAL DATABASE
    for i in range(4):

        #USED TO GENERATE A UNIQUE MEALID
        meal_id=fake.unique.numerify(text='MID##########')

        #SELECTS A RANDOM INGREDIENT ID FROM THE LIST
        ingredient_id= random.choice(ingredientidlist)

        #SELECTS A RANDOM recipeid FROM THE LIST
        recipeid=random.choice(recipeidlist)

        #Generates a fake serving. Is there a max serving?
        servings=fake.random_int(min=1,max=10)

        #Used to generate a random calorie count
        calorie_count=fake.random_int(min=500,max=2000,step=10)

        

        #THE QUERY THAT IS WRITTEN TO  THE SQL FILE
        query=f'INSERT INTO meal  VALUES ("{meal_id}","{recipe_id}","{ingredient_id}",{servings},{calorie_count}); \n'

        sql_file.write(query)

    #USED TO GENERATE THE  DATA FOR THE Kitchen DATABASE
    for i in range(4):

        #SELECTS A RANDOM INGREDIENT ID FROM THE LIST
        ingredient_id= random.choice(ingredientidlist)

        #SELECTS A RANDOM recipeid FROM THE LIST
        recipeid=random.choice(recipeidlist)

        #Generate the  ingredient name here by saving the ingredient id along with the name in a dictionary
        #the list would still be there. when we select random from the list we run it through the dictionary and get the name
        ingredient_name=""

        #Used to generate a the number of ingredints left in stock
        ingredient_stock=fake.random_int(min=0,max=20)

        #THE QUERY THAT IS WRITTEN TO  THE SQL FILE
        query=f'INSERT INTO kitchen  VALUES ("{recipe_id}","{ingredient_id}","{ingredient_name}",{ingredient_stock}); \n'

        sql_file.write(query)
    
    #USED TO GENERATE THE  DATA FOR THE measurement DATABASE
    for i in range(len(measurement_tup)):

        #Generates a unique measurement id
        measurement_id=fake.unique.numerify(text='MED##########')
        measurementidlist.append(measurement_id)

        #Generates the quantity-check assignment on how to do this
        quantity=fake.random_sample(elements=measurement_tup,length=1)
        quantity=quantity[0]

        #THE QUERY THAT IS WRITTEN TO  THE SQL FILE
        query=f'INSERT INTO measurement  VALUES ("{measurement_id}",{quantity}) \n'

        sql_file.write(query)

    #USED TO GENERATE THE  DATA FOR THE shoppinglist DATABASE
    for i in range(4):

        #SELECTS A RANDOM INGREDIENT ID FROM THE LIST
        ingredient_id= random.choice(ingredientidlist)

        #SELECTS A RANDOM recipeid FROM THE LIST
        measurement_id=random.choice(measurementidlist)

        #THE QUERY THAT IS WRITTEN TO  THE SQL FILE
        query=f'INSERT INTO shoppinglist  VALUES ("{measurement_id}","{ingredient_id}"); \n'

        sql_file.write(query)
    

    #USED TO GENERATE THE  DATA FOR THE mealplan DATABASE
    for i in range(4):

        #Generates a random userid from the list
        user_id=random.choice(useridlist)

        #Generates the mealplanname
        mealplanname=fake.unique.name()

        #THE QUERY THAT IS WRITTEN TO  THE SQL FILE
        query=f'INSERT INTO mealplan  VALUES ("{user_id}","{mealplanname}"); \n'

        sql_file.write(query)

    
"""




