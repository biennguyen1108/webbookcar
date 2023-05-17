<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    require_once 'connectdb.php';

    // First, delete the associated records in the `trips` table
    $delete_trips_sql = "DELETE FROM trips WHERE id_vehicle = $id";
    mysqli_query($conn, $delete_trips_sql);

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
