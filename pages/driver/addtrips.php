<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm chuyến xe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../styles/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../Project-PHP/styles/header.css">

    <link rel="stylesheet" href="../../../Project-PHP/styles/footer.css">
    <link rel="stylesheet" href="../../styles/dist/css/adminlte.min.css">

</head>
<body>
  
<section class="content" style="width:600px;height:100vh;margin-left:350px">
  <div class="container-fluid">
    <div class="row">   
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header" style="background-color:#ff5e14;margin-top:20px">
            <h1 class="card-title" style="margin-left: 200px;">THÊM CHUYẾN XE</h1>
          </div>
         
          <form id="quickForm" method="post" action="../../assets/xulythemtrips.php" enctype="multipart/form-data">
          <div class="card-body">
          <div class="form-group">
                    <label for="exampleInputpoint_of_departure1">Điểm khởi hành</label>
                    <input type="text" name="point_of_departure" class="form-control" id="point_of_departure" placeholder="Nhập điểm khởi hành">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputdestination1">Điểm đến</label>
                    <input type="text" name="destination" class="form-control" id="destination" placeholder="Nhập điểm đến">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputimage1">Ngày khởi hành</label>
                    <input type="datetime-local" name="trip_date" class="form-control" id="trip_date" placeholder="enter trip_date">
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputcapacity1">Tình trạng</label>
                    <input type="text" name="status" class="form-control" id="status" placeholder="Tình trạng chuyến xe">
                  </div> -->
                  <div class="form-group">
                    <label for="exampleInputcapacity1">Phí ship</label>
                    <input type="number" name="price_ship" class="form-control" id="price_ship" placeholder="Phí ship">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputcapacity1">Giá vé xe</label>
                    <input type="number" name="price_book" class="form-control" id="price_book" placeholder="Giá vé xe">
                  </div>
                
                    
                   
                  
                  <div class="form-group">
                    <label for="exampleInputdescription1">Mã phương tiện</label>
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
                   $sql="SELECT id_vehicle  FROM vehicles ";
                   if($array=mysqli_query($conn, $sql)){
                    ?>
                      <select name="id_vehicle">
                        <?php 
                         While($r= mysqli_fetch_assoc($array)){
                          ?>
                        <option value="<?php echo $r['id_vehicle']?>" ><?php echo $r['id_vehicle']?></option>
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
              <button type="submit" class="btn btn-primary" style="background-color:#ff5e14;border:none">Thêm</button>
            </div>
          </form>
        </div>
     
        </div>
     
      <div class="col-md-6">

      </div>
      
    </div>
   
  </div>
</section>        
</div>

</body>
</html>

