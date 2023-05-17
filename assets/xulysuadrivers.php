<?php
include('connectdb.php');
// Kiểm tra kết nối

if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}
$idaccount = $_POST['id_account'];
$name = $_POST["name_driver"];
$driver_license = $_POST["driver_license"];
$address = $_POST["address"];
$age = $_POST["age"];
$description = $_POST["description"];
$phone = $_POST["phone"];
$image = $_FILES['image'];
$image_temp = $image['name'];
$id = $_POST['sid'];

if (!empty($image_temp)) {
    $updatesql = "UPDATE drivers SET id_account='$idaccount', name_drivers='$name' ,image='$image_temp',description='$description',  driver_license='$driver_license', address='$address', age='$age' , phone='$phone' WHERE id_drivers=$id";
    move_uploaded_file($image['tmp_name'], '../pages/image/'.$image_temp);
    if (mysqLi_query($conn, $updatesql)) {
        // echo "Thành công";
        header("location:../pages/driver/drivers.php");
    }
} else {
    $updatesql = "UPDATE drivers SET id_account='$idaccount', name_drivers='$name' ,description='$description',  driver_license='$driver_license', address='$address', age='$age' , phone='$phone' WHERE id_drivers=$id";
    if (mysqLi_query($conn, $updatesql)) {
        // echo "Thành công";
        header("location:../pages/driver/drivers.php");
    }
}
