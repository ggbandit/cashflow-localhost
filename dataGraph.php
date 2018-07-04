<?php
//setting header to json 
header('Content-Type: application/json');

//setting database
$servername = "localhost";
$username = "root";
$password = "chanpreecha1!";
$dbname = "cashflow";

//get connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Checkconnection
if($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

//query to get data from the table
//total Jan
$sqlJan = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1514739600 AND 1517417999";
$result = $conn-> query($sqlJan);
$val = $result -> fetch_array();
$Jan_total = $val['sum'];
//total Feb
$sqlFeb = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1517418000 AND 1519837199";
$result = $conn-> query($sqlFeb);
$val = $result -> fetch_array();
$Feb_total = $val['sum'];
//total Mar
$sqlMar = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1519837200 AND 1522515599";
$result = $conn-> query($sqlMar);
$val = $result -> fetch_array();
$Mar_total = $val['sum'];
//total Apr
$sqlApr = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1522515600 AND 1525107599";
$result = $conn-> query($sqlApr);
$val = $result -> fetch_array();
$Apr_total = $val['sum'];
//total May
$sqlMay = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1525107600 AND 1527785999";
$result = $conn-> query($sqlMay);
$val = $result -> fetch_array();
$May_total = $val['sum'];
//total Jun
$sqlJun = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1527786000 AND 1530377999";
$result = $conn-> query($sqlJun);
$val = $result -> fetch_array();
$Jun_total = $val['sum'];
//total Jul
$sqlJul = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1530378000 AND 1533056399";
$result = $conn-> query($sqlJul);
$val = $result -> fetch_array();
$Jul_total = $val['sum'];
//total Aug
$sqlAug = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1533056400 AND 1535734799";
$result = $conn-> query($sqlAug);
$val = $result -> fetch_array();
$Aug_total = $val['sum'];
//total Sep
$sqlSeb = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1535734800 AND 1538326799";
$result = $conn-> query($sqlSeb);
$val = $result -> fetch_array();
$Seb_total = $val['sum'];
//total Oct
$sqlOct = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1538326800 AND 1541005199";
$result = $conn-> query($sqlOct);
$val = $result -> fetch_array();
$Oct_total = $val['sum'];
//total Nov
$sqlNov = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1541005200 AND 1543597199";
$result = $conn-> query($sqlNov);
$val = $result -> fetch_array();
$Nov_total = $val['sum'];
//total Dec
$sqlDec = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1543597200 AND 1546275599";
$result = $conn-> query($sqlDec);
$val = $result -> fetch_array();
$Dec_total = $val['sum'];

//loop through the returned data
$data = array($Jan_total,$Feb_total,$Mar_total,$Apr_total,$May_total,$Jun_total,$Jul_total,$Aug_total,$Seb_total,$Oct_total,$Nov_total,$Dec_total);


//free memory associated with result
$result->close();

//close connection
$conn->close();

//now print the data
print json_encode($data);

?>
