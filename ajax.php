<?php
$servername = "localhost";
$username = "root";
$password = "chanpreecha1!";
$dbname = "cashflow";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
  $number = count($_POST["list"]);
  if($number > 1) {
      for($i=0; $i<$number; $i++)
      {
        if (trim($_POST["list"][$i]) != '' && trim($_POST["balance"][$i]) != '') {
          $sql =  $conn->query("INSERT INTO income (list, inputDate, balance)
      VALUES ('$list', '$inputDate', '$balance')");
        }
      }
  } else {
    echo "Please fill input";
  }

  if ($_POST['key'] == 'income') {
    $sql =  $conn->query("INSERT INTO income (list, inputDate, balance)
      VALUES ('$list', '$inputDate', '$balance')");
    exit('Insert success!');
  } 
  else if ($_POST['key'] == 'moneyout') {
    $sql =  $conn->query("INSERT INTO moneyout (list, inputDate, balance)
      VALUES ('$list', '$inputDate', '$balance')");
    exit('Insert success!');
  }

$conn->close();
?>
