<?php
require('database.php');
?>

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
        <a href="index.php" class="home-button">Home Page</a>
        <h1 class="center-heading">My Saved Recipes</h1>
    <?php
    //fetch all recipes
    $query = "SELECT * FROM recipes";
    $result = $mysqli->query($query);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        echo "<div class='recipe'>";
        echo "<h2>" . $row["name"] . "</h2>";
        echo "<p><a href='recipe_details.php?id=".$row["id"] . "'>View Details</a></p>";   
        echo "</div>";
        }
      } else {
        echo "0 results";
      }
    
  $mysqli->close();
    
    ?>
    </body>
    </html>