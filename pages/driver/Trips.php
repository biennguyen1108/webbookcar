<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../styles/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../styles/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">


                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="../../styles/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">3HBT</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../styles/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Driver</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Bảng điều khiển
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../driver/vehicles.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Phương tiện</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../driver/Trips.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Chuyến xe</p>
                                    </a>
                                </li>
                             
                                <li class="nav-item">
                                    <a href="../driver/orders.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Đơn đặt xe</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../driver/send_item.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Đơn gửi hàng</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>





        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-left:250px">
            <h2 style="margin-left: 400px;">DANH SÁCH CHUYẾN XE</h2>

            <button style="margin-bottom:20px;margin-left: 40px;background-color:#ff5e14;border:none"> <a href="../driver/addtrips.php" style="text-decoration: none;color:#fff">Thêm</a></button>

            <div class="row" style="margin-left:30px">

                <table class='table' style='padding: 5px;'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Điểm khởi hành</th>
                            <th>Điểm đến</th>
                            <th>Ngày khởi hành</th>
                            <th>Giá vé xe</th>
                            <th>Phí ship</th>
                            <th>Lái xe</th>
                            <th>Tên phương tiện</th>
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
                        $sql = "SELECT id_trips, point_of_departure, destination, trip_date, status, price_book, price_ship, name_drivers, name_vehicles
                        FROM vehicles, trips, drivers
                        WHERE trips.id_drivers = drivers.id_drivers AND trips.id_vehicle = vehicles.id_vehicle";
                $result = $conn->query($sql);
                
                // Kiểm tra xem có dữ liệu trả về hay không
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Lấy ngày hiện tại và ngày khởi hành từ cơ sở dữ liệu
                        $currentDateTime = new DateTime();
                        $currentDateTime1 = $currentDateTime->getTimestamp() * 1000;
                        $userInput = $row['trip_date'];
                        $userInput1 = strtotime($userInput);
                        $userInput2 = $userInput1 * 1000;
                
                        // Xác định trạng thái dựa trên ngày hiện tại và ngày khởi hành
                        $status = '';
                        if ($userInput2 < $currentDateTime1) {
                            $status = 'Đã chạy';
                        } else if ($userInput2 > $currentDateTime1) {
                            $status = 'Chưa chạy';
                        } else {
                            $status = 'Đang chạy';
                        }
                
                        // Cập nhật trạng thái của chuyến đi trong cơ sở dữ liệu
                        $id_trip = $row['id_trips'];
                        $updateStatusQuery = "UPDATE trips SET status = '$status' WHERE id_trips = '$id_trip'";
                        mysqli_query($conn, $updateStatusQuery);
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
                                        <a onclick="return confirm('Bạn có muốn sửa xe này không?');" href="../driver/editTrips.php?edit=<?php echo $row['id_trips']; ?>">
                                            <button type="button" class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                </svg></button>
                                        </a>
                                        <a onclick="return confirm('Bạn có muốn xóa xe này không?');" href="../../assets/xulyxoatrips.php? delete=<?php echo $row['id_trips'] ?> ">
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
    </div>
    <!-- jQuery -->
    <script src="../../styles/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../styles/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="../../styles/dist/js/adminlte.js"></script>

</body>

</html>