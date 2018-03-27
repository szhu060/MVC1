<?php

$a = $_POST['a'];

$b = $_POST['b'];

$c = $_GET['c'];

header("Access-Contrl-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

echo json_encode(array(
	'a' => $a,
	'b' => $b,
	'c' => $c,
));


?>