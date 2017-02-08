<?php
	header('content-type: text/html; charset=utf-8');
	include("insert_a_place.php");
	
	$name = $_POST['name'];
	
    InsertAPlace($name);
?>