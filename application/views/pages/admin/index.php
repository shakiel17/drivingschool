<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Flores 1 on 1 Driving Tutorial</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?=base_url();?>design/admin/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?=base_url();?>design/admin/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?=base_url();?>design/admin/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?=base_url();?>design/admin/css/style.css" <!-- End layout styles -->
    <link rel="shortcut icon" href="<?=base_url();?>design/admin/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="<?=base_url();?>design/admin/images/logo.svg">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>                
                  <?=form_open(base_url()."admin_authentication",array('class' => 'pt-3'));?>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                  </div>                  
                <?=form_close();?>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?=base_url();?>design/admin/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?=base_url();?>design/admin/js/off-canvas.js"></script>
    <script src="<?=base_url();?>design/admin/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>