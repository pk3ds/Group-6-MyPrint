<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page depend on his role
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
 
// Include config file
require_once "../include/connection-config.inc.php";
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
        $query = array(
          'username_err' => $username_err,
          'password_err' => $password_err,
          'username' => $username
        );
        $query = http_build_query($query);
        header("location: login.php?$query");
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
        $query = array(
          'username_err' => $username_err,
          'password_err' => $password_err,
          'username' => $username
        );
        $query = http_build_query($query);
        header("location: login.php?$query");
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
      
        // Prepare a select statement
        $sql = "SELECT id, password, role FROM user WHERE id = ?";
        try {
          $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $pdo -> prepare($sql);
          $stmt -> bindValue(1, $username);
          $stmt -> execute();
          $user = $stmt->fetch(PDO::FETCH_ASSOC);
          if ($stmt->rowCount() > 0) {
            $hashed_password = $user['password'];
            $role = $user['role'];
            if (password_verify($password, $hashed_password)) {
              $_SESSION["loggedin"] = true;
              $_SESSION["username"] = $username;
              $_SESSION["role"] = $role;
              echo $username;
              $sql = "UPDATE user SET last_login = CURRENT_TIMESTAMP WHERE id = ?";
              $stmt = $pdo -> prepare($sql);
              if ($stmt -> execute([$username])) {
                echo 'test';
                header("location: ../include/test.php");
              } else {
                echo "Something went wrong. Please try again later.";
              }
            } else {
              // Display an error message if password is not valid
              $password_err = "The password you entered was not valid.";
              //header("location: login.php?password_err=$password_err");
            }
          } else {
            // Display an error message if username doesn't exist
            $username_err = "No account found with that username.";
            echo '<script type="text/javascript">alert("' . $username_err . '")</script>';
            header("location: register.php?username=$username");
            exit;
            //header("location: login.php?username_err=$username_err");
          }
          $query = array(
            'username_err' => $username_err,
            'password_err' => $password_err,
            'username' => $username
          );
          $query = http_build_query($query);
          header("location: login.php?$query");
          exit;
          $stmt = null;
        } catch (\Throwable $th) {
          echo $th . "Something went wrong. Please try again later.";
        }
        
        /*if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            if (session_status() == PHP_SESSION_NONE) {
                              session_start();
                            }

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $username;
                            $_SESSION["role"] = $role;
                            
                            $sql = "UPDATE users SET last_activity = CURRENT_TIMESTAMP WHERE username = ?";

                            if($stmt = mysqli_prepare($link, $sql)){
                              // Bind variables to the prepared statement as parameters
                              mysqli_stmt_bind_param($stmt, "s", $param_username);
                              
                              // Set parameters
                              $param_username = $username;
                              
                              // Attempt to execute the prepared statement
                              if(mysqli_stmt_execute($stmt)){
                                  // Redirect to login page
                                  header("location: login.php");
                              } else{
                                  echo "Something went wrong. Please try again later.";
                              }
                          }
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }*/
        
        // Close statement
        //mysqli_stmt_close($stmt);
    }
    
    // Close connection
    //mysqli_close($link);
}
?>