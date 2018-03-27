<?php

require_once('database.php');

// var_dump($_POST);
if ($_POST){
	$name = $_POST['productName'];
	$price = $_POST['price'];

	$db = new Database();
	$db->insertAItem($name,$price);


	// insertAItem($name,$price);
}

$db = new Database();
$all_items = $db->getAllItems(); 

// $all_items = getAllItems(); 



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Our MVC project 1</title>
</head>
<body>

	<h1>This is a Shopping Cart Using DB</h1>

	<ol>
		<?php
			foreach($all_items as $item){
				echo '<li id="'. $item['ID'] . '">';
				echo 'Name: ' . $item['NAME'];
				echo '<br>';
				echo 'Price: ' . $item['PRICE'];
				echo '<br>';
				echo '<button onclick="deleteItem(\'' . $item['ID'] . '\')">Delete</button>';
				echo '</li>';
			}
		?>
	</ol>
	<div class="info"></div>


	<form action="" method="POST">
		<label for="">Name:</label>
		<input type="text" name="productName"> 
		<label for="">Price:</label>
		<input type="text" name="price">
		<input type="submit">
    </form>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
	function deleteItem(ID){
		// console.log(name);
		//ajax to connect back-end
		$.post(
				"http://192.168.33.10/mvc1/delete.php",
				{
					"delete_id": ID
				},
				function(data){
					// console.log(data.message);
					$('.info').html(data.message);
					$('#' + ID).hide();
				},
				//返回回来的数据是json
				"json"
			);	
	}
</script>

</body>
</html>