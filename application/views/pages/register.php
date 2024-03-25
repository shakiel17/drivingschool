<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Flores 1 on 1 Driving Tutorial</title>
    <link rel="apple-touch-icon" sizes="57x57" href="<?=base_url();?>design/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?=base_url();?>design/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url();?>design/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url();?>design/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url();?>design/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url();?>design/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?=base_url();?>design/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url();?>design/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url();?>design/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?=base_url();?>design/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url();?>design/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?=base_url();?>design/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url();?>design/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?=base_url();?>design/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?=base_url();?>design/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="<?=base_url();?>design/assets/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="<?=base_url();?>design/assets/css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="<?=base_url();?>design/assets/css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="<?=base_url();?>design/assets/css/examples.css" rel="stylesheet">
  </head>
  <body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center" style="background-image:url(<?=base_url();?>design/assets/img/flores.jpg); background-size: cover;">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card mb-4 mx-4">
                <?=form_open(base_url()."save_registration");?>
              <div class="card-body p-4">
                <h1>Register</h1>
                <p class="text-medium-emphasis">Create your account</p>
                <div class="input-group mb-3">
                  <input class="form-control" type="text" placeholder="Username" name="username">
                </div>
                <div class="input-group mb-3">
                  <input class="form-control" type="password" placeholder="Password" name="password">
                </div>
                <div class="input-group mb-3">
                  <input class="form-control" type="text" placeholder="lastname" name="lastname">
                </div>
                <div class="input-group mb-3">
                  <input class="form-control" type="text" placeholder="firstname" name="firstname">
                </div>
                <div class="input-group mb-3">
                  <input class="form-control" type="text" placeholder="middlename" name="middlename">
                </div>
                <div class="input-group mb-3">
                  <select name="gender" class="form-select" required>
                  <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <input class="form-control" type="date" placeholder="birthdate" name="birthdate">
                </div>
                <div class="input-group mb-3">
                  <textarea name="address" class="form-control" rows="3" placeholder="Address"></textarea>
                </div>
                <div class="input-group mb-3">
                  <input class="form-control" type="text" placeholder="Email" name="email">
                </div>
                <div class="input-group mb-3">
                  <input class="form-control" type="text" placeholder="Contact No." name="contactno">
                </div>
                <button class="btn btn-block btn-success" type="submit">Create Account</button> <a class="btn btn-block btn-primary" href="<?=base_url();?>">Login</a>
              </div>
              <?=form_close();?>
            </div>
          </div>
        </div>
      </div>
    </div>    
    <!-- CoreUI and necessary plugins-->
    <script src="<?=base_url();?>design/assets/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="<?=base_url();?>design/assets/simplebar/js/simplebar.min.js"></script>
    <script>
    </script>

  </body>
</html>