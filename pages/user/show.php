<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="icon" href="images/fevicon.png" type="image/gif"/>
<script src="https://kit.fontawesome.com/11a9c95312.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="../../../Project-PHP/styles/user.css">
<link rel="stylesheet" href="../../../Project-PHP/styles/header.css">
<!-- <link rel="stylesheet" href="../../../Project-PHP/styles/header.css"> -->
<link rel="stylesheet" href="../../../Project-PHP/styles/footer.css">
<link rel="stylesheet" href="../../../Project-PHP/styles/icon.css">
<!-- <link rel="stylesheet" href="../../../PHP-Project-BookCar/styles/blog.css"> -->
<style>
    .triangle {
	width: 0; 
	height: 0; 
	border-left: 20px solid transparent;
	border-right: 20px solid transparent;
	border-top: 20px solid #fff;
	margin-left: 40%;
    top: 130px;
    margin-bottom: 4px;
    position: relative;
	display: block;
	}
    .sc6 .container-sc6 .wrap{
	display: flex;
	flex-direction: row;
}
.sc6 .container-sc6 .wrap .main-text{
	width: 216px;
    height: 300px;
	border-radius: 5%;
	background-color: #595959;
	text-align: center;
	margin-right: 10px;
    margin-bottom: 150px;
}
.sc6 .container-sc6 .avatar img{
	align-items: center;
	border-radius: 50%;
    position: relative;
    top: 140px;
    border: 1px solid #595959;

}


</style>
<title>Trang chủ</title>
</head>
<body>
    <div>
    <?php 
                // phpinfo();
                include ('../components/header.php') ;
            ?>
    </div>
        <div class="icon-container">
                <!-- Tạo icon cho chatbox -->
            <a href="./Email/comment_index.php" class="chat-icon"><i class="fa fa-comment"></i></a>
        <!-- Tạo icon cho số điện thoại -->
            <a href="tel:0123456789" class="phone-icon"><i class="fa fa-phone"></i></a>
        <!-- Tạo icon cho Facebook -->
            <a href="https://www.facebook.com/myfanpage/" class="facebook-icon" target="_blank"><i class="fa fa-facebook"></i></a>
        </div>
        

            <section class="section1">
            <div class="lopphu"></div>
            <div class="section1-content">
                <div class="section1-content-left">
                    <h1 style="margin-left: 20px;margin-top: 150px;"> <i>3HBT XIN CHÀO</i></h1>
                    <br>
                    <br>
                    <h3 style="width: 300px;text-align: center;margin-left: 20px;"><i> Ngay bây giờ, bạn có thể đi khắp mọi nơi, gửi quà cho bất kì ai bằng dịch vụ của chúng tôi.</i></h3>
                </div>
                <!-- form section 1 -->  
                <div class="section1-content-right" style="margin-top: 150px;">
                    <form class="section1-form" method="post" action="../../../Project-PHP/pages/user/xulyshow.php">
                        <table>
                            <tr>
                                <td>
                                    <span class="form-title">ĐIỂM KHỞI HÀNH</span>
                                </td>
                                <td>
                                    <input list="form-pickUp-locations" name="point_of_departure" id="form-pickUp-location">
                                    <datalist id="form-pickUp-locations">
                                    <option value="Đà Nẵng">Đà Nẵng</option>
                                        <option value="Quảng Trị">Quảng Trị</option>
                                        <option value="Quảng Nam">Quảng Nam</option>
                                        <option value="Huế">Huế</option>
                                        <option value="Bình Định">Bình Định</option>
                                        <option value="Quảng Ngãi">Quảng Ngãi</option>
                                        <option value="Quảng Bình">Quảng Bình</option>
                                    </datalist>
                                    <span class="form-icon"><i class="fa-sharp fa-solid fa-location-dot"></i></span>
                                </td>                 
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="form-title">ĐIỂM ĐẾN</span>
                                </td>
                                <td>
                                    <input list="form-drop-locations" name="destination" id="form-drop-location">
                                    <datalist id="form-drop-locations">
                                        <option value="Đà Nẵng">Đà Nẵng</option>
                                        <option value="Quảng Trị">Quảng Trị</option>
                                        <option value="Quảng Nam">Quảng Nam</option>
                                        <option value="Huế">Huế</option>
                                        <option value="Bình Định">Bình Định</option>
                                        <option value="Quảng Ngãi">Quảng Ngãi</option>
                                        <option value="Quảng Bình">Quảng Bình</option>
                                    </datalist>
                                    <span class="form-icon"><i class="fa-sharp fa-solid fa-location-dot"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="form-title">THỜI GIAN</span>
                                </td>
                                <td>
                                    <input type="datetime-local" class="form-date-time" name="time">
                                </td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                <input type="submit" name="submit" style="background-color:#ff5e14;color:#fff" value="TÌM KIẾM">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
    </section>
    
