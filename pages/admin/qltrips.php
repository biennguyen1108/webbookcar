<?php 
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Admin Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../../../Project-PHP/styles/admin.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <!--<img src="images/logo.png" alt="">-->
            </div>

            <span class="logo_name">3HBT</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="admin.php">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Bảng điều khiển</span>
                    </a></li>
                <li><a href="customer.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">Khách hàng</span>
                    </a></li>
                <li><a href="orders.php">
                        <i class="uil uil-shopping-cart-alt"></i>
                        <span class="link-name">Đơn đặt hàng</span>
                    </a></li>
                <li><a href="qltrips.php">
                        <i class="uil uil-bed-double"></i>
                        <span class="link-name">Chuyến xe</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-setting"></i>
                        <span class="link-name">Cài đặt</span>
                    </a></li>
            </ul>

        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>

            <!--<img src="images/profile.jpg" alt="">-->
        </div>

        <div class="dash-content">
            <h2 style="margin-left: 350px;">Danh Sách Chuyến Xe</h2>
            <div class="row" style="margin-left:30px">

                <table class='table' style='padding: 5px;'>
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Điểm khởi hành</th>
                            <th>Điểm đến</th>
                            <th>Ngày xuất phát</th>
                            <th>Giá vé xe</th>
                            <th>Phí ship</th>
                            <th>Lái xe</th>
                            <th>Phương tiện</th>
                            <th>Tình trạng</th>
                            <th>Tùy chọn</th>
                        </tr>
                    </thead>



                    <tbody>
                        <?php
                        // Kết nối tới database
                        $dbhost = 'localhost';
                        $dbuser = 'root';
                        $dbpass = '';
                        $dbname = 'booking_car';
                        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                        // Kiểm tra kết nối
                        if (!$conn) {
                            die("Kết nối không thành công: " . mysqli_connect_error());
                        }

                        $sql = "SELECT id_trips, point_of_departure,destination,trip_date,status,price_book,price_ship,name_drivers ,name_vehicles
FROM vehicles , trips ,drivers WHERE trips.id_drivers = drivers.id_drivers AND trips.id_vehicle = vehicles.id_vehicle";
                        $result = $conn->query($sql);
                        $query = mysqli_query($conn,$sql);
                        $_SESSION['quantity_trip']= mysqli_num_rows($query);
                        
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?php echo $row["id_trips"] ?></td>
                                    <td><?php echo $row["point_of_departure"] ?></td>
                                    <td><?php echo $row["destination"] ?></td>
                                    <td><?php echo $row["trip_date"] ?></td>
                                    <td><?php echo $row["price_book"] ?></td>
                                    <td><?php echo $row["price_ship"] ?></td>
                                    <td><?php echo $row["name_drivers"] ?></td>
                                    <td><?php echo $row["name_vehicles"] ?></td>
                                    <td><?php echo $row["status"] ?></td>
                                    <td>
                                       
                                        <a onclick="return confirm('Bạn có muốn xóa xe này không?');" href="../../assets/xulyxoatripadmin.php? delete=<?php echo $row['id_trips'] ?> ">
                                            <button type="button" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                </svg></button>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }

                            echo "</table>";
                        } else {
                            echo "Không có bản ghi nào trong cơ sở dữ liệu";
                        }

                        // Đóng kết nối tới database
                        mysqli_close($conn);
                        ?>

                    </tbody>


            </div>


        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>