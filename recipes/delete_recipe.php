<?php

require('database.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM recipes WHERE id=$id"; 
$result = mysqli_query($mysqli,$query) or die ( mysqli_error($mysqli));
header("Location: recipe_list.php"); 
exit();
?>
