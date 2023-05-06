<?php
  session_start();
?>
<!doctype html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/table.css">
	<title>Użytkownicy</title>
</head>
<body>
<h4>Użytkownicy</h4>
<?php
  if (isset($_GET["deleteUser"])){
    if ($_GET["deleteUser"] == 0){
      echo "<h4>Nie udało się usunąć użytkownika!</h4>";
    }else{
	    echo "<h4>Udało się usunąć użytkownika o id = $_GET[deleteUser]</h4>";
    }
  }
?>
<table>
  <tr>
    <th>Imię</th>
    <th>Nazwisko</th>
    <th>Data urodzenia</th>
    <th>Miasto</th>
    <th>Województwo</th>
    <th>Państwo</th>
  </tr>
<?php
	require_once "../scripts/connect.php";
$sql = "SELECT u.id userId, u.firstName, u.lastName, u.birthday, c.city, s.state, co.country FROM `users` u JOIN `cities` c ON `u`.`city_id`=`c`.`id` JOIN `states` s ON `c`.`state_id`=`s`.`id` JOIN `countries` co ON `s`.`country_id`=`co`.`id`;";
  $result = $conn->query($sql);
//  echo $result->num_rows;
if ($result->num_rows == 0){
  echo "<tr><td colspan='6'>Brak rekordów do wyświetlenia</td></tr>";
}else{
	while($user = $result->fetch_assoc()){
		echo <<< TABLEUSERS
      <tr>
        <td>$user[firstName]</td>
        <td>$user[lastName]</td>
        <td>$user[birthday]</td>
        <td>$user[city]</td>
        <td>$user[state]</td>
        <td>$user[country]</td>
        <td><a href="../scripts/delete_user.php?userDeleteId=$user[userId]">Usuń</a></td>
        <td><a href="./4_db_table_delete_add_update.php?userUpdateId=$user[userId]">Aktualizuj</a></td>
      </tr>
TABLEUSERS;
	}
}

  echo "</table><hr>";
  if (isset($_GET["addUserForm"])){
    echo <<< ADDUSERFORM
      <h4>Dodawanie użytkownika</h4>
      <form method="post" action="../scripts/add_user.php">
        <input type="text" name="firstName" placeholder="Podaj imię"><br><br>
        <input type="text" name="lastName" placeholder="Podaj nazwisko"><br><br>
        <input type="date" name="birthday">Data urodzenia<br><br>
        <select name="city_id">
ADDUSERFORM;
        $sql = "SELECT * FROM `cities`;";
        $result = $conn->query($sql);
        while($city = $result->fetch_assoc()){
          echo "<option value=\"$city[id]\">$city[city]</option>";
        }
	  echo <<< ADDUSERFORM
        </select><br><br>
        <input type="submit" value="Dodaj użytkownika">
      </form>
ADDUSERFORM;

  }else{
    echo '<a href="./4_db_table_delete_add_update.php?addUserForm=1">Dodaj użytkownika</a>';
  }

if (isset($_GET["userUpdateId"])){
  $_SESSION["userUpdateId"] = $_GET["userUpdateId"];
  $sql = "SELECT * FROM users WHERE id=$_GET[userUpdateId]";
  $result = $conn->query($sql);
  $updateUser = $result->fetch_assoc();
	echo <<< UPDATEUSERFORM
      <h4>Aktualizacja użytkownika</h4>
      <form method="post" action="../scripts/update_user.php">
        <input type="text" name="firstName" value="$updateUser[firstName]"><br><br>
        <input type="text" name="lastName" value="$updateUser[lastName]"><br><br>
        <input type="date" name="birthday" value="$updateUser[birthday]">Data urodzenia<br><br>
        <select name="city_id">
UPDATEUSERFORM;
	$sql = "SELECT * FROM `cities`;";
	$result = $conn->query($sql);
	while($city = $result->fetch_assoc()){
    if ($city["id"] == $updateUser["city_id"]){
	    echo "<option value=\"$city[id]\" selected>$city[city]</option>";
    }else{
	    echo "<option value=\"$city[id]\">$city[city]</option>";
    }
	}
	echo <<< UPDATEUSERFORM
        </select><br><br>
        <input type="submit" value="Aktualizuj użytkownika">
      </form>
UPDATEUSERFORM;
}

  $conn->close();
?>


</body>
</html>
