<header class="main-header" style="background-color:#00ACC1;">
  <!-- Logo -->
  <a href="./" class="logo" style="background-color:#00ACC1;">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><?php echo $_SESSION['dlrnm']; ?></span>
    <!-- logo for regular state and mobile devices -->
     <font size="2"> </font>
  </a>

  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" style="background-color:#546E7A;">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <!-- <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo (!empty($user['photo'])) ? 'images/k2.jpg' : 'images/k2.jpg'; ?>" class="user-image" alt="User Image">
          
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <img src="<?php echo (!empty($user['photo'])) ? 'images/k2' : 'images/k2.jpg'; ?>" class="img-circle" alt="User Image">

              <p>
                <?php echo $user['staff_name']; ?>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Update</a>
              </div>
              <div class="pull-right">
                <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li> -->


      </ul>
    </div>
  </nav>
</header>
<?php include 'includes/profile_modal.php'; ?>