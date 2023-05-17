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
  <!-- <link rel="stylesheet" href="../../../Project-PHP/styles/book.css"> -->


    <style>
        
    .form-container {
      margin-top:10px;
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

    if (isset($_GET['Send'])) {
        $id_trip = $_GET['Send'];
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
        <div class="title" style="margin-top:110px">THÔNG TIN CHI TIẾT CHUYẾN HÀNG</div>
    <br>
    <div class="form-container" style="margin-top:30px">
        <form action="" method="post">
            <div class="left-column">
                <div>
                    <label>Địa điểm người nhận: </label><br>
                    <input style="width:100%;" type="text" class="btn bg-light text-dark " name="address_delivery" id="address_delivery">
                </div>
                <div>
                    <label>Số điện thoại người nhận: </label><br>
                    <input style="width:100%;" type="text" class="btn bg-light text-dark " name="phone_delivery" id="phone_delivery">
                </div>
                <div>
                    <label>Thời gian đón:</label>
                    <span><?php echo $row['trip_date']; ?></span>
                </div>

                <div>
                    <label>Giá của mỗi cân hàng:</label>
                    <span><?php echo $row['price_ship']; ?> nghìn đồng</span>
                </div>
                <div>
                    <label>Số cân hàng:</label>
                    <input type="number" min="0" value="0" name="weigh" id="weigh" onchange="updateTotalPrice()"><br>
                </div>
                <div>
                    <label>Tổng tiền:</label>
                    <input type="number" name="total-price" id="total-price"><br>
                </div>
            </div>
            <div class="right-column">
                <div>
                    <label>Mô tả về hàng hóa: </label><br>
                    <textarea style="width:100%;" type="text" class="btn bg-light text-dark " name="description" id="description"></textarea>
                </div>
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
                    <label>Tên người gửi:</label>
                    <span><?php echo $row2['name'] ?></span>
                </div>
                <div>
                    <label>Số điện thoại người gửi:</label>
                    <span><?php echo $row2['phone'] ?></span>
                </div>
                <div>
                    <label>Địa chỉ người gửi:</label>
                    <span><?php echo $row2['address'] ?></span>
                </div>
            </div>
            <div class="submit-button">
                <input type="submit" name="submit" value="Xác nhận gửi hàng">
            </div>
        </form>
        <br>
    </div>
    <br>
    <?php
    if (isset($_POST['submit'])) {
        $id_user = mysqli_real_escape_string($conn, $_SESSION['id_user']);
        $id_trip = mysqli_real_escape_string($conn, $_SESSION['id_trip']);
        $weigh = mysqli_real_escape_string($conn, $_POST['weigh']);
        $total = mysqli_real_escape_string($conn, $_POST['total-price']);
        $payment = mysqli_real_escape_string($conn, $_POST['payment_method']);
        $address = mysqli_real_escape_string($conn, $_POST['address_delivery']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone_delivery']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $sql_insert = "INSERT INTO items (id_users, id_trips,description, weigh, price) 
                   VALUES ('$id_user', '$id_trip',' $description', '$weigh', '$total')";

        if (mysqli_query($conn, $sql_insert)) {
            $item_id = mysqli_insert_id($conn); // lấy id của nó để chèn vào bảng payment
            mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");
            // chèn vào bảng payment 
            $sql_payment_insert = "INSERT INTO payment(id_items,id_bookcar, method, amount, status_payment) 
                             VALUES (' $item_id','', '$payment','$weigh','Đã thanh toán')";
            if (mysqli_query($conn, $sql_payment_insert)) {

                $sql_delivery_insert = "INSERT INTO receiver ( address_receiver, phone_receiver, id_items) 
                VALUES ( '$address', '$phone', '$item_id')";
                if (mysqli_query($conn, $sql_delivery_insert)) {

                    echo "<script> 
                    alert ('Bạn đã gửi hàng thành công!');
                </script>";
                } else {
                    echo "Thêm dữ liệu vào bảng people_delivery thất bại: " . mysqli_error($conn);
                }
            } else {
                echo "Thêm dữ liệu vào bảng thanh toán thất bại: " . mysqli_error($conn);
            }
        } else {
            echo "Thêm dữ liệu vào bảng hàng hóa thất bại: " . mysqli_error($conn);
        }
    }
    ?>
    <?php
    include '../components/footer.php';
    ?>
    <script>
        var price = <?php echo $row['price_ship']; ?>;
        var quantityInput = document.getElementById("weigh");
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

</body>

</html>