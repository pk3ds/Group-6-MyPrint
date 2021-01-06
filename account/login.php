<?php
  include "login2.php";
  if(isset($_GET['username_err'])) {
    $username_err=$_GET['username_err'];
  }
  if(isset($_GET['password_err'])) {
    $password_err=$_GET['password_err'];
  }
  if(isset($_GET['username'])) {
    $username=$_GET['username'];
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Digital Printing Shop</title>

  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Bootstrap-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- Bootstrap JavaScript-->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
    
  

</head>
<!-- make the background to blue-->
<body class="bg-primary">
  <!-- make fixed width container-->
  <div class="container">

    <!-- Outer Row and make it center-->
    <div class="row justify-content-center">
      <!-- xl means large devices which is screen width equal to or greater than 1200px and allocate 10 only out of 12-->
      <div class="col-xl-10">
        <!-- make it card removed its border, put large shadow and margin top and btm by 5-->
        <div class="card o-hidden border-0 shadow-lg my-5">
          <!-- card body remove its padding-->
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
              <div class="col-lg-6">
                <div class="p-5">
                  <!-- make it center-->
                  <div class="text-center">
                    <!-- change text color to gray-->
                    <h1 class="h4 text-black-50 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" action="./login2.php" method = "post">
                    <!-- use the modern form-->
                    <div class="form-group">
                      <!-- username-->
                      <input type="text" name="username" class="form-control form-control-user <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" id="InputUsername" placeholder="Enter Username" value="<?php echo $username ?>">
                      <!-- this is for error later on since the php didnt include yet-->
                      <span class="help-block text-danger"><?php echo $username_err; ?></span>
                    </div>
                    <div class="form-group">
                      <!-- password-->
                      <input type="password" name="password" class="form-control form-control-user <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" id="exampleInputPassword" placeholder="Password" value="">
                      <!-- password error-->
                      <span class="help-block text-danger"><?php echo $password_err; ?></span>
                    </div>
                    <!-- use the modern form-->
                    <div class="form-group">
                      <!-- use the nice checkbox-->
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <!-- use the blue button for submit-->
                      <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                    </div>
                  </form>
                  <hr>
                  <!-- to register an account-->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</body>

</html>
