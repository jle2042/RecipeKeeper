<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Recipe Keeper</title>
<link rel="stylesheet" href="style.css">
</head>
  <body>
    <h1 class="center-heading">Add New Recipe</h1>

    <div class="form-container">
    <form action="process-form.php" method="post" enctype="multipart/form-data">

    <label for="name" class="form-label">Recipe Name:</label>
    <input type="text" id="name" name="name"><br>
    
    <label for="ingredients" class="form-label">Ingredients:</label>
    <textarea id="ingredients" name="ingredients" rows="5" cols="50"></textarea><br>
    
    <label for="directions" class="form-label">Directions:</label>
    <textarea id="directions" name="directions" rows="5" cols="50"></textarea><br>

    <label for="image" class="form-label">Upload Recipe Image (optional):</label>
    <input type="file" name="image" id="image"><br>

    <button>Submit</button>
  </body>
</html>