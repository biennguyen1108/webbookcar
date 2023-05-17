<?php
    include "connectdb.php";
    $point_of_departure = $_POST["point_of_departure"];
    $destination = $_POST["destination"];
    $trip_date = $_POST["trip_date"];
    $status= $_POST["status"];
    $price_ship = $_POST["price_ship"];
    $price_book = $_POST["price_book"];
    $id_drivers = $_POST["id_drivers"];
    $id_vehicle = $_POST["id_vehicle"];
    $id = $_POST['sid'];
    $updatesql = "UPDATE trips SET id_drivers='$id_drivers',id_vehicle='$id_vehicle', point_of_departure='$point_of_departure', destination='$destination', trip_date='$trip_date', status='$status', price_book='$price_book', price_ship='$price_ship' WHERE id_trips=$id";
    mysqli_query($conn,$updatesql );
    header("location:../pages/driver/Trips.php")
?>