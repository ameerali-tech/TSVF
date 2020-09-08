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
              <a href="<?=site_url('admin/dashboard');?>"><i class="ft-home"></i><span data-i18n="" class="menu-title" style="font-size: 14px!important;">Dashboard</span>
              </a>
            </li>
            <?php if ($role_permission[3]['view_status']!='' || $role_permission[3]['add_status']!='' || $role_permission[3]['edit_status']!='' || $role_permission[3]['delete_status']!='' ) { ?>
              <li class="has-sub nav-item <?php echo (@$active_menu=='view_item' || @$active_menu=='add_item'?'open':'')?>"><a><i class="fa fa-sitemap"></i><span data-i18n="" class="menu-title">Properties</span></a>
                  <?php if ($role_permission[3]['add_status']!='') { ?>
                    <ul class="menu-content" style="">
                      <li class="<?php echo (@$active_menu=='add_properties'?'active':'')?>"><a href="<?=site_url('Properties/add_properties');?>" class="menu-item">Add Properties</a>
                      </li>
                    </ul>
                  <?php } ?>
                  <?php if ($role_permission[3]['view_status']!='') { ?>
                  <ul class="menu-content" style="">
                    <li class="<?php echo (@$active_menu=='view_properties'?'active':'')?>"><a href="<?=site_url('Properties/view_properties');?>" class="menu-item">View Properties</a>
                    </li>
                  </ul>
                <?php } ?>
              </li>
          <?php  }  ?>
          <?php if ($role_permission[4]['view_status']!='' || $role_permission[4]['add_status']!='' || $role_permission[4]['edit_status']!='' || $role_permission[4]['delete_status']!='' ) { ?>
           <li class="has-sub nav-item <?php echo (@$active_menu=='view_supplier' || @$active_menu=='add_supplier'?'open':'')?>"><a><i class="ft-users"></i><span data-i18n="" class="menu-title">Suppliers</span></a>
                <?php if ($role_permission[4]['add_status']!='') { ?>
                <ul class="menu-content" style="">
                  <li class="<?php echo (@$active_menu=='add_supplier'?'active':'')?>"><a href="<?=site_url('Supplier/add_supplier');?>" class="menu-item">Add Supplier</a>
                  </li>
                </ul>
                <?php } if ($role_permission[4]['view_status']!='') { ?>
                <ul class="menu-content" style="">
                  <li class="<?php echo (@$active_menu=='view_supplier'?'active':'')?>"><a href="<?=site_url('Supplier/view_supplier');?>" class="menu-item">View Suppliers</a>
                  </li>
                </ul>
              <?php } ?>
            </li>
          <?php } ?>
          <?php if ($role_permission[2]['view_status']!='' || $role_permission[2]['add_status']!='' || $role_permission[2]['edit_status']!='' || $role_permission[2]['delete_status']!='' ) { ?>
            <li class="has-sub nav-item <?php echo (@$active_menu=='view_customer' || @$active_menu=='add_customer'?'open':'')?>"><a><i class="ft-users"></i><span data-i18n="" class="menu-title">Customers</span></a>
                  <?php if ($role_permission[2]['add_status']!='') { ?>
                 <ul class="menu-content" style="">
                   <li class="<?php echo (@$active_menu=='add_customer'?'active':'')?>"><a href="<?=site_url('Users/add_customers');?>" class="menu-item">Add Customers</a>
                   </li>
                 </ul>
                   <?php} if ($role_permission[2]['view_status']!='') { ?>
                 <ul class="menu-content" style="">
                   <li class="<?php echo (@$active_menu=='view_customer'?'active':'')?>"><a href="<?=site_url('Users/view_customers');?>" class="menu-item">View Customers</a>
                   </li>
                 </ul>
                   <?php }  ?>
             </li>
           <?php } ?>
           <?php if ($role_permission[5]['view_status']!='' || $role_permission[5]['add_status']!='' || $role_permission[5]['edit_status']!='' || $role_permission[5]['delete_status']!='' ) { ?>
             <li class="has-sub nav-item <?php echo (@$active_menu=='view_quotes' || @$active_menu=='add_quotes'?'open':'')?>"><a><i class="ft-users"></i><span data-i18n="" class="menu-title">Quotes</span></a>
                <?php if ($role_permission[5]['add_status']!='') { ?>
                  <ul class="menu-content" style="">
                    <li class="<?php echo (@$active_menu=='add_quotes'?'active':'')?>"><a href="<?=site_url('Admin/add_quotes');?>" class="menu-item">Add Quotes</a>
                    </li>
                  </ul>
                   <?php } if ($role_permission[5]['view_status']!='') { ?>
                  <ul class="menu-content" style="">
                    <li class="<?php echo (@$active_menu=='view_quotes'?'active':'')?>"><a href="<?=site_url('Admin/view_quotes');?>" class="menu-item">View Quotes</a>
                    </li>
                  </ul>
                   <?php } ?>
              </li>
            <?php }  ?>
            <li class=" nav-item <?php echo (@$active_menu=='reports'?'active':'')?>">
              <a href="<?=site_url('reports/index');?>"><i class="ft-file"></i><span data-i18n="" class="menu-title" style="font-size: 14px!important;">Reports</span>
              </a>
            </li>

            <li class="has-sub nav-item <?php echo (@$active_menu=='view_user' || @$active_menu=='view_users'?'open':'')?>"><a><i class="ft-users"></i><span data-i18n="" class="menu-title">Users</span></a>
              <?php if ($role_permission[1]['add_status']!='') { ?>
                <ul class="menu-content" style="">
                  <li class="<?php echo (@$active_menu=='add_users'?'active':'')?>"><a href="<?=site_url('admin/add_users');?>" class="menu-item">Add Users</a>
                  </li>
                </ul>
              <?php } if ($role_permission[1]['view_status']!='') { ?>
                <ul class="menu-content" style="">
                  <li class="<?php echo (@$active_menu=='view_user'?'active':'')?>"><a href="<?=site_url('admin/view_users');?>" class="menu-item">View Users</a>
                  </li>
                </ul>
              <?php } if ($role_permission[0]['view_status']!='') { ?>
                <ul class="menu-content">
                  <li class="<?php echo (@$active_menu=='view_userroll'?'active':'')?>"><a href="<?=site_url('admin/view_role');?>" class="menu-item">View Users Rolls</a>
                  </li>
                </ul>
                <?php } ?>
            </li>
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
