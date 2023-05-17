<?php

include('connectdb.php');
// Kiểm tra kết nối

if (!$conn) {
  die("Kết nối không thành công: " . mysqli_connect_error());
}

$name = $_POST["namedriver"];
$driver_license = $_POST["driver_license"];
// $image = $_POST["image"];
$address = $_POST["address"];
$age = $_POST["age"];
$description = $_POST["description"];
$phone = $_POST["phone"];
$idaccount = $_POST["id_account"];
$image = $_FILES['image'];
$image_temp = $image['name'];
if (empty($image_temp)) {    //Kiểm tra xem tên tệp đã tải lên có trống hay không.Hàm empty() là một hàm chuyên kiểm tra dữ liệu rỗng trong php
  echo "Không để trống file ảnh";
} else {
  $check = "SELECT * FROM drivers where id_account='$idaccount' AND name_drivers='$name'";
  $ketqua = mysqli_query($conn, $check);
  $dem = mysqli_num_rows($ketqua);
  if ($dem > 0) {
    echo "Tài khoản đã tôn tại";
    header("location:../pages/driver/drivers.php");
  } else { //Nếu tên người dùng không tồn tại, nó sẽ tạo đường dẫn đích cho tệp đã tải lên và chèn dữ liệu của người dùng vào bảng 'nhanvien' bằng truy vấn SQL.
    $target_path = basename($image_temp);
    $sql = "INSERT INTO drivers (id_account,name_drivers, image, description, driver_license,  address, age, phone  )
VALUES ('$idaccount','$name','$image_temp', '$description', '$driver_license',  '$address', '$age', '$phone'  )";
    if (mysqli_query($conn,$sql)) {
      if (move_uploaded_file($image['tmp_name'], '../pages/image/'.$image_temp)) {
        echo "Thêm tài xế thành công";
        header("Location: ../pages/admin/customer.php");
      } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
      }
    }

    $conn->close();
  }
}



// Thực hiện truy vấn
