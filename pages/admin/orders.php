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

            <span class="logo_name">SUPER</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="index.php">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dahsboard</span>
                    </a></li>
                <li><a href="customer.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">Customers</span>
                    </a></li>
                <li><a href="orders.php">
                        <i class="uil uil-shopping-cart-alt"></i>
                        <span class="link-name">Orders</span>
                    </a></li>
                <li><a href="qltrips.php">
                        <i class="uil uil-bed-double"></i>
                        <span class="link-name">Trips</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-setting"></i>
                        <span class="link-name">Setting</span>
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
            <h2 style="margin-left: 350px;">Danh sách đặt xe</h2>


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
                // Xử lý cập nhật trạng thái chuyến xe
                if (isset($_POST['update_status'])) {
                    $id_order = $_POST['id_order'];
                    $car_status = $_POST['status'];

                    // Cập nhật trạng thái của xe trong cơ sở dữ liệu
                    $sql = "UPDATE orders SET status = '$car_status' WHERE id_orders = '$id_order'";
                    if ($conn->query($sql) === TRUE) {
                        echo "<script> 
                        alert ('Bạn đã cập nhật trạng thái thành công!');
                        </script>";
                    } else {
                        echo "Lỗi: " . $sql . "<br>" . $conn->error;
                    }
                }
                 // Xử lý cập nhật trạng thái chuyến xe
                 if (isset($_POST['update_status_trip'])) {
                    $id_payment = $_POST['id_payments'];
                    $payment_status = $_POST['status_payment'];
                    // Cập nhật trạng thái của xe trong cơ sở dữ liệu
                    $sql = "UPDATE payment SET status_payment = ' $payment_status' WHERE id_payment = '$id_payment'";
                    if ($conn->query($sql) === TRUE) {
                        echo "<script> 
                        alert ('Bạn đã cập nhật trạng thái thành công!');
                        </script>";
                    } else {
                        echo "Lỗi: " . $sql . "<br>" . $conn->error;
                    }
                }
                // $sql = " SELECT name , address ,username , password, phone , role FROM drivers , users,account";
                $sql = "SELECT payment.id_payment, orders.id_orders, trips.point_of_departure, trips.destination, drivers.name_drivers, vehicles.name_vehicles,orders.status, payment.status_payment FROM orders, trips, payment , drivers, vehicles WHERE orders.id_trips=trips.id_trips AND orders.id_payment= payment.id_payment AND trips.id_drivers= drivers.id_drivers AND trips.id_vehicle= vehicles.id_vehicle";

                if ($result = $conn->query($sql)) {

                    if ($result->num_rows > 0) {
                        echo "<table class='table' style='padding: 5px;'>
                        <thead>
                            <tr>
                                <th>ID order</th>
                                <th>Point_of_departure</th>
                                <th>Destination</th>
                                <th>Driver name</th>
                                <th>Vehicle name</th>
                                <th>Status vehicles</th>
                                <th>Status payment</th>
                                <th>Change status vehicles</th>
                                <th>Change status payment</th>
                            </tr>
</thead>";

                        // Hiển thị từng bản ghi
                        while ($row = $result->fetch_assoc()) {
                            echo "
            <tbody>
                        <tr>
                            <td>" . $row["id_orders"] . "</td>
                            <td>" . $row["point_of_departure"] . "</td>
                            <td>" . $row["destination"] . "</td>
                            <td>" . $row["name_drivers"] . "</td>
                            <td>" . $row["name_vehicles"] . "</td>
                            <td>" . $row["status"] . "</td>
                            <td>" . $row["status_payment"] . "</td>
                            <td>
                                 <form method='post'>
                                    <input type='hidden' name='id_order' value='" . $row["id_orders"] . "'>
                                    <select name='status' onchange='this.form.submit()'>
                                    <option value='Chưa chạy' " . ($row["status"] == "Chưa chạy" ? "selected" : "") . ">Chưa chạy</option>
                                    
                                    <option value='Đã chạy' " . ($row["status"] == "Đã chạy" ? "selected" : "") . ">Đã chạy</option>
                                    </select>
                                    <input type='hidden' name='update_status'>
                                </form>
                            </td>
                            <td>
                                <form method='post'>
                                <input type='hidden' name='id_payments' value='" . $row["id_payment"] . "'>
                                <select name='status_payment' onchange='this.form.submit()'>
                                <option value='Chưa thanh toán' " . ($row["status_payment"] == "Chưa thanh toán" ? "selected" : "") . ">Chưa thanh toán</option>
                                <option value='Đã thanh toán' " . ($row["status_payment"] == "Đã thanh toán" ? "selected" : "") . ">Đã thanh toán</option>
                                </select>
                                <input type='hidden' name='update_status_trip'>
                                </form>
                            </td>
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
        <div class="dash-content">
            <h2 style="margin-left: 350px;">Danh sách gửi hàng</h2>


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

                 // Xử lý cập nhật trạng thái chuyến xe
                 if (isset($_POST['update_status_item'])) {
                    $id_item = $_POST['id_item'];
                    $item_status = $_POST['status_item'];

                    // Cập nhật trạng thái của xe trong cơ sở dữ liệu
                    $sql = "UPDATE items SET status_item = '$item_status' WHERE id_items = '$id_item'";
                    if ($conn->query($sql) === TRUE) {
                        echo "<script> 
                        alert ('Bạn đã cập nhật trạng thái thành công!');
                        </script>";
                    } else {
                        echo "Lỗi: " . $sql . "<br>" . $conn->error;
                    }
                }
                 // Xử lý cập nhật trạng thái chuyến xe
                 if (isset($_POST['update_status_payment'])) {
                    $id_payment = $_POST['id_payments'];
                    $payment_status = $_POST['status_payment'];
                    // Cập nhật trạng thái của xe trong cơ sở dữ liệu
                    $sql = "UPDATE payment SET status_payment = ' $payment_status' WHERE id_payment = '$id_payment'";
                    if ($conn->query($sql) === TRUE) {
                        echo "<script> 
                        alert ('Bạn đã cập nhật trạng thái thành công!');
                        </script>";
                    } else {
                        echo "Lỗi: " . $sql . "<br>" . $conn->error;
                    }
                }
                
                // $sql = " SELECT name , address ,username , password, phone , role FROM drivers , users,account";
                $sql = "SELECT items.id_items,items.status_item, trips.point_of_departure,receiver.address_receiver,  drivers.name_drivers, vehicles.name_vehicles, payment.status_payment , payment.id_payment FROM  drivers, trips, items, receiver ,payment, vehicles WHERE items.id_trips=trips.id_trips AND items.id_items= payment.id_items AND  items.id_items= receiver.id_items AND trips.id_vehicle= vehicles.id_vehicle AND trips.id_drivers = drivers.id_drivers ";

                if ($result = $conn->query($sql)) {

                    if ($result->num_rows > 0) {
                        echo "<table class='table' style='padding: 5px;'>
                        <thead>
                            <tr>
                                <th>ID item</th>
                                <th>Point_of_departure</th>
                                <th>Receiver address</th>
                                <th>Driver name</th>  
                                <th>Vehicle name</th>
<th>Status payment</th>   
                                <th>Status Items</th>
                                <th>Change status payment</th>
                                <th>Change status Items</th>
                            </tr>
                        </thead>";

                        // Hiển thị từng bản ghi
                        while ($row = $result->fetch_assoc()) {
                            echo "
            <tbody>
                        <tr>
                        
                            <td>" . $row["id_items"] . "</td>
                            <td>" . $row["point_of_departure"] . "</td>
                            <td>" . $row["address_receiver"] . "</td>
                            <td>" . $row["name_drivers"] . "</td>
                            <td>" . $row["name_vehicles"] . "</td>
                            <td>" . $row["status_payment"] . "</td>
                            <td>" . $row["status_item"] . "</td>
                            <td>
                            <form method='post'>
                            <input type='hidden' name='id_payments' value='" . $row["id_payment"] . "'>
                            <select name='status_payment' onchange='this.form.submit()'>
                            <option value='Chưa thanh toán' " . ($row["status_payment"] == "Chưa thanh toán" ? "selected" : "") . ">Chưa thanh toán</option>
                            <option value='Đã thanh toán' " . ($row["status_payment"] == "Đã thanh toán" ? "selected" : "") . ">Đã thanh toán</option>
                            </select>
                            <input type='hidden' name='update_status_payment'>
                            </form>
                        </td>
                            <td>
                                 <form method='post'>
                                    <input type='hidden' name='id_item' value='" . $row["id_items"] . "'>
                                    <select name='status_item' onchange='this.form.submit()'>
                                    <option value='Chưa giao' " . ($row["status_item"] == "Chưa giao" ? "selected" : "") . ">Chưa giao</option>
                                    <option value='Đang giao' " . ($row["status_item"] == "Đang giao" ? "selected" : "") . ">Đang giao</option>

                                    <option value='Đã giao' " . ($row["status_item"] == "Đã giao" ? "selected" : "") . ">Đã giao</option>
                                    </select>
                                    <input type='hidden' name='update_status_item'>
                                </form>
                            </td>
                            
                           
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
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
