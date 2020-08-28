<?php
$alert_msg=$this->session->userdata('alert_msg');
?>
<!DOCTYPE html>
<html lang="en" class="loading">
  <!-- BEGIN : Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login Page - Odacity Inventory Managment system</title>
    <link rel="apple-touch-icon" sizes="60x60" href="<?=base_url('app-assets/img/ico/apple-icon-60.png')?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('app-assets/img/ico/apple-icon-76.png')?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url('app-assets/img/ico/apple-icon-120.png')?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url('app-assets/img/ico/apple-icon-152.png')?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('app-assets/img/ico/favicon.ico')?>">
    <link rel="shortcut icon" type="image/png" href="<?=base_url('app-assets/img/ico/favicon-32.png')?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/fonts/feather/style.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/fonts/simple-line-icons/style.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/fonts/font-awesome/css/font-awesome.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/css/perfect-scrollbar.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/css/prism.min.css')?>">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/css/app.css')?>">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
    <style media="screen">
      .wrapper.nav-collapsed .main-panel .main-content {
        padding-left: 0;
      }
    </style>
  </head>
  <!-- END : Head-->

  <!-- BEGIN : Body-->
  <body data-col="1-column" class=" 1-column  blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper nav-collapsed menu-collapsed">
      <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper"><!--Login Page Starts-->
<section id="login" style="background-image: url(<?=base_url('app-assets/img/gallery/light-bg.jpg')?>);" >
  <div class="container-fluid">
    <div class="row full-height-vh m-0">
      <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="card">
          <div class="card-content">
            <div class="card-body login-img">
              <div class="row m-0">
                <div class="col-lg-6 d-none d-lg-block py-2 text-center">
                  <img src="app-assets/img/gallery/register.png" alt="" class="img-fluid mt-3 pl-3" width="400" height="230">
                </div>
                <div class="col-lg-6 col-md-12 bg-white px-4 pt-3">
                  <form class="login-form" action="<?=site_url('auth/login')?>" method="post">
                  <h4 class="mb-2 card-title">Login</h4>
                  <p class="card-text mb-3">
                    Wellcome to Odacity Inventory Management system
                  </p>
                    <?php
                        if (!empty($alert_msg)) {
                            $flash_status = $alert_msg[0];
                            $flash_header = $alert_msg[1];
                            $flash_desc = $alert_msg[2];
                            if ($flash_status == 'failure') {
                        ?>
                        <div class="noty_bar noty_type_error" id="noty_1521948415920250000" style="color:red"><div class="noty_message" style="text-align: center; padding: 10px; width: auto; position: relative; font-weight: bold;"><span class="noty_text"><?php echo $flash_desc; ?></span></div></div>
                        <?php
                            }
                          }
                        ?>
                  <input type="text" class="form-control mb-3" name="username" id="username" placeholder="Username" />
                  <input type="password" class="form-control mb-1" name="password" id="password" placeholder="Password" />
                  <div class="d-flex justify-content-between mt-2">
                    <div class="remember-me">
                      <div class="custom-control custom-checkbox custom-control-inline mb-3">
                        <input type="checkbox" id="customCheckboxInline1" name="customCheckboxInline1" class="custom-control-input" />
                        <label class="custom-control-label" for="customCheckboxInline1">
                          Remember Me
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="fg-actions d-flex justify-content-between">
                    <div class="recover-pass">
                      <button type="submit" class="btn btn-primary text-decoration-none text-white">
                        Login
                      </button>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Login Page Ends-->

          </div>
        </div>
        <!-- END : End Main Content-->
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="<?=base_url('app-assets/vendors/js/core/jquery-3.2.1.min.js')?>" type="text/javascript"></script>
    <script src="<?=base_url('app-assets/vendors/js/core/popper.min.js')?>" type="text/javascript"></script>
    <script src="<?=base_url('app-assets/vendors/js/core/bootstrap.min.js')?>" type="text/javascript"></script>
    <script src="<?=base_url('app-assets/vendors/js/perfect-scrollbar.jquery.min.js')?>" type="text/javascript"></script>
    <script src="<?=base_url('app-assets/vendors/js/prism.min.js')?>" type="text/javascript"></script>
    <script src="<?=base_url('app-assets/vendors/js/jquery.matchHeight-min.js')?>" type="text/javascript"></script>
    <script src="<?=base_url('app-assets/vendors/js/screenfull.min.js')?>" type="text/javascript"></script>
    <script src="<?=base_url('app-assets/vendors/js/pace/pace.min.js')?>" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="<?=base_url('app-assets/js/app-sidebar.js')?>" type="text/javascript"></script>
    <script src="<?=base_url('app-assets/js/notification-sidebar.js')?>" type="text/javascript"></script>
    <script src="<?=base_url('app-assets/js/customizer.js')?>" type="text/javascript"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>
  <!-- END : Body-->
</html>
