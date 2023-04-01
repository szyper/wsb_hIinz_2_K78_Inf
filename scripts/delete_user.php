<?php
//	print_r($_GET);
//	var_dump(($_GET));
	require_once "./connect.php";
	$sql = "DELETE FROM users WHERE `users`.`id` = $_GET[userDeleteId]";
	$conn->query($sql);