<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết</title>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../Project-PHP/styles/footer.css">
    <link rel="stylesheet" href="../../../Project-PHP/styles/header.css">
    <link rel="stylesheet" href="../../../Project-PHP/styles/detail.css">
</head>

<body>

    <?php include '../components/header.php'; ?>
    <br>
    <br><br><br>
    </div>

    <?php

    include "connect.php";
    if (isset($_GET['detail'])) {
        $id = $_GET['detail'];
    }
    $sql = "SELECT trips.id_trips, trips.point_of_departure,vehicles.vehicle_type, vehicles.image,destination, trip_date, price_book, price_ship,name_drivers , name_vehicles 
    FROM trips ,vehicles , drivers WHERE  id_trips=$id";
    $arr = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($arr);
    ?>
    <div class="container">
        <h2>Thông tin chi tiết chuyến xe</h2>

        <div class="row" style="display: flex;
">
            <div class="col-md-5">

                <img  src="../image/<?php echo $row['image'] ?>" style="width:450px; height:400px ; border-radius: 15px" />
            </div>
            <div class="col-md-7" style="width:100%">
                <h4 class="title-name" style="color:grey; "><b>
                        <h2><?php echo $row['point_of_departure'] ?>
                            <svg style="width: 50px; height: 30px; " xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 15.405 14.707" viewBox="0 0 15.405 14.707" id="round">
                                <path d="M5.061 8 1.914 4.854h9.793c1.378 0 2.5 1.122 2.5 2.5h1c0-1.93-1.57-3.5-3.5-3.5H1.914L5.06.708 4.354 0 0 4.354l4.354 4.354L5.061 8z"></path>
                                <path d="m11.061 6-.708.706 3.14 3.147H3.707a2.503 2.503 0 0 1-2.5-2.5h-1c0 1.93 1.57 3.5 3.5 3.5h9.786L10.353 14l.708.706 4.344-4.353L11.061 6z"></path>
                            </svg>
                            <?php echo $row['destination'] ?>
                        </h2>
                    </b>
                </h4>
                <div class="dayss" style="color:red"><b>Ngày khởi hành: <?php echo $row['trip_date'] ?><b></div>
                <div style="color:grey;font-size: 16px; " class="price">
                    <div class="book">
                            <p>Giá vé xe: <?php echo $row['price_book']?> nghìn đồng</p>
                        </div>
                    <div class="ship">
                            <p>Phí Ship: <?php echo $row['price_ship']?> nghìn đồng</p>
                        </div>
                </div>
                
                <div style="color:grey; " class="name-driver">
                    
                        <p>Tên người lái : <?php echo $row['name_drivers'] ?></p>
                    
                </div>
                <div style="color:grey; " class="name-vehicle">
                    
                        <p> Loại xe: <?php echo $row['vehicle_type'] ?></p>
                    
                </div>
                <div style="color:grey; " class="name-vehicle">
                    
                        <p> Tên xe: <?php echo $row['name_vehicles'] ?></p>
                    
                </div>
                <div class="function">
                    <a style="background-color:#ff5e14" href="Booking.php?book='<?php echo $row['id_trips']?>'" class="btn border-0 ml-2 btn-success">Đặt xe</a>
                    <a style="background-color:#ff5e14" href="Send-item.php?Send='<?php echo $row['id_trips']?>'" class="btn border-0 ml-2 btn-success">Gửi hàng</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    ?>
    <?php
    include '../components/footer.php';
    ?>
</body>

</html>