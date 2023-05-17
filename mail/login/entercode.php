<?php 
session_start();
$email=$_SESSION['emails'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
  <h1>Enter your code</h1>
  <form action="./entercode.php" method="post" class="form">
    <div class="form-group">
      <label for="code">Code</label>
      <input type="number" class="form-control" id="code" name="code">
    </div>
    <div class="btn-confirm">
      <a href="../../index.php" class="cancel">Cancel</a>
      <input type="submit" value="Confirm" class="btn btn-primary" name="confirm">
      <a href="./execute-email.php?confirm=<?php echo $email ?>" class="resend">Resend code</a>
    </div>
  </form>
</div>

</body>
<?php
    if (isset($_POST['confirm'])) {
        $code=$_POST['code'];
        $verification_code=$_SESSION['code'];
        // echo $code;
        // echo $verification_code;
        if($verification_code==$code){
            header("location:./newpassword.php");
        }else{
            echo "<script>swal.fire('Lỗi!','Xác thực không chính xác','error')</script>";
        }
    }
?>
<style>
  .container {
  max-width: 400px;
  margin: 0 auto;
  text-align: center;
}

h1 {
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="number"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.btn-confirm {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
}

.cancel {
  display: inline-block;
  padding: 10px 20px;
  margin-right: 10px;
  background-color: #ccc;
  color: #fff;
  text-decoration: none;
  border-radius: 4px;
}

.confirm {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  text-decoration: none;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.resend {
  display: inline-block;
  margin-left: 10px;
  color: #007bff;
  text-decoration: none;
}

.confirm:hover,
.cancel:hover,
.resend:hover {
  opacity: 0.8;
}


</style>
</html>