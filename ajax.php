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

if (isset($_POST['key'])) {

  $list = $conn->real_escape_string($_POST['list']);
  $inputDate = strtotime($conn->real_escape_string($_POST['inputDate']));
  $balance = $conn->real_escape_string($_POST['balance']);

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
}

$conn->close();
?>
