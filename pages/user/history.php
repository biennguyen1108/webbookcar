<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="icon" href="images/fevicon.png" type="image/gif"/>
<script src="https://kit.fontawesome.com/11a9c95312.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="../../../Project-PHP/styles/user.css">
<link rel="stylesheet" href="../../../Project-PHP/styles/header.css">
<link rel="stylesheet" href="../../../Project-PHP/styles/footer.css">
<link rel="stylesheet" href="../../../Project-PHP/styles/icon.css">
 <title>Lịch sử</title>
<style>
   
  
    .card {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding:10px;
    margin-bottom: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .card-title {
    font-size: 1.5rem;
    margin-top: 0;
    font-weight: bold;
    color: #000;
    }

    .card-subtitle {
    font-size: 1rem;
    color: #999;
    margin-bottom: 10px;
    }

    .card-text {
    font-size: 1.2rem;
    margin-bottom: 10px;
    color: #000;
    }

    .card-text:last-child {
    margin-bottom: 0;
    }

    .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .container {
    margin-top: 30px;
    max-width: 1200px;
    color: #ffa500;
    }

    .container h2 {
    font-size: 3rem;
    margin-top: 40px;
    margin-bottom: 20px;
    text-align: center;
    text-transform: uppercase;
    }

    </style>
</head>
<body>
<?php 
?> 
<?php include '../components/header.php';?>
<?php

include "./connect.php";
$id_acc = $_SESSION['id'];
$sql = "SELECT id_users FROM users WHERE id_account = '$id_acc'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id_user = $row['id_users'];
$_SESSION ['id_user'] = $id_user;
// Truy vấn đơn hàng và thông tin chuyến xe
$sql = "SELECT i.id_items, i.name, i.weigh, i.description, i. quantity, i.price, i.status_item, t.price_ship, t.trip_date
        FROM items i
        JOIN trips t ON i.id_trips= t.id_trips
        WHERE i.id_users = '$id_user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) : ?>
  <div class="container">
    <h2 class="text-center" >Lịch sử gửi hàng</h2>
    <div class="row">
      <?php while ($row = $result->fetch_assoc()) : ?>
        <div class="col-md-6 mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["name"]; ?></h5>
              <p class="card-text">Trọng lượng: <?php echo $row["weigh"]; ?></p>
              <p class="card-text">Mô tả: <?php echo $row["description"]; ?></p>
              <p class="card-text">Số lượng: <?php echo $row["quantity"]; ?></p>
              <p class="card-text">Giá: <?php echo $row["price"]; ?></p>
              <p class="card-text">Tình trạng:
        <?php 
          if ($row["status_item"] == 'Chưa giao') {
            echo "Đang chờ xác nhận";
          } elseif ($row["status_item"] == 'Đang giao') {
            echo "Đang vận chuyển";
          } elseif ($row["status_item"] == 'Đã giao') {
            echo "Đã giao";
          }
        ?>
      </p>              <p class="card-text">Giá vận chuyển: <?php echo $row["price_ship"]; ?></p>
              <p class="card-text">Ngày chuyến xe: <?php echo $row["trip_date"]; ?></p>
              <?php if ($row["status_item"] == 'Chưa giao') : ?>
                <a href="./edit_item.php?id=<?php echo $row["id_items"]; ?>" class="btn btn-primary">Sửa thông tin gửi hàng</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
<?php else : ?>
  <p class="text-center mt-5 mb-3">Không có đơn hàng nào.</p>
<?php endif; ?>
<?php 

$sql = "SELECT id_bookcar, quantity, price, point_of_departure, destination, trip_date, status, name_drivers, phone 
        FROM book_cars b
        JOIN trips  t ON b.id_trips= t.id_trips
        JOIN drivers d ON d.id_drivers = t.id_drivers
        WHERE b.id_users = '$id_user'";

$result = mysqli_query($conn, $sql);
?>


<?php if (mysqli_num_rows($result) > 0) : ?>
  <div class="container">
    <h2 class="text-center mt-5 mb-3">Lịch sử đặt xe</h2>
    <div class="row">
      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div class="col-md-6 mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['destination']; ?></h5>
              <h6 class="card-subtitle mb-2 text-muted">Thời gian: <?php echo $row['trip_date']; ?></h6>
              <p class="card-text">Giá: <?php echo $row['price']  ?></p>
              <p class="card-text">Tình trạng: <?php echo $row['status']; ?></p>
              <p class="card-text">Lái xe: <?php echo $row['name_drivers'] . ' (Số điện thoại: ' . $row['phone'] . ')'; ?></p>
              <?php if ($row['status'] == 'Chưa chạy') :
                ?>
                <a href="./edit_booking.php?book=<?php echo $row['id_bookcar'];?>" class="btn btn-primary"> Sửa thông tin đặt xe </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
<?php else : ?>
  <p class="text-center mt-5 mb-3">Không có đơn hàng nào.</p>
<?php endif; ?>
<?php 
include "../components/footer.php"
?>
  <!-- ------------------------------------------ -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>

</body>
</html>
