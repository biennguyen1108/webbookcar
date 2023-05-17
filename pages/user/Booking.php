<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>


<html lang="en">

<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đặt xe</title>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <!----===== Iconscout CSS ===== -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../../../Project-PHP/styles/header.css">
  <link rel="stylesheet" href="../../../Project-PHP/styles/footer.css">
  <link rel="stylesheet" href="../styles/book.css">


  <style>
    
    .form-container {
      margin-top:50px;
      display: flex;
      justify-content: space-between;
      background-color: #ffffff;
      color: #000;
      padding: 20px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);

      width: 80%;
      height: 30em;
      line-height: 2em;
      margin: auto;
      border-radius: 10px;
    }

    .submit-button {
      display: block;
      margin-top: 70px;
      /* Khoảng cách giữa nút submit và các input trước đó */
    }


    .form-container form {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
    }

    .form-container .left-column {
      width: 50%;
      padding-right: 20px;
    }

    .form-container .right-column {
      width: 50%;
      display: flex;
      flex-direction: column;
    }

    .form-container label {
      font-weight: bold;
      margin-right: 10px;
    }

    .form-container span {
      margin-right: 10px;
    }

    .form-container input[type="number"] {
      width: 100%;
      padding: 5px;
      border-radius: 5px;
      border: none;
      margin-bottom: 10px;
    }

    .form-container select {
      width: 100%;
      padding: 5px;
      border-radius: 5px;
      border: none;
      margin-bottom: 10px;
    }

    .form-container .submit-button {
      display: block;
      text-align: center;
      margin-top: 400px;
    }

    .form-container input[type="submit"] {
      background-color: #000;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .form-container input[type="submit"]:hover {
      background-color: #fff;
      color: #000;
    }

    .title {
      width: 60%;
      margin: auto;
      top: 50px;
      color: #ff5e14;
      text-align: center;
      font-size: 28px;
      font-weight: bold;
    }
  </style>
</head>


<body>
  <?php
  include "connect.php";

  if (isset($_GET['book'])) {
    $id_trip = $_GET['book'];
  }
  $sql = "SELECT  trips.id_trips, point_of_departure,vehicles.vehicle_type, vehicles.image,destination, trip_date, price_book, price_ship,name_drivers , name_vehicles 
FROM trips ,vehicles , drivers WHERE  id_trips=$id_trip";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $_SESSION['id_trip'] = $row['id_trips'];

  if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
  }
  $sql2 = "SELECT * FROM accounts INNER JOIN users ON accounts.id_account= users.id_account WHERE accounts.id_account='$id'";
  $query2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_assoc($query2);
  $_SESSION['id_user'] = $row2['id_users'];


  ?>
    <?php
    include '../components/header.php';
    ?>
  <div class="title">
    <br><br><br>THÔNG TIN CHI TIẾT CHUYẾN XE</div>
  <br>
  <div class="form-container">
    <form action="" method="post">
      <div class="left-column">
        <div>
          <label>Điểm đi: </label>
          <span><?php echo $row['point_of_departure']; ?></span>
        </div>
        <div>
          <label>Điểm đến:</label>
          <span><?php echo $row['destination']; ?></span>
        </div>
        <div>
          <label>Thời gian đón:</label>
          <span><?php echo $row['trip_date']; ?></span>
        </div>
        <div>
          <label>Giá của mỗi ghế:</label>
          <span><?php echo $row['price_book']; ?> nghìn đồng</span>
        </div>
        <div>
          <label>Số lượng người:</label>
          <input type="number" min="0" value="0" name="quantity" id="quantity" onchange="updateTotalPrice()"><br>
        </div>
        <div>
          <label>Tổng tiền:</label>
          <input type="number" name="total-price" id="total-price"><br>
        </div>
      </div>
      <div class="right-column">
        <div>
          <label>Phương thức thanh toán:</label>
          <span>
            <select name="payment_method" id="payment_method">
              <option value="cash">Tiền mặt</option>
              <option value="credit_card">Thẻ tín dụng</option>
              <option value="paypal">PayPal</option>
            </select>
          </span>
        </div>
        <div>
          <label>Loại xe:</label>
          <span>
            <?php echo $row['vehicle_type']; ?>
          </span>
        </div>
        <div>
          <label>Tài xế:</label>
          <span><?php echo $row['name_drivers']; ?></span>
        </div>
        <div>
          <label>Tên xe:</label>
          <span><?php echo $row['name_vehicles'] ?></span>
        </div>
        <div>
          <label>Tên khách hàng:</label>
          <span><?php echo $row2['name'] ?></span>
        </div>
        <div>
          <label>Số điện thoại khách hàng:</label>
          <span><?php echo $row2['phone'] ?></span>
        </div>
        <div>
          <label>Địa chỉ khách hàng:</label>
          <span><?php echo $row2['address'] ?></span>
        </div>
      </div>
      <div class="submit-button">
        <input type="submit" name="submit" value="Đặt xe">
      </div>
    </form>
    <br>
  </div>
  <br>
  <?php
  if (isset($_POST['submit'])) {
    $id_user = mysqli_real_escape_string($conn, $_SESSION['id_user']);
    $id_trip = mysqli_real_escape_string($conn, $_SESSION['id_trip']);
    $seat = mysqli_real_escape_string($conn, $_POST['quantity']);
    $total = mysqli_real_escape_string($conn, $_POST['total-price']);
    $payment = mysqli_real_escape_string($conn, $_POST['payment_method']);


    $sql_insert = "INSERT INTO book_cars (id_users, id_trips, quantity, price) 
                   VALUES ('$id_user', '$id_trip', '$seat', '$total')";

    if (mysqli_query($conn, $sql_insert)) {
      $book_car_id = mysqli_insert_id($conn); // lấy id của nó để chèn vào bảng payment
      mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");
      // chèn vào bảng payment 
      $sql_payment_insert = "INSERT INTO payment(id_items,id_bookcar, method, amount, status_payment) 
                             VALUES ('','$book_car_id', '$payment','$seat','Chưa thanh toán')";
      if (mysqli_query($conn, $sql_payment_insert)) {
        $payment_id = mysqli_insert_id($conn); // lấy id của nó để chèn vào bảng order
        
        mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");
        // chèn vào bảng order
        $order_insert = "INSERT INTO orders(id_trips,id_payment, status) 
                             VALUES ('$id_trip', ' $payment_id','Chưa chạy')";
        if (mysqli_query($conn, $order_insert)) {
          echo "<script> 
            alert ('Bạn đã đặt xe thành công!');
          
            </script>";
        } else {
          echo "Thêm dữ liệu vào bảng order thất bại: " . mysqli_error($conn);
        }
      } else {
        echo "Thêm dữ liệu vào bảng payment thất bại: " . mysqli_error($conn);
      }
    } else {
      echo "Thêm dữ liệu vào bảng book car thất bại: " . mysqli_error($conn);
    }
  }
  ?>
  <?php
  include '../components/footer.php';
  ?>
  <script>
    var price = <?php echo $row['price_book']; ?>;
    var quantityInput = document.getElementById("quantity");
    var totalPriceInput = document.getElementById("total-price");

    function updateTotalPrice() {
      var quantity = parseInt(quantityInput.value);
      var totalPrice = price * quantity;
      totalPriceInput.value = totalPrice;
    }

    quantityInput.addEventListener("change", updateTotalPrice);

    // Tính toán tổng tiền lần đầu khi trang được tải
    updateTotalPrice();
  </script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>