<?php 
session_start();
include './connect.php';
error_reporting(0);
$id_account = $_SESSION['id'];

$sql = "SELECT *
        FROM users
        RIGHT JOIN accounts ON users.id_account = accounts.id_account
        WHERE accounts.id_account = '$id_account'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $newUserName = $_POST["user_name"];
    $newPassword = $_POST["password"];
    $name = $_POST["name"];
    $Email = $_POST["email"];
    $Address = $_POST["address"];
    $PhoneNumber = $_POST["phone"];
    $id_account = $row['id_account'];

    // Cập nhật thông tin người dùng trong bảng accounts
    $sql = "UPDATE accounts SET username='$newUserName', password='$newPassword' WHERE id_account = '$id_account'";
    mysqli_query($conn, $sql);

    // Kiểm tra xem có dữ liệu trong bảng users hay chưa
    $sql1 = "SELECT id_account FROM users WHERE id_account = '$id_account'";
    $res = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($res) > 0) {
        // Dữ liệu đã tồn tại, thực hiện câu lệnh UPDATE
        $sql2 = "UPDATE users SET name = '$name', email = '$Email', address = '$Address', phone = '$PhoneNumber' WHERE id_account ='$id_account'";
        mysqli_query($conn, $sql2);
    } else {
        // Dữ liệu chưa tồn tại, thực hiện câu lệnh INSERT
        $sql2 = "INSERT INTO users (id_account, name, email, address, phone)
                VALUES ('$id_account', '$name', '$Email', '$Address', '$PhoneNumber')";
        mysqli_query($conn, $sql2);
    }

    echo "<script>
        alert ('Bạn đã thay đổi thông tin cá nhân thành công');
        window.location.href ='../../../Project-PHP/pages/user/edit_info.php';
    </script>";

    // Đóng kết nối
    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html>
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
  

    <title>Chỉnh sửa thông tin của bạn</title>
    <style>
      

        h2 {
            color: #333;
        }

        form {max-width: 700px;
            margin-top:20px;
            margin-left:auto;
            margin-right:auto;
            margin-bottom:40px;

            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="address"],
        input[type="phone"],input[type="name"]{
            width: 100%;
            padding: 10px;
            margin-bottom: 0px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

      


    </style>
</head>
<body>
    <?php 
    include '../components/header.php';
    ?>
    <h2 style="margin-top:100px;text-align:center;">Chỉnh sửa thông tin của bạn</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="user_name">Tên đăng nhập:</label>
        <input type="text" value="<?php echo $row['username']?>" name="user_name" required><br><br>
        <label for="password">Mật khẩu:</label>
        <input type="text" name="password" value="<?php echo $row['password']?>" required><br><br>
        <label for="name">Tên đầy đủ:</label>
        <input type="name" name="name" value="<?php echo $row['name']?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']?>" required><br><br>
        <label for="address">Địa chỉ:</label>
        <input type="address" name="address"   value="<?php echo $row['address']?>" required><br><br>
        <label for="phone">Số điện thoại:</label>
        <input type="phone" name="phone" value="<?php echo $row['phone']?>" required><br><br>
        <input type="submit" style="background-color:#ff5e14;color:#fff;border:none;border-radius:10px;width:100px;height:50px;font-size:16px" value="Cập nhật">
    </form>

    <?php 
    include '../components/footer.php';
    ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>