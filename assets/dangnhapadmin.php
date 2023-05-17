<?php

include('connectdb.php');

// Kiểm tra kết nối

if (!$conn) {
  die("Kết nối không thành công: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM accounts WHERE username = '$username' AND password = '$password'AND role ='admin'";
$result = mysqli_query($conn, $sql);

// Kiểm tra kết quả trả về
if (mysqli_num_rows($result) > 0) {
    // Đăng nhập thành công, chuyển hướng đến trang chủ
    header("Location: ../pages/admin/admin.php");
} else {
    // Đăng nhập thất bại, thông báo lỗi và yêu cầu đăng nhập lại
    // $message='Invalid username or password. Please try again';
    // echo "<script type='text/javascript'>alert('adasdasdasd');</script>";
    echo "<script>alert('Invalid username or password. Please try again')</script>";
    echo "<script>window.location.replace('../pages/admin/index.php')</script>";
    
    // header("Location: ../pages/admin/index.php");

}



// Đóng kết nối đến CSDL
mysqli_close($conn);

?>