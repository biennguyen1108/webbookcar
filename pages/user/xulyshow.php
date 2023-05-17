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
<link rel="stylesheet" href="../../../Project-PHP/styles/header.css">
<!-- <link rel="stylesheet" href="../../../Project-PHP/styles/header.css"> -->
<link rel="stylesheet" href="../../../Project-PHP/styles/footer.css">
<link rel="stylesheet" href="../../../Project-PHP/styles/xulyshow.css">
  <style>
     .trip-card {
      display: flex;
      align-items: center;
      width: 100%;
      max-width: 700px;
      margin: 20px auto 10px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      line-height: 40px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .trip-card__info-header {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  margin-top: 10px;
}

.trip-card__info-departure {
  margin-right: 10px;
}

.trip-card__info-svg {
  width: 15px;
  height: 15px;
  fill: #333;
  margin-right: 10px;
}

.trip-card__info-destination {
  margin-right: 10px;
}

.trip-card__info-header b {
  font-weight: bold;
}

    .trip-card__image {
      flex: 0 0 auto;
      width: 250px;
      height: 200px;
    }
    
    .trip-card__image-img {
      width: 100%;
    }
   

  .trip-card__info-svg{
  width: 30px;
  height: 15px;
  fill: #333;
  margin: 0 10px;
  }


.btn.btn-success {
  background-color: #ff5e14;
  border: none;
}

.btn.btn-primary {
  color: #fff;
  background-color: #333333;
  border: none;


}

  </style>
</head>

<body>

  <?php
  include('../components/header.php')
  ?>
  <div class="containershow">

    <div class="ss2" style="padding-top: 120px; width:35%; margin-left:65%; ">
      <form action="" method="get">
        <div class="form-group" style="display:flex;">
          <div style="margin-left:5px;padding-top:5px;font-weight:600">Bộ lọc giá:</div>
          <select class="form-control" style="width:60%;margin-left:5px;margin-right:5px" id="filter" name="filter">
            <option value="all">Tất cả</option>
            <option value="low-to-high">Giá từ thấp đến cao</option>
            <option value="high-to-low">Giá từ cao đến thấp</option>
          </select>
          <button type="submit" class="btn btn-primary" style="background-color: #ff5e14;color:#fff;border: none;">Lọc</button>

        </div>
      </form>
    </div>

    <div class="contain">
      <?php

      $dbhost = 'localhost';
      $dbuser = 'root';
      $dbpass = '';
      $dbname = 'booking_car';
      $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


      // Kiểm tra kết nối

      if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
      }
      $form_pickUp_locations = $_POST['point_of_departure'];
      $form_drop_location = $_POST['destination'];
      $time = $_POST['time'];
      $sql = "SELECT trips.id_trips,vehicles.vehicle_type,vehicles.id_vehicle,drivers.id_drivers, point_of_departure, vehicles.image,destination, trip_date, price_book, price_ship, 
            name_drivers , name_vehicles   FROM trips ,vehicles , drivers
            WHERE point_of_departure = '$form_pickUp_locations' 
            AND destination = '$form_drop_location' 
            AND trip_date > '$time'
            AND trips.id_drivers = drivers.id_drivers 
            AND trips.id_vehicle = vehicles.id_vehicle ";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?><div class="trip-card">
        <br>
      <div class="trip-card__image">
        <img src="../image/<?php echo  $row['image']?>" alt="" data-imagezoom="true" class="trip-card__image-img" style="width:200px;">
      </div>
      <div class="trip-card__info">
        <div class="trip-card__info-header">
          <div class="trip-card__info-departure">
            <?php echo '<b>'.$row['point_of_departure'].'</b>' ?>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.405 14.707" class="trip-card__info-svg">
            <path d="M5.061 8 1.914 4.854h9.793c1.378 0 2.5 1.122 2.5 2.5h1c0-1.93-1.57-3.5-3.5-3.5H1.914L5.06.708 4.354 0 0 4.354l4.354 4.354L5.061 8z"></path>
            <path d="m11.061 6-.708.706 3.14 3.147H3.707a2.503 2.503 0 0 1-2.5-2.5h-1c0 1.93 1.57 3.5 3.5 3.5h9.786L10.353 14l.708.706 4.344-4.353L11.061 6z"></path>
          </svg>
          <div class="trip-card__info-destination">
            <?php echo '<b>'.$row['destination'] .'</b>'?>
          </div>
          <div style="margin-right:5px"><i class="far fa-calendar-alt"></i><br></div>
          <div class="trip-card__info-date">
            <?php echo $row['trip_date'] ?>
          </div>
        </div>
        <div class="trip-card__info-prices">
          <div class="trip-card__info-price">
            Giá vé xe: <?php echo number_format($row['price_book']).' ' ?> nghìn đồng
          </div>
          <div class="trip-card__info-price">
            Phí ship hàng: <?php echo number_format($row['price_ship']) .' ' ?> nghìn đồng
          </div>
        </div>
        <div class="trip-card__info-actions">
          <a href="Booking.php?book='<?php echo $row['id_trips']?>'" class="btn btn-success">Đặt xe</a>
          <a href="Send-item.php?Send='<?php echo $row['id_trips']?>'" class="btn btn-success">Gửi hàng</a>
          <a href="detail_trip.php? detail='<?php echo $row['id_trips'] ?>'" class="btn btn-primary">
            Xem chi tiết
          </a>
        </div>
      </div>
    </div>
    
   
    
          <br>
      <?php
        }
      } else {
        echo '<p>No trips found.</p>';
      }
      ?>


      
    </div>
  </div>

  <?php
  include('../components/footer.php')
  ?>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</html>