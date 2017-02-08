<?php
	header('content-type: text/html; charset=utf-8');
	include("insert_a_car.php");
	
	$name = $_POST['name'];
	$restaurant_id = (int)$_POST['restaurants'];
	$seats = (int)$_POST['seats'];
	$time = $_POST['time'];
	$take_away = 0;
	if ($_POST['where'] == 'takeaway')
	{
		$take_away = 1;
	}

	setcookie("username", utf8_decode($name), time() + (86400 * 30), '/');
	setcookie("time", $time, time() + (86400 * 30), '/');
	setcookie("seats", $seats, time() + (86400 * 30), '/');
	setcookie("restaurant", $restaurant_id, time() + (86400 * 30), '/');
	setcookie("takeaway", $take_away, time() + (86400 * 30), '/');
	
	InsertACar($name, $restaurant_id, $seats, $time, $take_away);
?>