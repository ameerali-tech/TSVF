<?php $role = $this->session->userdata('user_type');

$role_permission=$this->session->userdata('userpermissions');
?>

<!-- main menu-->
<!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
<div data-active-color="white" data-background-color="purple-bliss" data-image="<?=base_url('app-assets/img/sidebar-bg/01.jpg')?>" class="app-sidebar">
  <!-- main menu header-->
  <!-- Sidebar Header starts-->
  <div class="sidebar-header">
      <a href="<?=site_url('/')?>">
        <div class="logo clearfix" style="padding-top: 30px">
          <img src="<?=base_url('app-assets/images/logo1.png')?>" width="200" class="text align-middle" />
          <!-- <strong class="text" style="color:#fff; font-size: 20px;">
          Martinbornilla
          </strong> -->
        </div>
      </a>
  </div>
  <!-- Sidebar Header Ends-->
  <!-- / main menu header-->
  <!-- main menu content-->
  <div class="sidebar-content">
    <div class="nav-container">
      <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
        <li class=" nav-item <?php echo (@$active_menu=='dashboard'?'active':'')?>">
          <?php include('menus/Dashboard.php'); ?>
        </li>
        <?php if (@$role_permission[5]['view_status']!='' || @$role_permission[5]['add_status']!='' || @$role_permission[5]['edit_status']!='' || @$role_permission[5]['delete_status']!='' ) { ?>
          <li class="has-sub nav-item <?php echo (@$active_menu=='view_quotes' || @$active_menu=='add_quotes'?'open':'')?>">
            <?php include('menus/Setup.php'); ?>
          </li>
        <?php } if (@$role_permission[5]['view_status']!='' || @$role_permission[5]['add_status']!='' || @$role_permission[5]['edit_status']!='' || @$role_permission[5]['delete_status']!='' ) { ?>            
          <li class="has-sub nav-item <?php echo (@$active_menu=='view_quotes' || @$active_menu=='add_quotes'?'open':'')?>">
            <?php include('menus/Students.php'); ?>
          </li>
        <?php } if (@$role_permission[5]['view_status']!='' || @$role_permission[5]['add_status']!='' || @$role_permission[5]['edit_status']!='' || @$role_permission[5]['delete_status']!='' ) { ?>            
          <li class="has-sub nav-item <?php echo (@$active_menu=='view_user' || @$active_menu=='view_users'?'open':'')?>">
            <?php include('menus/Fees.php'); ?>
          </li>
        <?php } if (@$role_permission[5]['view_status']!='' || @$role_permission[5]['add_status']!='' || @$role_permission[5]['edit_status']!='' || @$role_permission[5]['delete_status']!='' ) { ?>            
          <li class="has-sub nav-item <?php echo (@$active_menu=='view_user' || @$active_menu=='view_users'?'open':'')?>">
            <?php include('menus/Employees.php'); ?>
          </li>
        <?php } if (@$role_permission[5]['view_status']!='' || @$role_permission[5]['add_status']!='' || @$role_permission[5]['edit_status']!='' || @$role_permission[5]['delete_status']!='' ) { ?>            
          <li class="has-sub nav-item <?php echo (@$active_menu=='view_user' || @$active_menu=='view_users'?'open':'')?>">
            <?php include('menus/Expenses.php'); ?>
          </li>
        <?php } if (@$role_permission[5]['view_status']!='' || @$role_permission[5]['add_status']!='' || @$role_permission[5]['edit_status']!='' || @$role_permission[5]['delete_status']!='' ) { ?>            
          <li class="has-sub nav-item <?php echo (@$active_menu=='view_user' || @$active_menu=='view_users'?'open':'')?>">
            <?php include('menus/Users.php'); ?>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <!-- main menu content-->
  <div class="sidebar-background"></div>
  <!-- main menu footer-->
  <!-- include includes/menu-footer-->
  <!-- main menu footer-->
</div>
<!-- / main menu-->
<div class="main-panel">
  <!-- Navbar (Header) Starts-->
  <nav class="navbar navbar-expand-lg navbar-light bg-faded">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      </div>
      <div class="navbar-container">
        <div id="navbarSupportedContent" class="collapse navbar-collapse">
          <ul class="navbar-nav">
            <li class="dropdown nav-item">
              <a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle">
                <i class="ft-user font-medium-3 blue-grey darken-4"></i>
                <?=@$this->session->userdata('first_name').' '.@$this->session->userdata('last_name')?>
                <p class="d-none">User Settings</p></a>
              <div ngbdropdownmenu="" aria-labelledby="dropdownBasic3" class="dropdown-menu dropdown-menu-right">
              <?php if (@$this->session->userdata('role') == 'customer'): ?>
                <a href="<?=site_url('system_users/account_information')?>" class="dropdown-item"><i class="ft-edit mr-2"></i><span>Account Information</span></a>
              <?php endif ?>
                <a href="<?=site_url('Auth/logout')?>" class="dropdown-item"><i class="ft-power mr-2"></i><span>Logout</span></a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <!-- Navbar (Header) Ends-->
