<?php
print_r($_POST);

foreach ($_POST as $value){
	if (empty($value)){
		$_SESSION["error"] = "Wypełnij wszystkie dane!";
		echo "<script>history.back();</script>";
		exit();
	}
}

require_once "./connect.php";

try {
	$stmt = $conn->prepare("SELECT password FROM users WHERE email=?");
	$stmt->bind_param("s", $_POST["email"]);
	$stmt->execute();

	$result = $stmt->get_result();
	//echo $result->num_rows;

	if ($result->num_rows != 0){
		//$_SESSION["success"] = "Prawidłowo zalo użytkownika $_POST[firstName] $_POST[lastName]";
		// "email istnieje";

		$user = $result->fetch_assoc();
		if (password_verify($_POST["pass"], $user["password"])){
			echo "ok";
		}else{
			echo "error";
		}

		//header("location: ???");
	}else{
		echo "brak adresu email w bazie!";
	}
} catch (mysqli_sql_exception $e) {
	$_SESSION["error"] = $e->getMessage();
	//echo "<script>history.back();</script>";
	echo "error";
	exit();
}