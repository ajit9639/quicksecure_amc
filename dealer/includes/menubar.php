<?php 
// session_start();
$dealer_id_name = $user['dealerid'];
// $dealer_id_name1 = $_SESSION["$dealer_id_name"];
$_SESSION["deal_id"] = $user['dealerid'];
$_SESSION["deal_name"] = $user['store_name'];
?>


<aside class="main-sidebar" style="background-color:#546E7A;">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['photo'])) ? 'images/k2.jpg' : 'images/k2.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['dealerid']; ?></p>
       <!-- <a><i class="fa fa-circle text-success"></i> <?php // echo $user['dealerid']; ?></a> -->
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Dealer Name :  <?php echo $user['store_name'];?></li>
      <li class=""><a href="./"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <!--li class="header">MANAGE</li-->

  

<li class=""><a href="place-order.php"><i class="fa fa-reorder"></i> <span>Place Order</span></a></li>

<li class=""><a href="order-detail.php"><i class="fa fa-user"></i> <span>All Order</span></a></li>

<!-- individual order -->
<li class=""><a href="order-detail-delivered.php"><i class="fa fa-user"></i> <span>Delivered Orders</span></a></li>
<li class=""><a href="order-detail-return.php"><i class="fa fa-user"></i> <span>Return Orders</span></a></li>
<li class=""><a href="order-detail-cancel.php"><i class="fa fa-user"></i> <span>Cancel Orders</span></a></li>



<li class=""><a href="place-order-peripheral.php"><i class="fa fa-reorder"></i> <span>Peripharels Place Order</span></a></li>

<li class=""><a href="order-detail-peripheral.php"><i class="fa fa-user"></i> <span>Peripharels All Order</span></a></li>
<!-- // individual order -->

<li class=""><a href="amc-sale.php"><i class="fa fa-reorder"></i> <span>Sale AMC</span></a></li>

<li class=""><a href="amc-detail.php"><i class="fa fa-user"></i> <span>AMC History</span></a></li>
      

<!-- <li class=""><a href="#"><i class="fa fa-user"></i> <span>Payment History</span></a></li>
<li class=""><a href="#"><i class="fa fa-user"></i> <span>Invoice</span></a></li>
<li class=""><a href="#"><i class="fa fa-user"></i> <span>Report</span></a></li> -->

<li class=""><a href="logout.php"><i class="fa fa-close"></i> <span>Logout</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>