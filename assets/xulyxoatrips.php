<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    require_once 'connectdb.php';

    // First, delete the associated records in the `receiver` table
    $delete_receiver_sql = "DELETE FROM receiver WHERE id_items IN (SELECT id_items FROM items WHERE id_trips = $id)";
    mysqli_query($conn, $delete_receiver_sql);

    // Then, delete the associated records in the `payment` table
    $delete_payment_sql = "DELETE FROM payment WHERE id_items IN (SELECT id_items FROM items WHERE id_trips = $id)";
    mysqli_query($conn, $delete_payment_sql);

    // Next, delete the associated records in the `orders` table
    $delete_orders_sql = "DELETE FROM orders WHERE id_payment IN (SELECT id_payment FROM payment WHERE id_bookcar IN (SELECT id_bookcar FROM book_cars WHERE id_trips = $id))";
    mysqli_query($conn, $delete_orders_sql);

    // Delete the associated records in the `book_cars` table
    $delete_book_cars_sql = "DELETE FROM book_cars WHERE id_trips = $id";
    mysqli_query($conn, $delete_book_cars_sql);

    // Finally, delete the records from the `items` table
    $delete_items_sql = "DELETE FROM items WHERE id_trips = $id";
    mysqli_query($conn, $delete_items_sql);

    // Delete the trip from the `trips` table
    $delete_trip_sql = "DELETE FROM trips WHERE id_trips = $id";
    if (mysqli_query($conn, $delete_trip_sql)) {
        // Deletion successful, redirect back to the data display page
        header("location:../pages/driver/Trips.php");
        exit(); // Exit to prevent further execution
    } else {
        echo "Error deleting trip: " . mysqli_error($conn);
    }
}
?>
