<?php 
session_start();
// session_start();
include "connectdb.php";



  
    // if (isset($_SESSION['username'])) {
    //     $data = $_SESSION['username'];
    //     $ids = $_SESSION['id'];
    //     $sql_trips = "SELECT id_trips, point_of_departure, vehicles.image as images, destination, trip_date, price_book, price_ship 
    //     FROM trips WHERE id_trips=  $id_trip ";

    //     $sql_accounts = "SELECT * FROM accounts INNER JOIN users ON accounts.id_account = users.id_account WHERE accounts.id_account = $ids";
    //     $result_trips = mysqli_query($conn, $sql_trips);
    //     $result_accounts = mysqli_query($conn, $sql_accounts);

    //     if (mysqli_num_rows($result_accounts) > 0) {
    //         while ($row = mysqli_fetch_assoc($result_accounts)) {
    //             $id_account = $row['id_account'];
    //             $id_user = $row['id_users'];
    //         }
    //         if (mysqli_num_rows($result_trips) > 0) {
    //             while ($row = mysqli_fetch_assoc($result_trips)) {
    //                 $id_trips = $row['id_trips'];
    //             }
    //             $sql_insert = "INSERT INTO book_cars(id_users, id_trips, quantity, price)  VALUES('$id_user','$id_trips','$seat','$total')";

    //             if (mysqli_query($conn, $sql_insert)) {
    //                 echo "Thêm dữ liệu thành công";
    //             } else {
    //                 echo "Thêm dữ liệu thất bại: " . mysqli_error($conn);
    //             }
    //         } else {
    //             echo "Không tìm thấy chuyến đi";
    //         }
    //     }
    // }

?>