<!-- code session 2 -->
<div class="latest-blog" style="background: #fff;color: #010101;" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-all text-center">
                            <h1 style="color: black;">DỊCH VỤ CỦA CHÚNG TÔI</h1>
                            <p>Chúng tôi cung cấp những dịch vụ tốt nhất cho khách hàng</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4 col-xl-4">
                        <div class="blog-box">
                            <div class="blog-img">
                                <img class="img-fluid" src="https://images.pexels.com/photos/112460/pexels-photo-112460.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt=""style="width:360px;height:250px"/>
                            </div>
                            <div class="blog-content">
                                <div class="title-blog">
                                    <h3>ĐẶT XE</h3>
                                    <p>Chúng tôi cung cấp dịch vụ đặt xe trực tuyến giúp khách hàng dễ dàng đặt xe một cách nhanh chóng và tiện lợi. Khách hàng có thể đặt xe trước và lựa chọn loại xe phù hợp với nhu cầu của mình.</p>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-4">
                        <div class="blog-box">
                            <div class="blog-img">
                                <img class="img-fluid" src="https://images.pexels.com/photos/909907/pexels-photo-909907.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="" style="width:360px;height:250px"/>
                            </div>
                            <div class="blog-content">
                                <div class="title-blog">
                                    <h3>ĐẶT XE GHÉP</h3>
                                    <p>Dịch vụ đi chung xe của chúng tôi cho phép khách hàng chia sẻ chuyến đi với những người khác ở cùng một điểm đến. Là giải pháp tiết kiệm thời gian và kinh tế cho những ai không muốn chi trả quá nhiều cho phương tiện di chuyển và sự thoải mái trong suốt chuyến đi.</p>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-4">
                        <div class="blog-box">
                            <div class="blog-img">
                                <img class="img-fluid" src="https://images.pexels.com/photos/2365572/pexels-photo-2365572.jpeg?auto=compress&cs=tinysrgb&w=600" alt=""style="width:360px;height:250px"/>
                            </div>
                            <div class="blog-content">
                                <div class="title-blog">
                                    <h3>VẬN CHUYỂN NHANH CHÓNG</h3>
                                    <p>Chúng tôi cung cấp dịch vụ vận chuyển nhanh chóng cho những khách hàng có nhu cầu vận chuyển hàng hóa trong thời gian ngắn nhất. Chúng tôi có thể giao hàng đến địa điểm mà khách hàng yêu cầu trong vòng vài giờ hoặc ngay trong ngày.</p>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Phan feedback tu khach hang -->
