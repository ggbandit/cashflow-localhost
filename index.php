<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Latest compiled and minified CSS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled and minified CSS -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <!-- Optional theme -->


  <!-- Latest compiled and minified JavaScript -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>


  <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  <!-- dataTable -->
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="js/script.js"></script>
  <script src="js/getDataGraph.js"></script>

  <title>Cash Flow Synerry</title>
</head>

<body>
  <p>Click on this paragraph.</p>


  <!-- Navigation -->
  <nav class="navbar navbar-expand-md navbar-light sticky-top" id="spnTop">
    <div class="container-fluid">
      <a class="cashflow">Cash Flow</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link ภาพรวม" href=".ภาพรวม">ภาพรวม</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#รายรับ">รายรับ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#รายจ่าย">รายจ่าย</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#รายงาน" id="รายงาน">รายงาน</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Graph -->
  <div class="container-fluid" id="Graph">
    <div class="landing-text">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Week</a>
        </li>
        <li class="nav-item"> 
          <a class="nav-link" href="#">Month</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Year</a>
        </li>
      </ul>
    </div>
    <div id="chart-container">
      <canvas id="mycanvas" width="120vw" height="40vh"></canvas>
    </div>
  </div>
  <!-- Graph -->
  <div>
    <!-- button -->
    <div class="container-fluid">

      <!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title modal-title-padding">เพิ่มรายการ</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">รายรับ</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">รายจ่าย</label>
              </div>
              <div class="form-group">
                <form class="form-inline" name="add_new" id="add_new">
                <label class="pr-3" for="datepicker">วันที่</label>
                <input id="datepicker" width="276" />
                <script>
                  $('#datepicker').datepicker({
                    uiLibrary: 'bootstrap4',
                    format: 'dd-mm-yyyy'
                  });
                </script>
              
            <!-- <label class="padding">รายการ</label>
              <label class="padding2">ยอดเงิน</label> -->

              
                <ol class="form-inline" id="dynamic_field">
                 <li class="mt-3">
                  <input class="form-control" type="text" name="list[]" placeholder="รายการ">
                  <input class="form-control" type="text" name="balance[]" placeholder="ยอดเงิน">
                </li>
              </ol>
              </form>
            </div>
              <button type="button" class="btn btn-success btn-outline-white btn-rounded btn-sm waves-effect waves-light float-right" id="clone">
                <i class="fa fa-plus"></i>
              </button>
            <script>
              $(document).ready(function() {
                var index = 1;
                $("#clone").click(function() {
                 index++;
                 $("#dynamic_field").append('<li class="mt-3" id="row'+index+'"><input class="form-control" type="text" name="list[]" placeholder="รายการ"><input class="form-control ml-1" type="text" name="balance[]" placeholder="ยอดเงิน"></li>');
               });
              });
            </script>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <input class="btn btn-primary" id="btnSubmit" type="button" data-submit="modal" value="Save">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- button -->

  <!-- table รายรับ-รายจ่าย -->
  <div class="table-responsive" style="background-color: #e9edee;">
    <table id="" class="display table table-striped table-sm" style="width:100%">
      <!-- Button to Open the Modal -->
      <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#myModal">
        เพิ่มรายการ
      </button>
      <thead>
        <tr class="bg-info">
          <th class="text-center" id="รายรับ">รายรับ</th>
          <?php
          $month = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dev");
          for ($i=0;$i<12;$i++) {
            echo "<th>".$month[$i]."</th>";
          }
          ?>
        </tr>
      </thead>
      <tbody>
        <?php
        $conn = mysqli_connect("localhost","root","chanpreecha1!","cashflow");
        if ($conn-> connect_error) {
          die("Connection failed:".$conn-> connect_error);
        }

        $sql = "SELECT * FROM income";
        $result = $conn-> query($sql);

        if($result-> num_rows > 0) {
          while($row = $result-> fetch_array()) {
            // if ($row["list"] == 'โบนัส')
            $list = $row["list"];
            //Jan
            if ($row["inputDate"] >= 1514739600 && $row["inputDate"] <= 1517417999)
              echo "<tr><td>".$list."</td><td>".$row["balance"]."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
            //Feb
            else if($row["inputDate"] >= 1517418000 && $row["inputDate"] <= 1519837199){
              echo "<tr><td>".$list."</td><td></td><td>".$row["balance"]."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
            }
            //Mar
            else if($row["inputDate"] >= 1519837200 && $row["inputDate"] <= 1522515599){
              echo "<tr><td>".$list."</td><td></td><td></td><td>".$row["balance"]."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
            }
            //Apr
            else if($row["inputDate"] >= 1522515600 && $row["inputDate"] <= 1525107599){
              echo "<tr><td>".$list."</td><td></td><td></td><td></td><td>".$row["balance"]."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
            }
            //May
            else if($row["inputDate"] >= 1525107600 && $row["inputDate"] <= 1527785999){
              echo "<tr><td>".$list."</td><td></td><td></td><td></td><td></td><td>".$row["balance"]."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
            }
            //Jun
            else if($row["inputDate"] >= 1527786000 && $row["inputDate"] <= 1530377999){
              echo "<tr><td>".$list."</td><td></td><td></td><td></td><td></td><td></td><td>".$row["balance"]."</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
            }
            //Jul
            else if($row["inputDate"] >= 1530378000 && $row["inputDate"] <= 1533056399){
              echo "<tr><td>".$list."</td><td></td><td></td><td></td><td></td><td></td><td></td><td>".$row["balance"]."</td><td></td><td></td><td></td><td></td><td></td></tr>";
            }
            //Aug
            else if($row["inputDate"] >= 1533056400 && $row["inputDate"] <= 1535734799){
              echo "<tr><td>".$list."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>".$row["balance"]."</td><td></td><td></td><td></td><td></td></tr>";
            }
            //Sep
            else if($row["inputDate"] >= 1535734800 && $row["inputDate"] <= 1538326799){
              echo "<tr><td>".$list."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>".$row["balance"]."</td><td></td><td></td><td></td></tr>";
            }
            //Oct
            else if($row["inputDate"] >= 1538326800 && $row["inputDate"] <= 1541005199){
              echo "<tr><td>".$list."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>".$row["balance"]."</td><td></td><td></td></tr>";
            }
            //Nov
            else if($row["inputDate"] >= 1541005200 && $row["inputDate"] <= 1543597199){
              echo "<tr><td>".$list."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>".$row["balance"]."</td><td></td></tr>";
            }
            //Dec
            else if($row["inputDate"] >= 1543597200 && $row["inputDate"] <= 1546275599){
              echo "<tr><td>".$list."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>".$row["balance"]."</td></tr>";
            }
          }
        }
        else {
          echo "0 result";
        }

        $conn-> close();
        ?>
      </tbody>
      <tfoot>
        <tr class="table-active">
          <th class="text-center">รวมรายรับ</th>
          <?php
          $conn = mysqli_connect("localhost","root","chanpreecha1!","cashflow");
          if ($conn-> connect_error) {
            die("Connection failed:".$conn-> connect_error);
          }
                  //total Jan
          $sqlJan = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1514739600 AND 1517417999";
          $result = $conn-> query($sqlJan);
          $val = $result -> fetch_array();
          $Jan_total = $val['sum'];
          echo "<th>".$Jan_total."</th>";

                  //total Feb
          $sqlFeb = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1517418000 AND 1519837199";
          $result = $conn-> query($sqlFeb);
          $val = $result -> fetch_array();
          $Feb_total = $val['sum'];
          echo "<th>".$Feb_total."</th>";

                  //total Mar
          $sqlMar = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1519837200 AND 1522515599";
          $result = $conn-> query($sqlMar);
          $val = $result -> fetch_array();
          $Mar_total = $val['sum'];
          echo "<th>".$Mar_total."</th>";

                  //total Apr
          $sqlApr = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1522515600 AND 1525107599";
          $result = $conn-> query($sqlApr);
          $val = $result -> fetch_array();
          $Apr_total = $val['sum'];
          echo "<th>".$Apr_total."</th>";

                  //total May
          $sqlMay = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1525107600 AND 1527785999";
          $result = $conn-> query($sqlMay);
          $val = $result -> fetch_array();
          $May_total = $val['sum'];
          echo "<th>".$May_total."</th>";

                  //total Jun
          $sqlJun = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1527786000 AND 1530377999";
          $result = $conn-> query($sqlJun);
          $val = $result -> fetch_array();
          $Jun_total = $val['sum'];
          echo "<th>".$Jun_total."</th>";

                  //total Jul
          $sqlJul = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1530378000 AND 1533056399";
          $result = $conn-> query($sqlJul);
          $val = $result -> fetch_array();
          $Jul_total = $val['sum'];
          echo "<th>".$Jul_total."</th>";

                  //total Aug
          $sqlAug = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1533056400 AND 1535734799";
          $result = $conn-> query($sqlAug);
          $val = $result -> fetch_array();
          $Aug_total = $val['sum'];
          echo "<th>".$Aug_total."</th>";

                  //total Sep
          $sqlSeb = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1535734800 AND 1538326799";
          $result = $conn-> query($sqlSeb);
          $val = $result -> fetch_array();
          $Seb_total = $val['sum'];
          echo "<th>".$Seb_total."</th>";

                  //total Oct
          $sqlOct = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1538326800 AND 1541005199";
          $result = $conn-> query($sqlOct);
          $val = $result -> fetch_array();
          $Oct_total = $val['sum'];
          echo "<th>".$Oct_total."</th>";

                  //total Nov
          $sqlNov = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1541005200 AND 1543597199";
          $result = $conn-> query($sqlNov);
          $val = $result -> fetch_array();
          $Nov_total = $val['sum'];
          echo "<th>".$Nov_total."</th>";

                  //total Dec
          $sqlDec = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1543597200 AND 1546275599";
          $result = $conn-> query($sqlDec);
          $val = $result -> fetch_array();
          $Dec_total = $val['sum'];
          echo "<th>".$Dec_total."</th>";

          $result->close();

          $conn->close();
          ?>
        </tr>
      </tfoot>
    </table>
    <table id="" class="display table table-striped table-sm" style="width:100%">
      <thead>
        <tr class="bg-info">
          <th class="text-center" id="รายจ่าย">รายจ่าย</th>
          <?php
          $month = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dev");
          for ($i=0;$i<12;$i++) {
            echo "<th>".$month[$i]."</th>";
          }
          ?>
        </tr>
      </thead>
      <tbody>
        <?php
        $conn = mysqli_connect("localhost","root","chanpreecha1!","cashflow");
        if ($conn-> connect_error) {
          die("Connection failed:".$conn-> connect_error);
        }

        $sql = "SELECT * FROM moneyout";
        $result = $conn-> query($sql);

        if($result-> num_rows > 0) {
          while($row = $result-> fetch_array()) {
            // if ($row["list"] == 'โบนัส')
            $list = $row["list"];
            //Jan
            if ($row["inputDate"] >= 1514739600 && $row["inputDate"] <= 1517417999)
              echo "<tr><td>".$list."</td><td>".$row["balance"]."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
            //Feb
            else if($row["inputDate"] >= 1517418000 && $row["inputDate"] <= 1519837199){
              echo "<tr><td>".$list."</td><td></td><td>".$row["balance"]."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
            }
            //Mar
            else if($row["inputDate"] >= 1519837200 && $row["inputDate"] <= 1522515599){
              echo "<tr><td>".$list."</td><td></td><td></td><td>".$row["balance"]."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
            }
            //Apr
            else if($row["inputDate"] >= 1522515600 && $row["inputDate"] <= 1525107599){
              echo "<tr><td>".$list."</td><td></td><td></td><td></td><td>".$row["balance"]."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
            }
            //May
            else if($row["inputDate"] >= 1525107600 && $row["inputDate"] <= 1527785999){
              echo "<tr><td>".$list."</td><td></td><td></td><td></td><td></td><td>".$row["balance"]."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
            }
            //Jun
            else if($row["inputDate"] >= 1527786000 && $row["inputDate"] <= 1530377999){
              echo "<tr><td>".$list."</td><td></td><td></td><td></td><td></td><td></td><td>".$row["balance"]."</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
            }
            //Jul
            else if($row["inputDate"] >= 1530378000 && $row["inputDate"] <= 1533056399){
              echo "<tr><td>".$list."</td><td></td><td></td><td></td><td></td><td></td><td></td><td>".$row["balance"]."</td><td></td><td></td><td></td><td></td><td></td></tr>";
            }
            //Aug
            else if($row["inputDate"] >= 1533056400 && $row["inputDate"] <= 1535734799){
              echo "<tr><td>".$list."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>".$row["balance"]."</td><td></td><td></td><td></td><td></td></tr>";
            }
            //Sep
            else if($row["inputDate"] >= 1535734800 && $row["inputDate"] <= 1538326799){
              echo "<tr><td>".$list."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>".$row["balance"]."</td><td></td><td></td><td></td></tr>";
            }
            //Oct
            else if($row["inputDate"] >= 1538326800 && $row["inputDate"] <= 1541005199){
              echo "<tr><td>".$list."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>".$row["balance"]."</td><td></td><td></td></tr>";
            }
            //Nov
            else if($row["inputDate"] >= 1541005200 && $row["inputDate"] <= 1543597199){
              echo "<tr><td>".$list."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>".$row["balance"]."</td><td></td></tr>";
            }
            //Dec
            else if($row["inputDate"] >= 1543597200 && $row["inputDate"] <= 1546275599){
              echo "<tr><td>".$list."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>".$row["balance"]."</td></tr>";
            }
          }
        }
        else {
          echo "0 result";
        }

        $conn-> close();
        ?>
      </tbody>
      <tfoot>
        <tr class="table-active">
          <th class="text-center">รวมรายจ่าย</th>
          <?php
          $conn = mysqli_connect("localhost","root","chanpreecha1!","cashflow");
          if ($conn-> connect_error) {
            die("Connection failed:".$conn-> connect_error);
          }
        //total Jan
          $sqlJan = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1514739600 AND 1517417999";
          $result = $conn-> query($sqlJan);
          $val = $result -> fetch_array();
          $Jan_total = $val['sum'];
          echo "<th>".$Jan_total."</th>";

        //total Feb
          $sqlFeb = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1517418000 AND 1519837199";
          $result = $conn-> query($sqlFeb);
          $val = $result -> fetch_array();
          $Feb_total = $val['sum'];
          echo "<th>".$Feb_total."</th>";

        //total Mar
          $sqlMar = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1519837200 AND 1522515599";
          $result = $conn-> query($sqlMar);
          $val = $result -> fetch_array();
          $Mar_total = $val['sum'];
          echo "<th>".$Mar_total."</th>";

        //total Apr
          $sqlApr = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1522515600 AND 1525107599";
          $result = $conn-> query($sqlApr);
          $val = $result -> fetch_array();
          $Apr_total = $val['sum'];
          echo "<th>".$Apr_total."</th>";

        //total May
          $sqlMay = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1525107600 AND 1527785999";
          $result = $conn-> query($sqlMay);
          $val = $result -> fetch_array();
          $May_total = $val['sum'];
          echo "<th>".$May_total."</th>";

        //total Jun
          $sqlJun = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1527786000 AND 1530377999";
          $result = $conn-> query($sqlJun);
          $val = $result -> fetch_array();
          $Jun_total = $val['sum'];
          echo "<th>".$Jun_total."</th>";

        //total Jul
          $sqlJul = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1530378000 AND 1533056399";
          $result = $conn-> query($sqlJul);
          $val = $result -> fetch_array();
          $Jul_total = $val['sum'];
          echo "<th>".$Jul_total."</th>";

        //total Aug
          $sqlAug = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1533056400 AND 1535734799";
          $result = $conn-> query($sqlAug);
          $val = $result -> fetch_array();
          $Aug_total = $val['sum'];
          echo "<th>".$Aug_total."</th>";

        //total Sep
          $sqlSeb = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1535734800 AND 1538326799";
          $result = $conn-> query($sqlSeb);
          $val = $result -> fetch_array();
          $Seb_total = $val['sum'];
          echo "<th>".$Seb_total."</th>";

        //total Oct
          $sqlOct = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1538326800 AND 1541005199";
          $result = $conn-> query($sqlOct);
          $val = $result -> fetch_array();
          $Oct_total = $val['sum'];
          echo "<th>".$Oct_total."</th>";

        //total Nov
          $sqlNov = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1541005200 AND 1543597199";
          $result = $conn-> query($sqlNov);
          $val = $result -> fetch_array();
          $Nov_total = $val['sum'];
          echo "<th>".$Nov_total."</th>";

        //total Dec
          $sqlDec = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1543597200 AND 1546275599";
          $result = $conn-> query($sqlDec);
          $val = $result -> fetch_array();
          $Dec_total = $val['sum'];
          echo "<th>".$Dec_total."</th>";

          $conn-> close();
          ?>
        </tr>
        <tr class="bg-dark" style="color:white;">
          <th class="text-center">เงินคงเหลือ</th>
          <?php 
          $conn = mysqli_connect("localhost","root","chanpreecha1!","cashflow");
          if ($conn-> connect_error) {
            die("Connection failed:".$conn-> connect_error);
          }

          $sqlJan = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1514739600 AND 1517417999";
          $result = $conn-> query($sqlJan);
          $val = $result -> fetch_array();
          $IncomeJan_total = $val['sum'];

          $sqlFeb = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1517418000 AND 1519837199";
          $result = $conn-> query($sqlFeb);
          $val = $result -> fetch_array();
          $IncomeFeb_total = $val['sum'];

          $sqlMar = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1519837200 AND 1522515599";
          $result = $conn-> query($sqlMar);
          $val = $result -> fetch_array();
          $IncomeMar_total = $val['sum'];

          $sqlApr = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1522515600 AND 1525107599";
          $result = $conn-> query($sqlApr);
          $val = $result -> fetch_array();
          $IncomeApr_total = $val['sum'];

          $sqlMay = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1525107600 AND 1527785999";
          $result = $conn-> query($sqlMay);
          $val = $result -> fetch_array();
          $IncomeMay_total = $val['sum'];

          $sqlJun = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1527786000 AND 1530377999";
          $result = $conn-> query($sqlJun);
          $val = $result -> fetch_array();
          $IncomeJun_total = $val['sum'];

          $sqlJul = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1530378000 AND 1533056399";
          $result = $conn-> query($sqlJul);
          $val = $result -> fetch_array();
          $IncomeJul_total = $val['sum'];

          $sqlAug = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1533056400 AND 1535734799";
          $result = $conn-> query($sqlAug);
          $val = $result -> fetch_array();
          $IncomeAug_total = $val['sum'];

          $sqlSeb = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1535734800 AND 1538326799";
          $result = $conn-> query($sqlSeb);
          $val = $result -> fetch_array();
          $IncomeSeb_total = $val['sum'];

          $sqlOct = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1538326800 AND 1541005199";
          $result = $conn-> query($sqlOct);
          $val = $result -> fetch_array();
          $IncomeOct_total = $val['sum'];

          $sqlNov = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1541005200 AND 1543597199";
          $result = $conn-> query($sqlNov);
          $val = $result -> fetch_array();
          $IncomeNov_total = $val['sum'];

          $sqlDec = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1543597200 AND 1546275599";
          $result = $conn-> query($sqlDec);
          $val = $result -> fetch_array();
          $IncomeDec_total = $val['sum'];

          $sqlJan = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1514739600 AND 1517417999";
          $result = $conn-> query($sqlJan);
          $val = $result -> fetch_array();
          $MoneyOutJan_total = $val['sum'];

          $sqlFeb = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1517418000 AND 1519837199";
          $result = $conn-> query($sqlFeb);
          $val = $result -> fetch_array();
          $MoneyOutFeb_total = $val['sum'];

          $sqlMar = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1519837200 AND 1522515599";
          $result = $conn-> query($sqlMar);
          $val = $result -> fetch_array();
          $MoneyOutMar_total = $val['sum'];

          $sqlApr = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1522515600 AND 1525107599";
          $result = $conn-> query($sqlApr);
          $val = $result -> fetch_array();
          $MoneyOutApr_total = $val['sum'];

          $sqlMay = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1525107600 AND 1527785999";
          $result = $conn-> query($sqlMay);
          $val = $result -> fetch_array();
          $MoneyOutMay_total = $val['sum'];

          $sqlJun = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1527786000 AND 1530377999";
          $result = $conn-> query($sqlJun);
          $val = $result -> fetch_array();
          $MoneyOutJun_total = $val['sum'];

          $sqlJul = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1530378000 AND 1533056399";
          $result = $conn-> query($sqlJul);
          $val = $result -> fetch_array();
          $MoneyOutJul_total = $val['sum'];

          $sqlAug = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1533056400 AND 1535734799";
          $result = $conn-> query($sqlAug);
          $val = $result -> fetch_array();
          $MoneyOutAug_total = $val['sum'];

          $sqlSeb = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1535734800 AND 1538326799";
          $result = $conn-> query($sqlSeb);
          $val = $result -> fetch_array();
          $MoneyOutSeb_total = $val['sum'];

          $sqlOct = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1538326800 AND 1541005199";
          $result = $conn-> query($sqlOct);
          $val = $result -> fetch_array();
          $MoneyOutOct_total = $val['sum'];

          $sqlNov = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1541005200 AND 1543597199";
          $result = $conn-> query($sqlNov);
          $val = $result -> fetch_array();
          $MoneyOutNov_total = $val['sum'];

          $sqlDec = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1543597200 AND 1546275599";
          $result = $conn-> query($sqlDec);
          $val = $result -> fetch_array();
          $MoneyOutDec_total = $val['sum'];

          $sumJan = $IncomeJan_total-$MoneyOutJan_total;
          $sumFeb = $IncomeFeb_total-$MoneyOutFeb_total;
          $sumMar = $IncomeMar_total-$MoneyOutMar_total;
          $sumApr = $IncomeApr_total-$MoneyOutApr_total;
          $sumMay = $IncomeMay_total-$MoneyOutMay_total;
          $sumJun = $IncomeJun_total-$MoneyOutJun_total;
          $sumJul = $IncomeJul_total-$MoneyOutJul_total;
          $sumAug = $IncomeAug_total-$MoneyOutAug_total;
          $sumSeb = $IncomeSeb_total-$MoneyOutSeb_total;
          $sumOct = $IncomeOct_total-$MoneyOutOct_total;
          $sumNov = $IncomeNov_total-$MoneyOutNov_total;
          $sumDec = $IncomeDec_total-$MoneyOutDec_total;
          echo "<th>".$sumJan."</th>";
          echo "<th>".$sumFeb."</th>";
          echo "<th>".$sumMar."</th>";
          echo "<th>".$sumApr."</th>";
          echo "<th>".$sumMay."</th>";
          echo "<th>".$sumJun."</th>";
          echo "<th>".$sumJul."</th>";
          echo "<th>".$sumAug."</th>";
          echo "<th>".$sumSeb."</th>";
          echo "<th>".$sumOct."</th>";
          echo "<th>".$sumNov."</th>";
          echo "<th>".$sumDec."</th>";

          $conn-> close();
          ?>
          <!-- Button to Open the Modal -->
          <button type="button" class="btn btn-primary ml-2 mb-2" data-toggle="modal" data-target="#myModal">
            เพิ่มรายการ
          </button>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
<script>
  $(document).ready( function () {
    $('table.display').DataTable();
  });
</script>
<!-- table รายรับ-รายจ่าย -->
<script>
  $("a[href^='.ภาพรวม']").click(function(e) {
    e.preventDefault();
    var position = $($(this).attr("href")).offset().top;
    $("body, html").animate({
      scrollTop: 0
    } /* speed */ ,500);
  });
  $("a[href^='#']").click(function(e) {
    e.preventDefault();
    var position = $($(this).attr("href")).offset().top;
    $("body, html").animate({
      scrollTop: position
    } /* speed */ ,600);
  });
</script>
</body>
</html>
