<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Użytkownicy</title>
</head>
<body>
  <h4>Użytkownicy z bazy</h4>
<?php
  require_once "../scripts/connect.php";
  //$sql = "SELECT * FROM `users`;";
  $sql = "SELECT firstName as imie, lastName, created_at FROM `users`;";
  $result = $conn->query($sql);
  //$user = $result->fetch_assoc();
  //echo $user["firstName"];

  while ($user = $result->fetch_assoc()) {
    echo <<< USER
      Imię i nazwisko: $user[imie] $user[lastName], data dodania użytkownika: $user[created_at]<br>
USER;
  }

?>  
</body>
</html>