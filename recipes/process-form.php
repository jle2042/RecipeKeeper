<?php
require('database.php');
require('resize_image.php');

// validate user input
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$ingredients = filter_input(INPUT_POST, 'ingredients', FILTER_SANITIZE_STRING);
$directions = filter_input(INPUT_POST, 'directions', FILTER_SANITIZE_STRING);

// check that all required fields have user input
if (!$name || !$ingredients || !$directions) {
    die("Please provide all required fields.");
}

// handle recipe images
$image_temp = $_FILES['image']['tmp_name'];
$image_name = $_FILES['image']['name'];
$image_path = 'images/' . $image_name;
resize_image($image_temp, $image_path);

//sql statements to insert into database
$sql = "INSERT INTO recipes (name, ingredients, directions, image_path)
        VALUES (?, ?, ?, ?)";
$stmt = mysqli_stmt_init($mysqli);

if (! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($mysqli));
}

//bind
mysqli_stmt_bind_param($stmt, "ssss", $name, $ingredients, $directions, $image_path);
if (!mysqli_stmt_execute($stmt)) {
    die("Error inserting data: " . mysqli_error($mysqli));
}

echo '<script>';
echo 'alert("Recipe Added!");';
echo 'window.location.href = "index.php";';
echo '</script>';

?>
