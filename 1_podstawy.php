<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
  $firstName = "Janusz";
  $lastName = "Nowak";
  echo "Imię i nazwisko: $firstName $lastName<br>";
  echo 'Imię i nazwisko: $firstName $lastName<br>';

//heredoc
echo <<< DATA
  <hr>
  Imię: $firstName<br>
  Nazwisko: $lastName
  <br>
DATA;

$data = <<< DATA
  <hr>
  Imię: $firstName<br>
  Nazwisko: $lastName
  <br>
DATA;
echo $data;

//nowdoc
echo <<< 'DATA'
  <hr>
  Imię: $firstName<br>
  Nazwisko: $lastName
  <br>
DATA; 

$bin = 0b1011;
echo $bin; //11

// $oct = 0o12;
$oct = 012;
echo $oct; //10

$hex = 0x1A;
echo $hex; //26

    ?>
</body>
</html>