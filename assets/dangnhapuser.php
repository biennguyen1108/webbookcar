
<?php
session_start();

include('connectdb.php');

// Kiểm tra kết nối

if (!$conn) {
  die("Kết nối không thành công: " . mysqli_connect_error());
}
$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM accounts WHERE username = '$username' AND password = '$password' AND role ='user'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
// Kiểm tra kết quả trả về
if (mysqli_num_rows($result) > 0) {
  $_SESSION['id']=$row['id_account'];
  $_SESSION['username'] = $username;
 
    // Đăng nhập thành công, chuyển hướng đến trang chủ
    header("Location: ../pages/user/show.php");
} else {
    // Đăng nhập thất bại, thông báo lỗi và yêu cầu đăng nhập lại
    echo "<script>
    alert('Thông tin đăng nhập không đúng!');
    window.location.href = '../index.php';</script>;
   "
    ;

}

// Đóng kết nối đến CSDL
mysqli_close($conn);

?>