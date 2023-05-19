<?php

include('connectdb.php');
// Kiểm tra kết nối

if (!$conn) {
  die("Kết nối không thành công: " . mysqli_connect_error());
}

$name = $_POST["name"];
$vehicle_type = $_POST["vehicle_type"];
// $image = $_POST["image"];
$capacity= $_POST["capacity"];
$seat = $_POST["seat"];
$description = $_POST["description"];
$fileimage = $_FILES['image'];
$image_temp = $fileimage['name'];
move_uploaded_file($fileimage['tmp_name'],'../pages/image/'.$image_temp); //di chuyển ảnh vào folder image 
$sql = "INSERT INTO vehicles (name_vehicles,vehicle_type, image,capacity,seat, description)
VALUES ('$name','$vehicle_type','$image_temp','$capacity',$seat, '$description')";
// Thực hiện truy vấn
// if ($conn->query($sql) === TRUE) 
if(mysqli_query($conn, $sql))
{
  echo "<script>
  alert ('Bạn đã thêm xe thành công');
  window.location.href ='../pages/driver/vehicles.php'</script>";
} else {
  echo "Lỗi: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>