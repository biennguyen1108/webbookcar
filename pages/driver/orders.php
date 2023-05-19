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
            <h2 style="margin-left: 400px; ">DANH SÁCH ĐẶT XE</h2>
            <div class="row" style="margin-left:30px">
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

    // $sql = " SELECT name , address ,username , password, phone , role FROM drivers , users,account";
    // $sql = "SELECT id_bookcar, book_cars.quantity,book_cars.price, book_cars.id_trips,
    // trips.id_trips, point_of_departure,destination,trip_date,
    // orders.id_orders,orders.status,
    // payment.id_payment,payment.status,method,amount
    // FROM trips, orders , book_cars ,payment WHERE orders.id_trips = trips.id_trips   AND orders.id_payment = payment.id_payment AND book_cars.id_bookcar= payment.id_bookcar";
    $sql= "SELECT*FROM drivers, trips, orders , book_cars ,payment,users WHERE orders.id_trips = trips.id_trips   AND orders.id_payment = payment.id_payment AND book_cars.id_bookcar= payment.id_bookcar AND  users.id_users =book_cars.id_users AND trips.id_drivers= drivers.id_drivers  ";
    if($result = $conn->query($sql)){
      

        $query = mysqli_query($conn,$sql);
            if ($result->num_rows > 0) {
                   

            echo "<table class='table' style='padding: 5px;'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Điểm đón</th>
                                <th>Điểm đến</th>
                                <th>Lái xe</th>
                                <th>Ngày khởi hành</th>
                                <th>Phương thức thanh toán</th>
                                <th>Số lượng chỗ ngồi</th>  
                                <th>Trạng thái</th>
                                <th>Giá</th>
                               
                            </tr>
                        </thead>";

            // Hiển thị từng bản ghi
            while($row = $result->fetch_assoc()) {
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
                        $updateStatusQuery = "UPDATE orders SET status = '$status' WHERE id_trips = '$id_trip'";
                        mysqli_query($conn, $updateStatusQuery);
            echo "
            <tbody>
                        <tr>
                        
                            <td>".$row["id_orders"]."</td>
                            <td>".$row["name"]."</td>
                            <td>".$row["phone"]."</td>
                            <td>".$row["point_of_departure"]."</td>
                            <td>".$row["destination"]."</td>
                            <td>".$row["name_drivers"]."</td>
                            <td>".$row["trip_date"]."</td>
                            <td>".$row["method"]."</td>
                            <td>".$row["amount"]."</td>
                            <td>".$row['status']."</td>
                            <td>".$row["price"]."</td>
                           
                           
                        </tr>
            </tbody>";
            }

            echo "</table>";
            } else {
            echo "Không có bản ghi nào trong cơ sở dữ liệu";
            }

            // Đóng kết nối tới database
            mysqli_close($conn);
        }
            ?>
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