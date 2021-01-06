<?php

  include_once 'connection-config.inc.php';

  /*$sql = "SELECT id FROM user WHERE id = ?";

  try {
    $statement = $pdo -> prepare($sql);
    $statement -> bindValue(1, 'username');
    $statement -> execute();
    //$row = $statement -> fetch(PDO::FETCH_ASSOC);
    //echo $row;
    if ($statement->rowCount() > 0) {
      $email_err = "This username is already taken.";
      echo "test klu takde result";
      //header("location: login.php");
    } else {
      $username = trim('aiman');
      echo "test klu ade result";
    }
    $statement = null;
  } catch (\Throwable $th) {
    echo $th . "Oops! Something went wrong. Please try again later.";
  }*/
  //$sql = 'SELECT * FROM authors ORDER BY FirstName';
  //$statement = $pdo -> query($sql);
 /*$sql = "INSERT INTO user (id, password, role, last_login) VALUES (? ,?, ?, CURRENT_TIMESTAMP)";

        try {
          $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $statement = $pdo -> prepare($sql);
          $statement -> bindValue(1, '112');
          $password = '123';
          $temp_password = password_hash($password, PASSWORD_DEFAULT);
          $statement -> bindValue(2, $temp_password);
          $role = 'customer';
          $statement -> bindValue(3, $role);
          //$statement -> bindValue(4, CURRENT_TIMESTAMP);

          if($statement -> execute()) {
            //$_SESSION["loggedin"] = true;
            //$_SESSION["username"] = $username;
            //$_SESSION["role"] = $role;
            //header("location: ../customer/home.html");
            echo "Jadddi???";
          } else {
            echo "Apkah???";
          }
        
        } catch (\Throwable $th) {
          echo $th->getMessage() . "Something went wrong. Please try again later.";
        }*/
        /*$sql = "SELECT id, password FROM user";
        try {
          $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $pdo -> prepare($sql);
          //$stmt -> bindValue(1, $username);
          //$temp = $stmt -> execute(['112']);
          /*foreach ((array) $temp as $key) {
            echo '<tr>';
            echo '<td>' . $key[1] . '</td>';
            echo '<td>' . $key[2] . '</td>';
            echo '</tr>';
          }*/          
          /*$stmt -> execute();
          $user = $stmt->fetch(PDO::FETCH_ASSOC);
          if ($stmt->rowCount() > 0) {
            echo $user['password'] . " LOL";
          } else {
            echo $user . " xdeLOL";
          }
          //$stmt -> bindValue
        } catch (\Throwable $th) {
          //throw $th;
        }*/

        /*session_start();


        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';*/
        //$sql = "SELECT product_in_order.name, product.Name, product_in_order.Detail, product_in_order.Price, product_in_order.Quantity from digital_print.order INNER JOIN Customer ON Customer.UserID = digital_print.Order.CustomerUserID INNER JOIN user ON user.ID = customer.UserID INNER JOIN product_in_order on product_in_order.OrderID = digital_print.Order.ID INNER JOIN product on product.ID = product_in_order.ProductID WHERE User.id = ?";
        /*$sql = "SELECT Product.Name FROM digital_print.Order INNER JOIN Customer ON Customer.UserID = digital_print.Order.CustomerUserID INNER JOIN user ON user.ID = customer.UserID INNER JOIN product_in_order on product_in_order.orderID = digital_print.Order.ID INNER JOIN product on product.ID = product_in_order.ProductID WHERE user.ID = ?";
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo -> prepare($sql);
        $stmt -> bindValue(1, 'Rishi');
        $stmt -> execute();
        while($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo $user['Name'];
        }*/
        /*$id = 'Rishi';
        $sql = "SELECT Product.Name FROM digital_print.Order INNER JOIN Customer ON Customer.UserID = digital_print.Order.CustomerUserID INNER JOIN user ON user.ID = customer.UserID INNER JOIN product_in_order on product_in_order.orderID = digital_print.Order.ID INNER JOIN product on product.ID = product_in_order.ProductID WHERE user.ID = $id";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0){
          while($row = mysqli_fetch_assoc($result)){
            echo "<h5>" . $row['Name'] . "</h5>";
          }
        }*/
        ?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
</head>


<table id="table_id" class="display" >
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table>





<!--<div class="panel panel-danger spaceabove">
  <div class="panel-heading"><h4>Authors</h4></div>
  <table class="table">
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Institution</th>
    </tr>
    <?php
    //session_destroy();
    /*foreach($statement as $aut) {
      echo '<tr>';
      echo '<td>'.$aut[1].'</td>';
      echo '<td>'.$aut[2].'</td>';
      echo '<td>'.$aut[3].'</td>';
      echo '</tr>';
    }*/
    ?>
    </table>
  </div>
</div>
