<?php
$name   = $_POST["name"];
$mbl    = $_POST["mobile"];
$email  = $_POST["email"];
$msg    = $_POST["message"];

$to             = "mohit21lalotra@gmail.com"; 
$email_subject  = "New Form Submission";
$email_body     = "User Name: $name\n".
                  "User Mobile: $mbl\n".
                  "User Email: $email\n".
                  "User Message: $msg";

$headers = "From: $email";

if (mail($to, $email_subject, $email_body, $headers)) {
    echo "<script>
            alert('Email sent successfully!');
            window.location.href='homepage.php';
          </script>";
    exit;
} else {
    echo "<script>
            alert('Failed to send email.');
            window.location.href='homepage.php';
          </script>";
}
?>
