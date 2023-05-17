<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lái xe</title>
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
<section class="content" style="margin-top:20px;width:600px;height:100vh;margin-left:350px">
  <div class="container-fluid">
    <div class="row">   
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header" style="background-color:#ff5e14">
            <h1 class="card-title" style="margin-left: 200px;">Thêm </h1>
          </div>
         
          <form id="quickForm" method="post" action="../../assets/xulythemdrivers.php" enctype="multipart/form-data">
            <div class="card-body">
            <div class="form-group">
                <label for="exampleInputname1">ID tài khoản</label>
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
              <div class="form-group">
                <label for="exampleInputname1">Tên người lái xe</label>
                <input type="text" name="namedriver" class="form-control" id="namedriver" placeholder="Enter name driver" require>
              </div>
              <div class="form-group">
                <label for="exampleInputdriver_license1">Bằng lái xe </label>
                <input type="text" name="driver_license" class="form-control" id="driver_license" placeholder="enter driver_license" require>
              </div>
              <div class="form-group">
                <label for="exampleInputimage1">Hình ảnh</label>
                <input type="file" name="image" class="form-control" id="image" require>
              </div>
              <div class="form-group">
                <label for="exampleInputaddress1">Địa chỉ</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="enter address" require>
              </div>
              <div class="form-group">
                <label for="exampleInputage1">Tuổi</label>
                <input type="text" name="age" class="form-control" id="age" placeholder="enter age" require>
              </div>
              <div class="form-group">
                <label for="exampleInputdescription1">Mô tả</label>
                <input type="text" name="description" class="form-control" id="description" placeholder="enter description" require>
              </div>
              <div class="form-group">
                <label for="exampleInputphone1">Số điện thoại</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="enter phone"  require>
              </div>
             
            </div>
         
            <div class="card-footer">
              <button type="submit" name="submit" class="btn btn-primary" style="background-color:#ff5e14;border:none">Thêm</button>
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


