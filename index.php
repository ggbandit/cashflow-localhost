<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Latest compiled and minified CSS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <!-- Latest compiled and minified CSS -->


  <!-- Optional theme -->


  <!-- Latest compiled and minified JavaScript -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>


  <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="js/script.js"></script>

  <title>Cash Flow Synerry</title>
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-md navbar-light sticky-top">
    <div class="container-fluid">
      <a class="cashflow">Cash Flow</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link " href="#">ภาพรวม</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">รายรับ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">รายจ่าย</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">รายงาน</a>
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
    <img src="graph.jpg" class="img-fluid mx-auto d-block">

  </div>
  <!-- Graph -->
  <!-- table รายรับ-รายจ่าย -->
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th class="text-center">รายการ</th>
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
          echo "</table>";
        }
        else {
          echo "0 result";
        }

        $conn-> close();
      ?>
      </tbody>
    </table>
    <table class="table table-striped table-sm">
      <thead class="text-center">
        <tr>
          <th width=25%>รายจ่าย</th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody class="text-center">
        <tr>
          <td class="text-left">รายการที่ 1</td>
          <td>5,000</td>
          <td>5,000</td>
          <td>5,000</td>
          <td>5,000</td>
          <td>5,000</td>
          <td>5,000</td>
          <td>5,000</td>
          <td>5,000</td>
          <td>5,000</td>
          <td>5,000</td>
          <td>5,000</td>
          <td>5,000</td>
        </tr>
        <tr>
          <td class="text-left">รายการที่ 2</td>
          <td>6,000</td>
          <td>6,000</td>
          <td>6,000</td>
          <td>6,000</td>
          <td>6,000</td>
          <td>6,000</td>
          <td>6,000</td>
          <td>6,000</td>
          <td>6,000</td>
          <td>6,000</td>
          <td>6,000</td>
          <td>6,000</td>
        </tr>
        <tr>
          <td class="text-left">รายการที่ 3</td>
          <td>7,000</td>
          <td>7,000</td>
          <td>7,000</td>
          <td>7,000</td>
          <td>7,000</td>
          <td>7,000</td>
          <td>7,000</td>
          <td>7,000</td>
          <td>7,000</td>
          <td>7,000</td>
          <td>7,000</td>
          <td>7,000</td>
        </tr>
        <tr>
          <td class="text-left">รายการที่ 4</td>
          <td>8,000</td>
          <td>8,000</td>
          <td>8,000</td>
          <td>8,000</td>
          <td>8,000</td>
          <td>8,000</td>
          <td>8,000</td>
          <td>8,000</td>
          <td>8,000</td>
          <td>8,000</td>
          <td>8,000</td>
          <td>8,000</td>
        </tr>
        <tr>
          <td class="text-left">รายการที่ 5</td>
          <td>9,000</td>
          <td>9,000</td>
          <td>9,000</td>
          <td>9,000</td>
          <td>9,000</td>
          <td>9,000</td>
          <td>9,000</td>
          <td>9,000</td>
          <td>9,000</td>
          <td>9,000</td>
          <td>9,000</td>
          <td>9,000</td>
        </tr>
        <tr>
          <tr class="table-active">
            <th>รวมรายจ่าย</th>
            <td>35,000</td>
            <td>35,000</td>
            <td>35,000</td>
            <td>35,000</td>
            <td>35,000</td>
            <td>35,000</td>
            <td>35,000</td>
            <td>35,000</td>
            <td>35,000</td>
            <td>35,000</td>
            <td>35,000</td>
            <td>35,000</td>
          </tr>
          <tr class="table-bg">
            <th>เงินคงเหลือ</th>
            <th>175,000</th>
            <th>175,000</th>
            <th>175,000</th>
            <th>175,000</th>
            <th>175,000</th>
            <th>175,000</th>
            <th>175,000</th>
            <th>175,000</th>
            <th>175,000</th>
            <th>175,000</th>
            <th>175,000</th>
            <th>175,000</th>
          </tr>
      </tbody>
    </table>
  </div>
  <!-- table รายรับ-รายจ่าย -->
  <!-- button -->
  <div class="container-fluid">
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary ml-5" id="addNew" data-toggle="modal" data-target="#myModal">
    เพิ่มรายการ
  </button>

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
            <div class="form-inline pt-3">
              <label class="pr-3" for="datepicker">วันที่</label>
              <input id="datepicker" width="276" />
              <script>
                $('#datepicker').datepicker({
                  uiLibrary: 'bootstrap4',
                  format: 'dd-mm-yyyy'
                });
              </script>
            </div>
            <!-- <label class="padding">รายการ</label>
            <label class="padding2">ยอดเงิน</label> -->

            <div class="form-inline">
              <label for="id">1.</label>
              <input class="form-control margin-lg" type="text" id="list" name="รายการ" placeholder="รายการ">
              <input class="form-control margin-lg" type="number" id="balance" name="ยอดเงิน" placeholder="ยอดเงิน">
            </div>
            <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light float-right mr-3" data-toggle="modal" data-target="#modalConfirmDelete">
              <i class="fa fa-plus"></i>
            </button>

          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <input class="btn btn-primary" id="btnSubmit" type="button" value="Save">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

  </div>
  <!-- button -->
</body>

</html>
