<?php 
session_start();
include('../user/connect.php');
$sql ="SELECT * FROM ORDERS;";
$query = mysqli_query($conn,$sql);
$_SESSION['quantity_order']= mysqli_num_rows($query);

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Admin Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!----======== CSS ======== -->
     <link rel="stylesheet" href="../../../PHP-Project-BookCar/styles/admin.css">
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
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Bảng điều khiển</span>
                </a></li>
                <li><a href="../admin/customer.php">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Khách hàng</span>
                    
                </a></li>
                <li><a href="../admin/orders.php">
                    <i class="uil uil-shopping-cart-alt"></i>
                    <span class="link-name">Đơn đặt hàng</span>
                </a></li>
                <li><a href="../admin/qltrips.php">
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
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Bảng điều khiển</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-user"></i>
                        <span class="text">Khách hàng</span>
                        <span><?php echo $_SESSION['quantity_cus']?></span>
                        <span id="user"></span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-shopping-cart-alt"></i>
                        <span class="text">Đơn đặt hàng</span>
                        <span><?php echo $_SESSION['quantity_order']?></span>
                        <span id="order"></span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-bed-double"></i>
                        <span class="text">Chuyến xe</span>
                        <span><?php echo $_SESSION['quantity_trip']?></span>
                        <span id="room"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
</body>
</html>
