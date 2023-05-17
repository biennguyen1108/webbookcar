<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
.form-group {
  margin-bottom: 5px;
}

label {
  display: block;
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 5px;
}

input[type="text"],
textarea {
  width: 100%;
  padding: 15px;
  border: 2px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  font-family: 'Montserrat', sans-serif;
  font-weight: 400;
  box-sizing: border-box;
  margin-top: 5px;
  /* margin-bottom: 20px; */
  transition: border-color 0.3s ease-in-out;
}

input[type="text"]:focus,
textarea:focus {
  outline: none;
  border-color: #007bff;
}

select {
  width: 100%;
  padding: 15px;
  border: 2px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  font-family: 'Montserrat', sans-serif;
  font-weight: 400;
  box-sizing: border-box;
  margin-top: 5px;
  /* margin-bottom: 20px; */
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-repeat: no-repeat;
  background-position: right 10px center;
}

button[type="submit"] {
  background-color: #007bff;
  color: #fff;
  padding: 15px 30px;
  border: none;
  border-radius: 5px;
  font-size: 18px;
  font-family: 'Montserrat', sans-serif;
  font-weight: 600;
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
}

button[type="submit"]:hover {
  background-color: #0069d9;
}


    </style>
</head>
<body>
    
<?php
session_start();

include "./connect.php";

$id_item = $_GET['id'];
$id_user =$_SESSION['id_user'];
$sql = "SELECT i.id_items, i.name, i.weigh, i.description, i. quantity, i.price, i.status_item, t.price_ship, t.trip_date
        FROM items i
        JOIN trips t ON i.id_trips= t.id_trips
        WHERE i.id_users = '$id_user' and id_items = '$id_item'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<div class="container">
<form action="update_item.php" method="POST">
  <input type="hidden" name="id" value="<?php echo $row['id_items']; ?>">
  <div class="form-group">
    <label for="name">Tên sản phẩm</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
  </div>
  <div class="form-group">
    <label for="weigh">Trọng lượng</label>
    <input type="text" class="form-control" id="weigh" name="weigh" value="<?php echo $row['weigh']; ?>">
  </div>
  <div class="form-group">
    <label for="description">Mô tả</label>
    <textarea class="form-control" id="description" name="description"><?php echo $row['description']; ?></textarea>
  </div>
  <div class="form-group">
    <label for="quantity">Số lượng</label>
    <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>">
  </div>
  <div class="form-group">
    <label for="price">Giá</label>
    <input type="text" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>">
  </div>
  <div class="form-group">
  <label for="status_item">Tình trạng</label>
  <select class="form-control" id="status_item" name="status_item" disabled>
    <option value="0" <?php if ($row['status_item'] == 0) echo 'selected'; ?>>Đang chờ xác nhận</option>
    <option value="1" <?php if ($row['status_item'] == 1) echo 'selected'; ?>>Đang vận chuyển</option>
    <option value="2" <?php if ($row['status_item'] == 2) echo 'selected'; ?>>Đã giao</option>
  </select>
</div>

  <div class="form-group">
    <label for="price_ship">Giá vận chuyển</label>
    <input type="text" class="form-control" id="price_ship" name="price_ship" value="<?php echo $row['price_ship']; ?>" readonly>
  </div>
  <div class="form-group">
    <label for="trip_date">Ngày chuyến xe</label>
    <?php $tripDate = date("d-m-Y", strtotime($row['trip_date'])); ?>
    <input type="text" class="form-control" id="trip_date" name="trip_date" value="<?php echo $tripDate; ?>" readonly>
</div>
<br>
  <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
</div>
</body>
</html>

