<?php
session_start();

include "./connect.php";

$id_item = $_POST['id'];
$name = $_POST['name'];
$weigh = $_POST['weigh'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

$sql = "UPDATE items SET name='$name', weigh='$weigh', description='$description', quantity='$quantity', price='$price' WHERE id_items='$id_item'";

if (mysqli_query($conn, $sql)) {
    echo "<script>
    alert('Cập nhật thành công');
    window.location.href = 'history.php';
  </script>";
  
} else {
  echo "Lỗi: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
