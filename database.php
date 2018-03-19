<?php


	function getAllItems(){
		//链接localhost与mysql, create pdo connection object
	$pdo = new PDO('mysql:host=localhost;dbname=shopping_cart;charset=utf8mb4', 'root', 'root');

	//var_dump($pdo);

	//create a PDO statement object from connection object
	$sql = "SELECT * FROM shopping_cart.items";
	//$pdo object run query function and this function return a statement object
	$stmt = $pdo->query($sql);

	//EXECUTE the statement and get all the results
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	// var_dump($result);
	return $result;
	}


	function insertAItem($name,$price){
		//链接localhost与mysql, create pdo connection object
	$pdo = new PDO('mysql:host=localhost;dbname=shopping_cart;charset=utf8mb4', 'root', 'root');

	//var_dump($pdo);

	//create a PDO statement object from connection object
	
	//防止sql注入，永远不要相信用户的输入，有时用户输入某些指令可能导致数据库删除 :name :price是一个标志 占位符号
	$stmt = $pdo->prepare("INSERT INTO items(name,price) VALUES(:name,:price)");

	$stmt->execute(
		array(
			':name' => $name,
			':price' =>$price
		)
	);

	$affected_rows = $stmt->rowCount();

	return $affected_rows;
	}

	// insertAItems('ball','200');


