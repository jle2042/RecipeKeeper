<!DOCTYPE html>
<html>
<head>
<title>MyShelf</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Recipe Keeper</title>
<link rel="stylesheet" href="style.css">
</head>
    <body>
        <h1 class="center-heading">Recipe Keeper</h1>
        <h3 class="center-subheading">Save your go-to recipes to store in one place</h3>
    
        <form action="add_recipe.php" method="post">
        <input type="submit" class="button" value="Add Recipe">
        </form> 
        <br>

        <form action="recipe_list.php" method="post">
        <input type="submit" class="button" value="View Recipes">
        </form> 
    </body>
</html>