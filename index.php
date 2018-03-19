<?php

require_once('database.php');

// var_dump($_POST);
if ($_POST){
	$name = $_POST['productName'];
	$price = $_POST['price'];

	insertAItem($name,$price);
}

$all_items = getAllItems(); 



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Our MVC project 1</title>
</head>
<body>

	<h1>This is a Shopping Cart Using DB</h1>

	<ul>
		<?php
			foreach($all_items as $item){
				echo 'Name: ' . $item['NAME'];
				echo '<br>';
				echo 'Price: ' . $item['PRICE'];
				echo '<br>';
			}
		?>
	</ul>


	<form action="" method="POST">
		<label for="">Name:</label>
		<input type="text" name="productName"> 
		<label for="">Price:</label>
		<input type="text" name="price">
		<input type="submit">
    </form>

</body>
</html>