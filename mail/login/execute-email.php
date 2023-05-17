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

<?php 
session_start();
if (!isset($_SESSION['code'])){
    $_SESSION['code'] = [];
}
if (!isset($_SESSION['emails'])){
    $_SESSION['emails'] = [];
}
      
include "../../assets/connectdb.php";
include "../Email/src/PHPMailer.php";
include "../Email/src/Exception.php";
include "../Email/src/SMTP.php";
if (isset($_POST['confirm'] )) {
    $mail=$_POST['confirmEmail']  ;
    $_SESSION['emails'] = $mail;
    $sql="SELECT users.email,password from users ,accounts where accounts.id_account = users.id_account";
    $stm=mysqli_query($conn,$sql);
    $email = new PHPMailer\PHPMailer\PHPMailer();
    $email->CharSet = 'UTF-8';
    $email->Host = 'smtp.gmail.com';
    $email->isSMTP();
    $email->SMTPAuth = true;
    $email->Username = 'nguyenvanbien110821@gmail.com';
    $email->Password = 'ypouduifusavciee';
    $email->SMTPSecure = 'tls';
    $email->Port = '587';
    $email->setFrom('nguyenvanbien110821@gmail.com', 'booking_car');
    $email->addAddress($mail);
    $email->Subject = "Code confirm create new password";
    $verification_code = rand(100000, 999999);
     // Tạo mã xác nhận ngẫu nhiên
    // $mail->Body = 'Mã xác thực ' . $verification_code;  // Nội dung email
    while ($row=mysqli_fetch_assoc($stm)) {
        if ($row['email']===$mail) {
            $email->Body = 'Mã xác thực ' . $verification_code;  // Nội dung email
            $_SESSION['code']=$verification_code;
            if (!$email->send()) {
                echo 'Error sending email: ' . $email->ErrorInfo;
            } else {
                $erro=1;
                header("location:./entercode.php");
            }
        }else{
            $erro=0;
        }
    } 
    while ($row=mysqli_fetch_assoc($stm1)) {
        if ($row['email']===$mail) {
            $email->Body = 'Mã xác thực ' . $verification_code;  // Nội dung email
            if (!$email->send()) {
                echo 'Error sending email: ' . $email->ErrorInfo;
            } else {
                $erro=1;
                header("location:./entercode");

            }
        }else{
            $erro=0;
        }
    }
    if($erro==1){
        echo "Thành công";
    }elseif($erro==0){
        echo "<script>swal.fire('Lỗi!','Email không tồn tại','error').then(function () {
            window.location.href = './confirm-email.php';
        });</script>";
    }
}
if(isset($_GET['confirm'])){
    $email=$_GET['confirm'];
    $mail=$_SESSION['emails'];
    $email = new PHPMailer\PHPMailer\PHPMailer();
    $email->CharSet = 'UTF-8';
    $email->Host = 'smtp.gmail.com';
    $email->isSMTP();
    $email->SMTPAuth = true;
    $email->Username = 'nguyenvanbien110821@gmail.com';
    $email->Password = 'ckmfrvdobdwnebtc';
    $email->SMTPSecure = 'tls';
    $email->Port = '587';
    $email->setFrom('nguyenvanbien110821@gmail.com', 'KingDom');
    $email->addAddress($mail);
    $email->Subject = "Code confirm create new password";
    $verification_code = rand(100000, 999999);
    $email->Body = 'Mã xác thực ' . $verification_code;  // Nội dung email
    $_SESSION['code']=$verification_code;
    if (!$email->send()){
        echo 'Error sending email: ' . $email->ErrorInfo;
    } else {
        $erro=1;
        header("location:./entercode.php");
    }
}
?>
</body>