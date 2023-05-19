<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa</title>
    <style>
 /* Đưa nội dung vào một khu vực giới hạn rộng */
.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f7f7f7;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
  /* CSS cho form */
  form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  label {
    display: block;
    margin-bottom: 5px;
  }

  select,
  input[type="number"] {
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }

  input[type="submit"] {
    width: auto;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }

  /* CSS cho phần thông tin chi tiết về trip */
  #tripDetails {
    margin-top: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
  }

  #tripDetails label {
    display: inline-block;
    width: 120px;
    font-weight: bold;
  }

  #tripDetails span {
    font-weight: normal;
  }


    </style>
</head>
<body>
    
<?php

include "./connect.php";

$id_book = $_GET['book'];
$id_user =$_SESSION['id_user'];

error_reporting(0);
$sql = "SELECT *
        FROM `orderS`
        JOIN book_cars ON `orderS`.id_trips = book_cars.id_trips
        JOIN tripS ON `orders`.id_trips = trips.id_trips
        WHERE `orders`.id_orders = $id_book";
$result = mysqli_query($conn, $sql);



?>
<form action="" method="post">
  <label for="id_trips">Chọn ID Trip:</label>
  <select name="id_trips" id="id_trips" onchange="getTripDetails()">
    <?php
    // Lấy danh sách id_trips khi status là "chưa chạy"
    $query = "SELECT id_trips FROM trips WHERE status = 'Chưa chạy'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<option value=\"" . $row['id_trips'] . "\">" . $row['id_trips'] . "</option>";
    }
    ?>
  </select>
  <br>
  <div id="tripDetails">


  </div>
  <label>Số lượng người:</label>
  <input type="number" min="0" value="0" name="quantity" id="quantity" ><br>

  <!-- Các trường thông tin khác -->

  <input type="submit" name="submit" value="Cập nhật">
</form>
<?php 
if (isset($_POST['submit'])) {
  
  $id_trips = $_POST['id_trips'];
  $quantity = $_POST['quantity'];
  $price_book = $_SESSION['price_book'];
  $toltal_price = $quantity * $price_book;
  // Cập nhật quantity, price và id_trips trong bảng book_cars
  $updateBookCarsQuery = "UPDATE book_cars SET quantity = $quantity, price= $toltal_price WHERE id_users = $id_user AND id_bookcar = $id_book";
  mysqli_query($conn, $updateBookCarsQuery);

  echo "
  <script>
  alert('Cập nhật thành công!');
  window.location.href = 'history.php';
  </script>";
  

}

mysqli_close($conn);
?>
</div>
<script>
  function getTripDetails() {
    var idTrip = document.getElementById("id_trips").value;

    // Gửi yêu cầu AJAX để lấy thông tin chi tiết về trips từ server
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var tripDetails = JSON.parse(this.responseText);

        // Cập nhật các trường thông tin từ trips trên form
        document.getElementById("tripDetails").innerHTML = `
        <label for="point_of_departure">Điểm đi:</label>
        <input type="text" id="point_of_departure" value="${tripDetails.point_of_departure}" readonly><br>

        <label for="destination">Điểm đến:</label>
        <input type="text" id="destination" value="${tripDetails.destination}" readonly><br>

        <label for="trip_date">Thời gian đón:</label>
        <input type="text" id="trip_date" value="${tripDetails.trip_date}" readonly><br>

        <label for="price_book">Giá của mỗi ghế:</label>
        <input type="text" id="price_book" value="${tripDetails.price_book} nghìn đồng" readonly><br>

        <label for="name_driver">Tài xế:</label>
        <input type="text" id="name_driver" value="${tripDetails.name_drivers}" readonly><br>

        <label for="phone_driver">Số điện thoại tài xe:</label>
        <input type="text" id="phone_driver" value="${tripDetails.phone}" readonly><br>

        `;
      }
    };
    xhttp.open("GET", "get_trip_details.php?id_trip=" + idTrip, true);
    xhttp.send();

   
  }
  
</script>
</body>
</html>
