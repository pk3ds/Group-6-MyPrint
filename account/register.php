<?php
// Include config file
require_once "../include/connection-config.inc.php";

session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  if ($_SESSION["role"] == "admin") {
    header("location: ../admin/");
  } elseif ($_SESSION["role"] == "client") {
    header("location: ../client/");
  } else {
    header("location: ../customer/");
  }
  exit;
}
 
// Define variables and initialize with empty values
$name = $username = $email = $confirm_email = $password = $confirm_password = "";
$name_err = $username_err = $email_err = $confirm_email_err = $password_err = $confirm_password_err = "";

if(isset($_GET['username'])) {
  $username=$_GET['username'];
}
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter an username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM user WHERE id = ?";

        try {
          $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $statement = $pdo -> prepare($sql);
          $statement -> bindValue(1, $_POST['username']);
          $statement -> execute();
          if ($statement->rowCount() > 0) {
            $username_err = "This username is already taken.";
            header("location: login.php");
          } else {
            $username = trim($_POST["username"]);
          }
          $statement = null;
        } catch (\Throwable $th) {
          echo $th . "Oops! Something went wrong. Please try again later.";
        }
        
        /*if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                /*mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                    header("location: login.php");
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }*/
         
        // Close statement
        //mysqli_stmt_close($stmt);
    }

    $sql = "SELECT email FROM user WHERE email = ?";
    if (empty(trim($_POST["email"]))) {
      $email_err = "Please enter an email.";
    } else {
      try {
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $pdo -> prepare($sql);
        $statement -> bindValue(1, $_POST['email']);
        $statement -> execute();
        if ($statement->rowCount() > 0) {
          $email_err = "This email is already taken.";
        } else {
          $email = trim($_POST["email"]);
        }
        $statement = null;
      } catch (\Throwable $th) {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }

    /*$sql = "SELECT email FROM user WHERE email = ?";

    if(empty(trim($_POST["email"]))){
      $email_err = "Please enter a email.";
    } else{

      try {
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $pdo -> prepare($sql);
        $statement -> bindValue(1, $_POST['email']);
        $statement -> execute();
        if ($statement->rowCount() > 0) {
          $email_err = "This email is already taken.";
          header("location: login.php");
        } else {
          $email = trim($_POST["email"]);
        }
        $statement = null;
      } catch (\Throwable $th) {
        echo $th->getMessage() . "\nOops! Something went wrong. Please try again laterssssss.";
      }

      // Prepare a select statement
      /*$sql = "SELECT username FROM users WHERE username = ?";
      
      if($stmt = mysqli_prepare($link, $sql)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "s", $param_username);
          
          // Set parameters
          $param_username = trim($_POST["username"]);
          
          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
              /* store result */
              /*mysqli_stmt_store_result($stmt);
              
              if(mysqli_stmt_num_rows($stmt) == 1){
                  $username_err = "This username is already taken.";
                  header("location: login.php");
              } else{
                  $username = trim($_POST["username"]);
              }
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }
      }
       
      // Close statement
      mysqli_stmt_close($stmt);*/
    //  $statement = null;
  //}
  

    // Validate confirm email
    if(empty(trim($_POST["confirm_email"]))){
      $confirm_email_err = "Please confirm email.";
    } else{
      $confirm_email = trim($_POST["confirm_email"]);
      if(empty($email_err) && ($email != $confirm_email)){
          $confirm_email_err = "Email confirmation did not match.";
      }
    }

    // Check name if not empty
    if(empty(trim($_POST["name"]))){
      $name_err = "Please enter your name.";     
    } else {
      $name = trim($_POST["name"]);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err) && empty($username_err) && empty($confirm_email_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO user (id, password, role, last_login, date_join, name, email) VALUES (? ,?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, ?, ?)";

        try {
          $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $statement = $pdo -> prepare($sql);
          $statement -> bindValue(1, $username);
          $temp_password = password_hash($password, PASSWORD_DEFAULT);
          $statement -> bindValue(2, $temp_password);
          $role = 'customer';
          $statement -> bindValue(3, $role);
          $statement -> bindValue(4, $name);
          $statement -> bindValue(5, $email);

          if($statement -> execute()) {
            session_start();

            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["role"] = $role;
            if ($role == 'admin') {
              header("location: ../admin/");
            } elseif ($role == 'client') {
              header("location: ../client/");
            } else {
              header("location: ../customer/");
            }
          } else {
            echo "Error in inserting in database";
          }
        
        } catch (\Throwable $th) {
          echo $th->getMessage() . "Something went wrong. Please try again later.";
        }
      }
      
         
        /*if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $param_name, $param_email);
            
            // Set parameters
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_name = $name;
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);*/
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

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
<body class="bg-gradient-primary">
  <!-- make fixed width container-->
  <div class="container">
    <!-- make it card removed its border, put large shadow and margin top and btm by 5-->
    <div class="card o-hidden border-0 shadow-lg my-5">
      <!-- card body remove its padding-->
      <div class="card-body p-0">
        <!-- Nested Row within Card Body and make it center -->
        <div class="row justify-content-center">
          <!-- padding 5-->
            <div class="p-5">
              <!-- making text center-->
              <div class="text-center">
                <!-- change text color to gray-->
                <h1 class="h4 text-black-50 mb-4">Create an Account!</h1>
              </div>
              <form class="user" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                  <!-- name-->
                  <input type="text" name="name" class="form-control form-control-user <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" id="exampleName" placeholder="Name" value = "<?php echo $name ?>">
                  <!-- this is for error-->
                  <span class="help-block text-danger"><?php echo $name_err; ?></span>
                </div>
                <!-- use the modern form-->
                <div class="form-group">
                  <!-- username-->
                  <input type="text" name="username" class="form-control form-control-user  <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" id="exampleUsername" placeholder="Username" value = "<?php echo $username ?>">
                  <!-- this is for error-->
                  <span class="help-block text-danger"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <!-- email-->
                    <input type="text" name="email" class="form-control form-control-user  <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" id="exampleInputEmail" placeholder="Email Address" value = "<?php echo $email ?>">
                    <!-- this is for error later on since the php didnt include yet-->
                    <span class="help-block text-danger"><?php echo $email_err; ?></span>
                  </div>
                  <div class="col-sm-6">
                    <!-- confirm email-->
                    <input type="text" name="confirm_email" class="form-control form-control-user  <?php echo (!empty($confirm_email_err)) ? 'is-invalid' : ''; ?>" id="exampleInputConfirmEmail" placeholder="Email Confirmation Address" value = "<?php echo $confirm_email ?>">
                    <!-- this is for error later on since the php didnt include yet-->
                    <span class="help-block text-danger"><?php echo $confirm_email_err; ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-02">
                    <!-- password-->
                    <input type="password" name="password" class="form-control form-control-user  <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" id="exampleInputPassword" placeholder="Password" value = "<?php echo $password ?>">
                    <!-- this is for error later on since the php didnt include yet-->
                    <span class="help-block text-danger"><?php echo $password_err; ?></span>
                  </div>
                  <div class="col-sm-6">
                    <!-- confirm password-->
                    <input type="password" name="confirm_password" class="form-control form-control-user  <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" id="exampleRepeatPassword" placeholder="Repeat Password" value = "<?php echo $confirm_password ?>">
                    <!-- this is for error later on since the php didnt include yet-->
                    <span class="help-block text-danger"><?php echo $confirm_password_err; ?></span>
                  </div>
                </div>
                <div class="form-group">
                  <!-- use the blue button for submit-->
                  <input type="submit" class="btn btn-primary btn-user btn-block" value="Submit">
                </div>
              </form>
              <hr>
              <!-- to login if account already created-->
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>

</html>
