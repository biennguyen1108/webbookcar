<?php
// Kết nối tới database
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'booking_car';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Kiểm tra kết nối

if (!$conn) {
  die("Kết nối không thành công: " . mysqli_connect_error());
}

?>