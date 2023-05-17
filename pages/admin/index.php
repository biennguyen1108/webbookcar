<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project-PHP/styles/loginadmin.css">
    <title>Đăng nhập Admin</title>
</head>
<body>
<div class="login-box">
  <h2>Đăng nhập Admin</h2>
  <form method="post" action="../../assets/dangnhapadmin.php">
    <div class="user-box">
      <input type="text" name="username" required="">
      <label>Tên người dùng</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required="">
      <label>Mật khẩu</label>
    </div>
    <a href="#">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <button type="submit" style="background-color: transparent;">Đăng nhập</button>
    </a>
  </form>
</div>
</body>
</html>