<hr>
<section class="sc6">	
    <div class="container-sc6">
        <!-- <div class="text-title1">
            
        </div> -->
        <div class="text-title2" style="color:black">
            <h1 class="text-title1">CHỨNG NHẬN</h1>
            <p>Chúng tôi tự hào về chất lượng và dịch vụ của mình</p> 
        </div>

        <div class="wrap" style="margin-left:15px;grid-template-columns:repeat(5, 1fr); display:grid; grid-gap: 10px; overflow-x: scroll; height: 400px">
            <?php
                $dbhost = 'localhost';
                $dbuser = 'root';
                $dbpass = '';
                $dbname = 'booking_car';
                $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                if (!$conn) {
                    die("Kết nối không thành công: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM comment order by Name, email, comment";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {


                    // Hiển thị từng bản ghi
                    // $i = 1;
                    while ($row = $result->fetch_assoc()) {
            ?>
            <div class="main-text" >
                <div class="text-box">
                    <div class="icon">
                        <i class="fa-solid fa-quote-left"></i>
                    </div>
                    <div class="text" style="word-wrap: break-word;height:110px"> 
                        <p><?php echo  $row['comment'] ?>
                        </p>
                    </div>
                </div>
                <div class="avatar">
                    <img src="https://hilaw.vn/wp-content/uploads/2022/02/xa-hoi-la-gi-van-de-xa-hoi-la-gi.jpg" alt="" style="width:50px;height:50px;object-fit: cover;object-position: center;">
                </div>
                <div class="name">
                    <p style="font-weight: 900;"><?php echo  $row['Name'] ?></p>
                </div>
            </div>
           
            <?php
                    }
                }
            ?>
            
        </div>

    </div>
</section>
<!-- blog -->
<div class="about_section layout_padding">
         <div class="container">
            <div class="text-title2">
                <h3 style="font-weight: bold;">BLOG</h3>
            </div>
            <div class="row" style="margin-top: 50px;">
               <div class="col-lg-7 col-sm-12">
                  <div class="about_img"><video  src="https://player.vimeo.com/external/363170147.sd.mp4?s=61b558d1819ee9502feb57fdac48fd9ea7ff190c&profile_id=164&oauth2_token_id=57447761" controls></video></div>
                  <div class="like_icon"><h5>Nguyễn Văn Biên</h5></div>
                  <p class="post_text">Đăng Bởi : 01/04/2023 </p>  
                  <h2 class="most_text">Du Lịch Xuyên Việt Cùng 3HBT </h2>
                 
                  <p class="lorem_text">Thứ bảy tuần trước tôi có chuyến đi từ thành phố Hồ Chí Minh ra thủ đô Hà Nội. Đây là chuyến đi tốt nhất của cuộc đời tôi. Em có view đẹp và nhà xe cũng rất chu đáo</p>
                  <div class="social_icon_main">
                     <div class="read_bt"> <button style="background-color:black"> <a href="#" style="text-decoration: none; color:white">Đọc thêm</a></button> <br><br><br><br>
                       </div>
                  </div>
               </div>
               <div class="col-lg-5 col-sm-12">
                  <div class="newsletter_main">
                     <h1 class="recent_taital">Bài đăng gần đây</h1>
                     <div class="recent_box">
                        <div class="recent_left">
                           <div class="image_6"><img src="https://images.pexels.com/photos/6462662/pexels-photo-6462662.png?auto=compress&cs=tinysrgb&w=600" style="width:150px;height:130px"/></div>
                        </div>
                        <div class="recent_right">
                           <h5 class="consectetur_text">Xe đặc biệt Đà Nẵng đi Quảng Trị</h5>
                           <p class="dolor_text">Đang là ngày nghỉ nên rất bất ngờ khi nhà xe </p>
                           <div class="read_bt"> <button style="background-color:black;"> <a href="#" style="text-decoration: none; color:white ; ">Đọc thêm</a></button> 
                       </div>
                        </div>
                     </div>
                     <div class="recent_box">
                        <div class="recent_left">
                           <div class="image_6"><img src="https://images.pexels.com/photos/11191307/pexels-photo-11191307.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load" style="width:150px;height:130px"/></div>
                        </div>
                        <div class="recent_right">
                           <h5 class="consectetur_text">Xe đặc biệt Đà Nẵng đi Quảng Trị</h5>
                           <p class="dolor_text">Đang là ngày nghỉ nên rất bất ngờ khi nhà xe </p>
                           <div class="read_bt"> <button style="background-color:black;"> <a href="#" style="text-decoration: none; color:white ; ">Đọc thêm</a></button> 
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
<?php 
        include "../components/footer.php" ?>
    <!-- ------------------------------------------ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>