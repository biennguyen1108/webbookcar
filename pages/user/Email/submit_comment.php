<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer-master/PHPMailer-master/src/Exception.php';
require './PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/PHPMailer-master/src/SMTP.php';


$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$comment = htmlspecialchars($_POST['comment']);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please enter a valid email address";
    exit;
}
if (empty($comment)) { 
    echo "Please enter a comment";
    exit;
}
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'booking_car';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO comment (name, email, comment) VALUES ('$name', '$email', '$comment')";
if ($conn->query($sql) === TRUE) {
    // Gửi email thông báo cho admin
    if(isset($_POST['save'])){
        try { 
            $admin_mail = new PHPMailer(true);
            $admin_mail->isSMTP();
            $admin_mail->Host = 'smtp.gmail.com';
            $admin_mail->SMTPAuth = true;
            $admin_mail->Username = 'huu.tran24@Student.passerellesnumeriques.org'; 
            $admin_mail->Password = 'klheypgmpzrllbrk'; 
            $admin_mail->SMTPSecure = 'ssl';
            $admin_mail->Port = 465;
            $admin_mail->setFrom($_POST['email'], $_POST['name']); 
            $admin_mail->addAddress('huu.tran24@Student.passerellesnumeriques.org'); 
            $admin_mail->isHTML(true);
            $admin_mail->Subject = 'Comment about the car house';
            $admin_mail->Body = "A new comment has been posted on your website:<br><br>" ;
            $admin_mail->send(); 
            echo  "<script> 
            alert ('Thank you for your comment. Your feedback is important to us.');
            window.location.href = '../show.php';
            </script>";
            
            

          
        } catch (Exception $e) {
            echo "Error sending email: " . $e->getMessage();
        }
    } else {
        echo "Thank you for your comment. Your feedback is important to us.";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>