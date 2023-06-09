<?php
session_start();
include('connectdb.php');

// Kiểm tra kết nối
if (!$conn) {
  die("Kết nối không thành công: " . mysqli_connect_error());
}

$point_of_departure = $_POST["point_of_departure"];
$destination = $_POST["destination"];
$trip_date = $_POST["trip_date"];
$currentDateTime = new DateTime();
$currentDateTime1 = $currentDateTime->getTimestamp() * 1000;
$userInput = $trip_date;
$userInput1= strtotime($userInput);
$userInput2= $userInput1 *1000;

// Thời gian nhập vào (định dạng: Y-m-d)
$status = '';
if ($userInput2 < $currentDateTime1) {
  $status = 'Đã chạy';
} else if ($userInput2 > $currentDateTime1) {

 
  $status = 'Chưa chạy';
} else {
  $status = 'Đang chạy';
}

$price_ship = $_POST["price_ship"];
$price_book = $_POST["price_book"];
$id_vehicle = $_POST["id_vehicle"];

$id_drivers = $_SESSION['id_drivers'];

$sql = "INSERT INTO trips (point_of_departure, destination, trip_date, status, price_book, price_ship, id_drivers, id_vehicle)
VALUES ('$point_of_departure', '$destination', '$trip_date', '$status', $price_book, '$price_ship', '$id_drivers', '$id_vehicle')";

// Thực hiện truy vấn
if ($conn->query($sql) === TRUE) {
  echo "Thêm trips thành công";
  header("Location: ../pages/driver/Trips.php");
} else {
  echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
