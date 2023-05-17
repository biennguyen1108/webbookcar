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
    $edit_sql = "SELECT * FROM drivers WHERE id_drivers=$sid";
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

                        <form id="quickForm" method="post" action="../../assets/xulysuadrivers.php" enctype="multipart/form-data">
                            <div class="card-body">
                                <input type="hidden" name="sid" value="<?php echo $sid; ?>" id="">
                                <div class="form-group">
                                    <label for="exampleInputname1">Id account</label>
                                    <?php
                   
                   $dbhost = 'localhost';
                   $dbuser = 'root';
                   $dbpass = '';
                   $dbname = 'booking_car';
                   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
               
                   // Kiểm tra kết nối
                   if (!$conn) {
                       die("Kết nối không thành công: " . mysqli_connect_error());
                   }
                   $sql="SELECT id_account  FROM accounts WHERE role='driver'";
                   if($array=mysqli_query($conn, $sql)){
                    ?>
                      <select name="id_account">
                        <?php 
                         While($r= mysqli_fetch_assoc($array)){
                          ?>
                        <option value="<?php echo $r['id_account']?>" ><?php echo $r['id_account']?></option>
                        <?php
                   }
                ?>
                      </select>
                    <?php
                   }
                  
                ?>
              
              </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputname1">name driver</label>
                                    <input type="text" name="name_driver" class="form-control" id="namedriver" value="<?php echo $row['name_drivers'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputdriver_license1">driver_license</label>
                                    <input type="text" name="driver_license" class="form-control" id="driver_license" value="<?php echo $row['driver_license'] ?>">
                                </div>
                                <div class="form-group">
                                <span> <img src="../image/<?php echo $row['image'] ?>" width="50px" height="50px"></span>
                                    <label for="exampleInputimage1">image</label>
                                    <input type="file" name="image" class="form-control" id="image" value="<?php echo $row['image'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputaddress1">address</label>
                                    <input type="text" name="address" class="form-control" id="address" value="<?php echo $row['address'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputage1">age</label>
                                    <input type="text" name="age" class="form-control" id="age" value="<?php echo $row['age'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputdescription1">description</label>
                                    <input type="text" name="description" class="form-control" id="description" value="<?php echo $row['description'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputphone1">phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $row['phone'] ?>">
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