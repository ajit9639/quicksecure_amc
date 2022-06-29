<?php include 'includes/session.php'; ?>
<?php 
include "includes/conn.php";
  include 'includes/timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript"> 
      $(document).ready( function() {
        $('#msg').delay(4000).fadeOut();
      });
    </script>	
      <?php
        /*if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible' id='msg'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible' id='msg'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }*/
      ?>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php            
              $s = 1;
              $get_all_orders1 = mysqli_query($conn , "SELECT * FROM `tbl_order`");
              
              while(mysqli_fetch_assoc($get_all_orders1)){
                $s++;
              }
              ?>
              <p>Total Orders : <?php echo $s;?>                              
              </p>
            </div>
            <div class="icon">
            <i class="fa fa-mail-reply"></i>          
            </div>            
            <a href="order-detail.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>



        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
               <?php            
              $s = 1;
              $get_all_orders1 = mysqli_query($conn , "SELECT * FROM `tbl_order` where `order_status`= 'delivered'");
              
              while(mysqli_fetch_assoc($get_all_orders1)){
                $s++;
              }
              ?>
              <p>Delivered Orders : <?php echo $s;?>                              
              </p>
            </div>
            <div class="icon">
            <i class="fa fa-mail-reply"></i>
            </div>
            <a href="order-detail-delivered.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <?php            
              $s = 1;
              $get_all_orders1 = mysqli_query($conn , "SELECT * FROM `tbl_order` where `order_status`= 'return'");
              
              while(mysqli_fetch_assoc($get_all_orders1)){
                $s++;
              }
              ?>
              <p>Return Orders : <?php echo $s;?>   
            </div>
            <div class="icon">
              <i class="fa fa-mail-reply"></i>
            </div>
            <a href="order-detail-return.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <?php            
              $s = 1;
              $get_all_orders1 = mysqli_query($conn , "SELECT * FROM `tbl_order` where `order_status`= 'cancel'");
              
              while(mysqli_fetch_assoc($get_all_orders1)){
                $s++;
              }
              ?>
              <p>Cancel Orders : <?php echo $s;?>   
            </div>
            <div class="icon">
            <i class="fa fa-mail-reply"></i>
            </div>
            <a href="order-detail-cancel.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
 <!-- ./col -->
 <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <?php            
              $s = 1;
              $get_all_orders1 = mysqli_query($conn , "SELECT * FROM `tbl_order_peripheral`");
              
              while(mysqli_fetch_assoc($get_all_orders1)){
                $s++;
              }
              ?>
              <p>Peripheral Orders : <?php echo $s;?>   
            </div>
            <div class="icon">
              <i class="fa fa-mail-forward"></i>
            </div>
            <a href="order-detail-peripheral.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
 <!-- ./col -->
 <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <?php            
              $s = 1;
              $get_all_orders1 = mysqli_query($conn , "SELECT * FROM `tbl_amc_sale_dealer`");
              
              while(mysqli_fetch_assoc($get_all_orders1)){
                $s++;
              }
              ?>
              <p>AMC Orders : <?php echo $s;?>   
            </div>
            <div class="icon">
              <i class="fa fa-mail-forward"></i>
            </div>
            <a href="amc-detail.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
 <!-- ./col -->
 <!-- <div class="col-lg-3 col-xs-6">
          
          <div class="small-box bg-aqua">
            <div class="inner">
            <?php            
              // $s = 1;
              // $get_all_orders1 = mysqli_query($conn , "SELECT * FROM `tbl_order` where `order_status`= 'cancel'");
              
              // while(mysqli_fetch_assoc($get_all_orders1)){
              //   $s++;
              // }
              ?>
              <p>Cancel Orders : <?php echo $s;?>   
            </div>
            <div class="icon">
              <i class="fa fa-mail-forward"></i>
            </div>
            <a href="order-detail-cancel.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> -->
        <!-- ./col -->
 <!-- ./col -->
 <!-- <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
            <?php            
              // $s = 1;
              // $get_all_orders1 = mysqli_query($conn , "SELECT * FROM `tbl_order` where `order_status`= 'cancel'");
              
              // while(mysqli_fetch_assoc($get_all_orders1)){
              //   $s++;
              // }
              ?>
              <p>Cancel Orders : <?php echo $s;?>   
            </div>
            <div class="icon">
              <i class="fa fa-mail-forward"></i>
            </div>
            <a href="order-detail-cancel.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> -->
        <!-- ./col -->





      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Report</h3>
              <div class="box-tools pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <label>Select Year: </label>
                    <select class="form-control input-sm" id="select_year">
                      <?php
                        for($i=2015; $i<=2065; $i++){
                          $selected = ($i==$year)?'selected':'';
                          echo "
                            <option value='".$i."' ".$selected.">".$i."</option>
                          ";
                        }
                      ?>
                    </select>
                  </div>
                </form>
              </div>
            </div>



    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                     var OrderDate = [];
                    var Quantity = [];

                    for (var i in data) {
                        OrderDate.push(data[i].order_date);
                        Quantity.push(data[i].qt);
                    }

                    var chartdata = {
                        labels: OrderDate,
                        datasets: [
                            {
                                label: 'Sale QTY',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: Quantity
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>
















          </div>
        </div>
      </div>

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- Chart Data -->
<?php
/*
  $and = 'AND YEAR(date) = '.$year;
  $months = array();
  $return = array();
  $borrow = array();
  for( $m = 1; $m <= 12; $m++ ) {
    $sql = "SELECT * FROM returns WHERE MONTH(date_return) = '$m' AND YEAR(date_return) = '$year'";
    $rquery = $conn->query($sql);
    array_push($return, $rquery->num_rows);

    $sql = "SELECT * FROM borrow WHERE MONTH(date_borrow) = '$m' AND YEAR(date_borrow) = '$year'";
    $bquery = $conn->query($sql);
    array_push($borrow, $bquery->num_rows);

    $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
  }

  $months = json_encode($months);
  $return = json_encode($return);
  $borrow = json_encode($borrow);
*/
?>
<!-- End Chart Data -->
<?php include 'includes/scripts.php'; ?>



<style type="text/css">
#chart-container {
    width: 100%;
    height: auto;
}
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>






<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {
        label               : 'Borrow',
        fillColor           : 'rgba(210, 214, 222, 1)',
        strokeColor         : 'rgba(210, 214, 222, 1)',
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : <?php echo $borrow; ?>
      },
      {
        label               : 'Return',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $return; ?>
      }
    ]
  }
  barChartData.datasets[1].fillColor   = '#00a65a'
  barChartData.datasets[1].strokeColor = '#00a65a'
  barChartData.datasets[1].pointColor  = '#00a65a'
  var barChartOptions                  = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero        : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - If there is a stroke on each bar
    barShowStroke           : true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth          : 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing         : 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing       : 1,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //Boolean - whether to make the chart responsive
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});
</script>
<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
</body>
</html>
