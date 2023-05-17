<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Take information of vehicles</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../styles/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../styles/dist/css/adminlte.min.css">
</head>

<body>
    <?php

    $sid = $_GET['edit'];
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'booking_car';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }
    // echo $id;
    // ket noi
    // lấy thông tin về lại 
    $edit_sql = "SELECT * FROM trips WHERE id_trips=$sid";
    $result = mysqli_query($conn, $edit_sql);
    $row = mysqli_fetch_assoc($result);
    // hiển thị thông tin lên form
    ?>
    <section class="content" style="width:600px;height:100vh;margin-left:350px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h1 class="card-title" style="margin-left: 200px;">UPDATE VEHICLES</h1>
                        </div>

                        <form id="quickForm" method="post" action="../../assets/xulysuatrips.php" enctype="multipart/form-data">
                            <div class="card-body">
                                <input type="hidden" name="sid" value="<?php echo $sid; ?>" id="">
                                <div class="form-group">
                                    <label for="exampleInputpoint_of_departure1">point_of_departure</label>
                                    <input type="text" name="point_of_departure" class="form-control" id="point_of_departure" value="<?php echo $row['point_of_departure']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputdestination1">destination</label>
                                    <input type="text" name="destination" class="form-control" id="destination" value="<?php echo $row['destination']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputimage1">trip_date</label>
                                    <input type="datetime-local" name="trip_date" class="form-control" id="trip_date" value="<?php echo $row['trip_date']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputcapacity1">status</label>
                                    <input type="text" name="status" class="form-control" id="status" value="<?php echo $row['status']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputcapacity1">price_ship</label>
                                    <input type="number" name="price_ship" class="form-control" id="price_ship" value="<?php echo $row['price_ship']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputcapacity1">price_book</label>
                                    <input type="number" name="price_book" class="form-control" id="price_book"  value="<?php echo $row['price_book']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputseat1">id_drivers</label>
                                    <?php

                                 

                                    // Kiểm tra kết nối
                                    if (!$conn) {
                                        die("Kết nối không thành công: " . mysqli_connect_error());
                                    }
                                    $sql = "SELECT id_drivers  FROM drivers ";
                                    if ($array = mysqli_query($conn, $sql)) {
                                    ?>
                                        <select name="id_drivers">
                                            <?php
                                            while ($r = mysqli_fetch_assoc($array)) {
                                            ?>
                                                <option value="<?php echo $r['id_drivers'] ?>"><?php echo $r['id_drivers'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php
                                    }

                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputdescription1">id_vehicle</label>
                                    <?php

                                   

                                    // Kiểm tra kết nối
                                    if (!$conn) {
                                        die("Kết nối không thành công: " . mysqli_connect_error());
                                    }
                                    $sql = "SELECT id_vehicle  FROM vehicles ";
                                    if ($array = mysqli_query($conn, $sql)) {
                                    ?>
                                        <select name="id_vehicle">
                                            <?php
                                            while ($r = mysqli_fetch_assoc($array)) {
                                            ?>
                                                <option value="<?php echo $r['id_vehicle'] ?>"><?php echo $r['id_vehicle'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php
                                    }

                                    ?>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>

                <div class="col-md-6">

                </div>

            </div>

        </div>
    </section>
</body>

</html>