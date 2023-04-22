<?php
//	print_r($_GET);
//	var_dump(($_GET));
	require_once "./connect.php";
	$sql = "DELETE FROM users WHERE `users`.`id` = $_GET[userDeleteId]";
//	$sql = "DELETE FROM users WHERE `users`.`id` = 1";
//	$sql = "DELETE FROM users WHERE `users`.`firstName` = 'Janusz'";
	$conn->query($sql);
//	echo $conn->affected_rows;

if ($conn->affected_rows == 0){
	header("location: ../3_db/4_db_table_delete_add_update.php?deleteUser=0");
}else{
	header("location: ../3_db/4_db_table_delete_add_update.php?deleteUser=$_GET[userDeleteId]");
}