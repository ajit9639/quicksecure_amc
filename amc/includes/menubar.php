<?php
// session_start();
$_SESSION['staffid'] = $user['staffid'];
$_SESSION['staffname'] = $user['staff_name'];
$_SESSION['emp_img'] = $user['emp_img'];
$delid = $_SESSION['dealerid'];
?>

<aside class="main-sidebar" style="background-color:#546E7A;">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="image" style="
    text-align: center;
">
        <!-- <img src=upload/<?php echo $user["emp_img"] ?> > -->
        <!-- <img src="<?php (empty($user['emp_img'])) ? 'upload/<?php echo $user["emp_img"]' : 'images/k2.jpg'; ?>" class="img-circle" alt="User Image"> -->
        <img src=upload/<?php echo $user["emp_img"] ?> >
        <div>
          <p style="
    text-align: center;
    margin-bottom: -8px;
    color: #fff;
    font-size: 12px;
">
<?php echo $user['staff_name']; ?> / <br> 
<?php echo $user['staffid']; ?>

</p>
        </div>

      </div>
      
      <div class="pull-left info">
        <!-- <p><?php echo $user['staffid']; ?></p> -->
       <!-- <a><i class="fa fa-circle text-success"></i> Online</a>-->
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header" style="text-align:center;color:#ffffff;"> Dealer : <?php echo $_SESSION['dlrnm']; ?> / <?php echo $_SESSION['dealerid']; ?></li>
      

      <li class=""><a href="./"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class=""><a href="place-order.php"><i class="fa fa-circle-o"></i> <span>Place Order</span></a></li>
      <li class=""><a href="order-detail.php"><i class="fa fa-circle-o"></i> <span>Order History </span></a></li>
      <li class=""><a href="amc-sale.php"><i class="fa fa-circle-o"></i> <span>Sale AMC</span></a></li>
      <li class=""><a href="amc-detail.php"><i class="fa fa-circle-o"></i> <span>AMC History </span></a></li>
      <!--li class="header">MANAGE</li-->


    


<li class=""><a href="logout.php"><i class="fa fa-close"></i> <span>Logout</span></a></li>


    </ul>
  </section>
  <!-- /.sidebar -->
</aside>