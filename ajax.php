<?php
$servername = "localhost";
$username = "root";
$password = "chanpreecha1!";
$dbname = "cashflow";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($_POST['key'] == 'getExistingData') {
    $start = $conn->real_escape_string($_POST['start']);
    $limit = $conn->real_escape_string($_POST['limit']);

    $sql = $conn->query("SELECT list FROM income LIMIT $start, $limit");
    if($sql->num_rows > 0) {
      $response = "";
      while($data = $sql->fetch_array()) {
        $response .='
            <tr>
                <td>'.$data["list"].'</td>
            </tr>
        ';
      } 
      exit($response);
    } else
        exit('reachedMax');
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($_POST['key'])) {

    $list = $conn->real_escape_string($_POST['list']);
    $inputDate = strtotime($conn->real_escape_string($_POST['inputDate']));
    $balance = $conn->real_escape_string($_POST['balance']);

    if ($_POST['key'] == 'addNew') {
      $sql = $conn->query("INSERT INTO income (list, inputDate, balance)
                      VALUES ('$list', '$inputDate', '$balance')");
        exit('Insert success!');
      
    }
}

$conn->close();
?>
