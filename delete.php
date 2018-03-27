<?php
require_once('database.php');

$name = $_POST['delete_id'];

$affect_row = deleteItem($name);
if($affect_row == 0 ){
	$str = 'Delete fails';
}else{
	$str = 'Delete successfully';
}

header("Access-Contrl-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$result = array(
	'message' => $str
);

echo json_encode($result);







?>