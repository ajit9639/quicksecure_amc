<style>
  .user-panel>.image>img{
    max-width: 100%!important;
  }
</style>

<aside class="main-sidebar" style="background-color:#6D4C41;">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Admin</p>
       <!-- <a><i class="fa fa-circle text-success"></i> Online</a>-->
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <!-- <li class="header">Admin Login</li> -->
      <li class=""><a href="./"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <!--li class="header">MANAGE</li-->


      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>Registration</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
		      <li><a href="dealer-detail.php"><i class="fa fa-circle-o"></i>Register Dealers</a></li>
          <li><a href="staff-detail.php"><i class="fa fa-circle-o"></i> Registered Staff </a></li>
          <li><a href="manager-detail.php"><i class="fa fa-circle-o"></i> Manager </a></li>
        </ul>
      </li> 



      <li class="treeview">
        <a href="#">
          <i class="fa fa-strikethrough"></i>
          <span>Master Entry</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="item-detail.php"><i class="fa fa-circle-o"></i> Item Master</a></li>
          <li><a href="periferals-detail.php"><i class="fa fa-circle-o"></i> Peripherals</a></li>
          <li><a href="brand-detail.php"><i class="fa fa-circle-o"></i> Brand Master</a></li>
          <li><a href="assigned-detail.php"><i class="fa fa-circle-o"></i> Assign To</a></li>
          <li><a href="designation-detail.php"><i class="fa fa-circle-o"></i> Create Designation</a></li>
          <li><a href="package-detail.php"><i class="fa fa-circle-o"></i> Create Package</a></li>
          <li><a href="loc-detail.php"><i class="fa fa-circle-o"></i> Location Entry</a></li>
            <li><a href="amc-detail.php"><i class="fa fa-circle-o"></i> Create AMC Package</a></li>
        </ul>
      </li> 
 <li class="treeview">
        <a href="#">
          <i class="fa fa-strikethrough"></i>
          <span>Dealer Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="order-detail-history.php"><i class="fa fa-circle-o"></i>Items Orders</a></li>
          <li><a href="amc-sale-history-by-dealer.php"><i class="fa fa-circle-o"></i> AMC Sales</a></li>
          <li><a href="periferals-detail-from-dealer.php"><i class="fa fa-circle-o"></i> Peripherals Sales</a></li>
          
          <li><a href="#"><i class="fa fa-circle-o"></i>Reports</a></li>
        </ul>
      </li> 
 <li class="treeview">
        <a href="#">
          <i class="fa fa-strikethrough"></i>
          <span>Staff Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="amc-sale-history.php"><i class="fa fa-circle-o"></i>AMC Sales</a></li>

          
          <li><a href="order-detail-history-staff.php"><i class="fa fa-circle-o"></i>Items Orders</a></li>

          <li><a href="order-detail-peripheral-staff.php"><i class="fa fa-circle-o"></i> Peripherals Sales</a></li>

          
        </ul>
      </li> 


<!-- <li class=""><a href="staff-login-history.php"><i class="fa fa-reorder"></i> <span>Staff Login History</span></a></li> -->



<li class=""><a href="logout.php"><i class="fa fa-close"></i> <span>Logout</span></a></li>


    </ul>
  </section>
  <!-- /.sidebar -->
</aside>