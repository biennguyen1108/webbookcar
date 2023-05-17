<?php
session_start();
include('connectdb.php');

// Kiểm tra kết nối

if (!$conn) {
  die("Kết nối không thành công: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM accounts WHERE username = '$username' AND password = '$password' AND role ='driver'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id_account = $row['id_account'];
// Kiểm tra kết quả trả về
if ((mysqli_num_rows($result) > 0))  {
  $sql = "SELECT * FROM drivers WHERE id_account= '$id_account'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $_SESSION['id_drivers'] = $row['id_drivers'];
  echo $_SESSION['id_drivers'];
    // Đăng nhập thành công, chuyển hướng đến trang chủ
    header("Location: ../pages/driver/drivers.php");
} else {
    // Đăng nhập thất bại, thông báo lỗi và yêu cầu đăng nhập lại
    echo "Invalid username or password. Please try again.";
    header("Location: ../pages/driver/drivers.php");

}

// Đóng kết nối đến CSDL
mysqli_close($conn);

?>