<?php
    include('connectdb.php');
    // Kiểm tra kết nối
    
    if (!$conn) {
      die("Kết nối không thành công: " . mysqli_connect_error());
    }
    
    $name = $_POST["name"];
    $idvehicle_type = $_POST["vehicle_type"];
    // $image = $_POST["image"];
    $capacity= $_POST["capacity"];
    $seat = $_POST["seat"];
    $description = $_POST["description"];
    $image = $_FILES['image'];
    $image_temp = $image['name'];
    $id= $_POST['sid'];
    move_uploaded_file($image['tmp_name'], '../pages/image/'.$image_temp);
    if(!empty($image_temp)){
        $updatesql = "UPDATE vehicles SET name_vehicles='$name',vehicle_type='$idvehicle_type', image='$image_temp', capacity='$capacity', seat='$seat', description='$description' WHERE id_vehicle=$id";
        
        if(mysqLi_query($conn, $updatesql)){
            // echo "Thành công";
            header("Location:../pages/driver/Vehicles.php");
        }
    }
    else{
        $updatesql = "UPDATE vehicles SET name_vehicles='$name',vehicle_type='$idvehicle_type',  capacity='$capacity', seat='$seat', description='$description' WHERE id_vehicle=$id";
        if(mysqLi_query($conn, $updatesql)){
            // echo "Thành công";
            header("Location:../pages/driver/Vehicles.php");
        }
    }
    
?>