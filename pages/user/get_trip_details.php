<?php
session_start ();
// Kết nối cơ sở dữ liệu
include './connect.php';

// Lấy id_trip từ yêu cầu AJAX
$idTrip = $_GET['id_trip'];

// Truy vấn để lấy thông tin chi tiết về trip từ id_trip
$query = "SELECT t.point_of_departure, t.destination, t.trip_date, t.price_book, d.name_drivers, d.phone
          FROM trips t
          INNER JOIN drivers d ON t.id_drivers = d.id_drivers
          WHERE t.id_trips = '$idTrip'";
          $result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $tripDetails = array(
        'point_of_departure' => $row['point_of_departure'],
        'destination' => $row['destination'],
        'trip_date' => $row['trip_date'],
        'price_book' => $row['price_book'],
        'name_drivers' => $row['name_drivers'],
        'phone' => $row['phone']

    );
    $_SESSION['price_book'] = $tripDetails['price_book'];

    
    // Trả về kết quả dưới dạng JSON
    echo json_encode($tripDetails);
} else {
    // Trường hợp không tìm thấy trip
    echo "Không tìm thấy thông tin trip";
}

$conn->close();
?>
