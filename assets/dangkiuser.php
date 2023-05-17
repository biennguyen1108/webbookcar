<?php

include('connectdb.php');

// Kiểm tra kết nối

if (!$conn) {
  die("Kết nối không thành công: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$sql = "INSERT INTO accounts (username , password , role)
VALUES ('$username','$password','$role')";

// $result = mysqli_query($conn, $sql);

// Kiểm tra kết quả trả về
if ($conn->query($sql) === TRUE) {
    echo "Tạo account thành công";
    header("Location: ../index.php");
  } else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
?>