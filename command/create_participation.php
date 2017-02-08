<?php
	header('content-type: text/html; charset=utf-8');
	include("select_participant_id.php");
	include("insert_a_participation.php");
	include("database_connection.php");
    
	$name = $_POST['name'];
	$carId = (int)$_POST['carId'];
	
	setcookie("username", utf8_decode($name), time() + (86400 * 30), '/');
	
	//Get participant id
	$participantId = SelectParticipantId($name);
	 
    InsertAParticipation($carId, $participantId);
?>