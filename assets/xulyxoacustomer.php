<?php
session_start();
// Lấy giá trị của biến 'role' từ session
$role = $_SESSION['role'];

require_once 'connectdb.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    if ($role == 'driver') {
        $sql = "SELECT * FROM drivers WHERE id_account = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_driver = $row['id_drivers'];

            // Xóa bản ghi trong bảng payment
            $xoa_sql = "DELETE payment, book_cars, trips 
                        FROM payment 
                        INNER JOIN book_cars ON payment.id_bookcar = book_cars.id_trips 
                        INNER JOIN trips ON book_cars.id_trips = trips.id_trips 
                        WHERE trips.id_drivers = $id_driver";
            mysqli_query($conn, $xoa_sql);

            // Xóa bản ghi trong bảng drivers
            $xoa_sql = "DELETE FROM drivers WHERE id_account = $id";
            mysqli_query($conn, $xoa_sql);
        }
    } else {
        // Xóa khóa ngoại trong các bảng có liên kết tới bảng users
        $xoa_sql = "DELETE FROM orders WHERE id_payment IN (SELECT id_payment FROM payment WHERE id_items IN (SELECT id_items FROM items WHERE id_users IN (SELECT id_users FROM users WHERE id_account = $id)))";
        mysqli_query($conn, $xoa_sql);

        $xoa_sql = "DELETE FROM payment WHERE id_items IN (SELECT id_items FROM items WHERE id_users IN (SELECT id_users FROM users WHERE id_account = $id))";
        mysqli_query($conn, $xoa_sql);

        $xoa_sql = "DELETE FROM book_cars WHERE id_users IN (SELECT id_users FROM users WHERE id_account = $id)";
        mysqli_query($conn, $xoa_sql);

        $xoa_sql = "DELETE FROM items WHERE id_users IN (SELECT id_users FROM users WHERE id_account = $id)";
        mysqli_query($conn, $xoa_sql);
    }

    // Xóa bản ghi trong bảng users
    $xoa_sql = "DELETE FROM users WHERE id_account = $id";
    mysqli_query($conn, $xoa_sql);

    // Xóa bản ghi trong bảng accounts
    $xoa_sql = "DELETE FROM accounts WHERE id_account = $id";
    mysqli_query($conn, $xoa_sql);
    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>
                alert('Delete customer successfully');
                window.location.href = '../pages/admin/customer.php';
              </script>";
    } else {
        echo "<script>
                alert('Unable to delete customer');
                window.location.href = '../pages/admin/customer.php';
              </script>";
    }
}
?>    
