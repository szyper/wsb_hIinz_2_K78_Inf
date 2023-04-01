<?php
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

