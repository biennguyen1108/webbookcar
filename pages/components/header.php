<div class="header" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <div class="logo" style="Width:80px;height:80px " >
                <img class="img1" src="/Project-PHP/images/logo2.png" alt="" style="margin-top:-5px;margin-left:15px;object-fit:cover;object-position: center;Width:80px;height:80px;">
            </div>
            <div class="menu">
                <ul class="listmenu" >
                    <li><a href="../user/show.php" style="text-decoration: none;color:black">TRANG CHỦ</a></li>
                    <li><a href="#" style="text-decoration: none;color:black">VỀ CHÚNG TÔI</a></li>
                    <li><a href="#" style="text-decoration: none;color:black">DỊCH VỤ</a></li>
                    <li><a href="../user/history.php" style="text-decoration: none;color:black">LỊCH SỬ</a></li>
                    <li><a href="#" style="text-decoration: none;color:black">BLOG</a></li>
                    <li><a href="#" style="text-decoration: none;color:black">LIÊN HỆ</a></li>
                    <li><a href="#" style="text-decoration: none;color:black"></a>
                    <?php
                        session_start();
                        if (isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];
                            echo '<a href ="../user/edit_info.php"><span class="welcome" style="color:black;font-weight:500"> ' . $username . '</span></a>';            
                            echo '</li><li>';
                            echo '<button class="bt1"><a href="../../../Project-PHP/logout.php">Đăng xuất</a></button> </li>';
                        } else {
                            echo '<li><button class="bt1"><a href="../../../Project-PHP/login/login.php">LOGIN</a></button></li>';
                        }
                ?>
                </ul>
            </div>
</div>
