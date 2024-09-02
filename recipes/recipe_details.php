<?php
require('database.php');

//fetch recipe data from id
$id = $_GET['id'];
$query = "SELECT * FROM recipes WHERE id = $id";
$result = $mysqli->query($query);

if($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    echo "<h2 class='center-heading'>" . $row["name"] . "</h2>";
    echo "<div class='recipe-details'>";
    echo "<img src='" . $row["image_path"] . "' alt='Recipe Image'>";
    echo "<p><strong>Ingredients:</strong> " . $row["ingredients"] . "</p>";
    echo "<p><strong>Directions:</strong> " . $row["directions"] . "</p>";
    echo "</div>";

    //edit button
    echo "<div class='button-container'>";
    echo "<form action='edit_recipe.php' method='get'>";
    echo "<input type='hidden' name='id' value='$id'>";
    echo "<input type='submit' value='Edit Recipe'>";
    echo "</form>";

    //delete button
    echo "<form action='delete_recipe.php' method='post'>";
    echo "<input type='hidden' name='id' value='$id'>";
    echo "<input type='submit' value='Delete Recipe'>";
    echo "</form>";

    
    //back to recipe_list page button
    echo "<form action='recipe_list.php' method='post'>";
    echo "<input type='hidden' name='id' value='$id'>";
    echo "<input type='submit' value='Recipe List'>";
    echo "</form>";
    echo "</div>";
} else {
    echo "Recipe not found";
}

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