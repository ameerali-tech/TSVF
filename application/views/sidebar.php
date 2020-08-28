<?php $role = $this->session->userdata('user_type');?>

<?php //$permission = $this->session->userdata('permission');?>

<!-- main menu-->
<!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
<div data-active-color="white" data-background-color="purple-bliss" data-image="<?=base_url('app-assets/img/sidebar-bg/01.jpg')?>" class="app-sidebar">
  <!-- main menu header-->
  <!-- Sidebar Header starts-->
  <div class="sidebar-header">
      <a href="<?=site_url('/')?>">
        <div class="logo clearfix" style="padding-top: 30px">
          <img src="<?=base_url('app-assets/images/logo.png')?>" width="30" class="text align-middle" />
          <strong class="text" style="color:#fff; font-size: 20px;">
          Odacity Inventory
          </strong>
        </div>
      </a>
  </div>
  <!-- Sidebar Header Ends-->
  <!-- / main menu header-->
  <!-- main menu content-->
  <div class="sidebar-content">
    <div class="nav-container">
      <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          <?php if($role == "admin") { ?>
            <li class=" nav-item <?php echo (@$active_menu=='dashboard'?'active':'')?>">
              <a href="<?=site_url('admin/dashboard');?>"><i class="ft-home"></i><span data-i18n="" class="menu-title" style="font-size: 14px!important;">Dashboard</span>
              </a>
            </li>
            <?php } ?>
            
            <li class="has-sub nav-item <?php echo (@$active_menu=='view_item' || @$active_menu=='add_item'?'open':'')?>"><a><i class="fa fa-sitemap"></i><span data-i18n="" class="menu-title">Properties</span></a>
                <ul class="menu-content" style="">
                  <li class="<?php echo (@$active_menu=='add_item'?'active':'')?>"><a href="<?=site_url('Properties/add_item');?>" class="menu-item">Add Properties</a>
                  </li>
                </ul>
                <ul class="menu-content" style="">
                  <li class="<?php echo (@$active_menu=='view_item'?'active':'')?>"><a href="<?=site_url('Properties/view_item');?>" class="menu-item">View Properties</a>
                  </li>
                </ul>
            </li>
           
            <?php if($this->session->userdata('user_type') != 'admin') { ?>
              <li class=" nav-item <?php echo (@$active_menu=='sales'?'active':'')?>">
                <a href="<?=site_url('sales/index');?>"><i class="ft-credit-card"></i><span data-i18n="" class="menu-title" style="font-size: 14px!important;">New Sale</span>
                </a>
              </li>
            <?php } ?>
            <li class=" nav-item <?php echo (@$active_menu=='reports'?'active':'')?>">
              <a href="<?=site_url('reports/index');?>"><i class="ft-file"></i><span data-i18n="" class="menu-title" style="font-size: 14px!important;">Reports</span>
              </a>
            </li>
            <?php if($role == "admin") { ?>
            <li class="has-sub nav-item <?php echo (@$active_menu=='view_user' || @$active_menu=='view_users'?'open':'')?>"><a><i class="ft-users"></i><span data-i18n="" class="menu-title">Users</span></a>
                <ul class="menu-content" style="">
                  <li class="<?php echo (@$active_menu=='add_users'?'active':'')?>"><a href="<?=site_url('admin/add_users');?>" class="menu-item">Add Users</a>
                  </li>
                </ul>
                <ul class="menu-content" style="">
                  <li class="<?php echo (@$active_menu=='view_user'?'active':'')?>"><a href="<?=site_url('admin/view_users');?>" class="menu-item">View Users</a>
                  </li>
                </ul>
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
