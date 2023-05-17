<?php  session_start();
$email=$_SESSION['emails'];
include "../../assets/connectdb.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>New pass</title>
</head>
<body>
<div class="container">
  <form action="./newpassword.php" method="post" class="form">
    <div class="form-group">
      <label for="pass">New password</label>
      <input type="password" id="pass" name="pass">
    </div>
    <div class="form-group">
      <label for="password">Confirm Password</label>
      <input type="password" id="password" name="password">
    </div>
    <input type="submit" value="Save" class="btn" name="btn">
  </form>
</div>


<?php
    if (isset($_POST['btn'])) {
        $sql1="SELECT * from users where email='$email'";     
        $stm=mysqli_query($conn,$sql1);
        $row=mysqli_fetch_assoc($stm);
        $pass=$_POST['password'];
        $password=$_POST['pass'];


        if ($pass!="" && $password!="") {
            if($pass==$password){
                if($row){
                    $update="UPDATE users,accounts
                    set accounts.password='$pass' where email='$email' and accounts.id_account= users.id_account
                    ";
                    $stm=mysqli_query($conn,$update);
                    header("location:../../index.php");    
                }
            }
        }
        else{
            echo "<script>swal.fire('Lỗi','Vui lòng nhập đúng mật khẩu','error')</script>";
        }
        
    }
?>
<style>
  
  .container {
  max-width: 400px;
  margin: 0 auto;
  text-align: center;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="password"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  text-decoration: none;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn:hover {
  opacity: 0.8;
}

</style>
</html>
</body>