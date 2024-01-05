<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$con = mysqli_connect("localhost", "root", "", "yourdb");

if ($con === false) {
    die("ERROR!!!!!!!!" . mysqli_connect_error());
} else
    echo "Connectedd!!";

    $name = $_REQUEST["name"];
    $phone = $_REQUEST["phone"];
    $email = $_REQUEST["email"];

$sql = "INSERT INTO gym VALUES ('$name', '$phone', '$email')";


if (mysqli_query($con, $sql)) {
    echo "Data inserted successfully!";

    // Send email using PHPMailer
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.elasticemail.com';  // Your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tejaram20199@gmail.com'; // Your SMTP username
        $mail->Password   =  '31579C2A204564D920B976A5C243C919101A'; // Your SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $mail->Port       = 2525; // TCP port to connect to

        //Recipients
        $mail->setFrom('tejaram20199@gmail.com', 'Your Name');
        $mail->addAddress('tejaramgurjar74@gmail.com', 'Receiver Name');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New User Registration';
        $mail->Body    = "Name: $name<br>Phone: $phone<br>Email: $email";

        $mail->send();
        echo 'Email sent successfully';
    } catch (Exception $e) {
        echo "Email not sent. Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>
