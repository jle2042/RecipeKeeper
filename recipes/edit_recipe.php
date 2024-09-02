<?php
require('database.php');

//get recipe details by id where the id matches and fetch data
function getRecipe($id, $mysqli) {
    $sql = "SELECT * FROM recipes WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $recipe = null;
    if ($result->num_rows > 0) {
        $recipe = $result->fetch_assoc();
    }

    $stmt->close();
    return $recipe;
}

//get recipe based on id
$id = $_GET['id'];
$recipe = getRecipe($id, $mysqli);

//get data that was already existing
$name = $recipe['name'];
$ingredients = $recipe['ingredients'];
$directions = $recipe['directions'];

//retrieve updates made my user on form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $ingredients = $_POST['ingredients'];
    $directions = $_POST['directions'];

//sql update
    $update_sql = "UPDATE recipes SET name=?, ingredients=?, directions=? WHERE id=?";
    $update_stmt = $mysqli->prepare($update_sql);
    $update_stmt->bind_param("sssi", $name, $ingredients, $directions, $id);
    $update_stmt->execute();
    $update_stmt->close();

    header("Location: recipe_list.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Edit Recipe</title>
</head>
    <body>
        <h1 class='center-heading'>Edit Recipe</h1>
        <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>">
        <label for="name">Recipe Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>">

        <label for="ingredients">Ingredients:</label>
        <textarea id="ingredients" name="ingredients" rows="5" cols="50"><?php echo $ingredients; ?></textarea><br>
        
        <label for="directions">Directions:</label>
        <textarea id="directions" name="directions" rows="5" cols="50"><?php echo $directions; ?></textarea><br>

        <input type="submit" value="Update">
        </form>
    </body>
</html>