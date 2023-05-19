<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql="SET FOREIGN_KEY_CHECKS = 0";
    
    require_once 'connectdb.php';
    $conn->query($sql);
   

    // Then, delete the vehicle from the `vehicles` table
    $delete_vehicle_sql = "DELETE FROM vehicles WHERE id_vehicle = $id";
    if (mysqli_query($conn, $delete_vehicle_sql)) {
        // Deletion successful, redirect back to the data display page
        header("location:../pages/driver/Vehicles.php");
        exit(); // Exit to prevent further execution
    } else {
        echo "Error deleting vehicle: " . mysqli_error($conn);
    }
}
?>
