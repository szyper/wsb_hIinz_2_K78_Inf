<?php
	session_start();
//	print_r($_POST);
foreach ($_POST as $key => $value) {
//	echo "$key: $value<br>";
	if (empty($value)){
		//echo "$key<br>";
		//echo "error";
		echo "<script>history.back();</script>";
		exit();
	}
}

require_once "./connect.php";
$sql = "INSERT INTO `users` (`city_id`, `firstName`, `lastName`, `birthday`) VALUES ('$_POST[city_id]', '$_POST[firstName]', '$_POST[lastName]', '$_POST[birthday]');";
$conn->query($sql);

if ($conn->affected_rows == 1){
	$_SESSION['error'] = "Prawidłowo dodano rekord";
}else{
	$_SESSION['error'] = "Błędnie dodano rekord";
}

header("location: ../3_db/4_db_table_delete_add_update.php");

//dokończyć sesję
