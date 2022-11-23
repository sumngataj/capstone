<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    include('config.php');

    $id = $_GET['updateid'];
    $sql_approve_status = ("Update appointment set user_approval_status = 'approved'  where user_appointment_id = '$id'");
    mysqli_query($link,$sql_approve_status)or die(mysqli_error());
    $sql_select = mysqli_query($link, "Select user_email, user_docu_type, user_approval_status from appointment where user_appointment_id = '$id' ");
    for($a = 0; $a < $num_rows = mysqli_fetch_array($sql_select); $a++)
    {
    $app_name = $num_rows['name'];    
    $app_email = $num_rows['user_email'];
    $app_docu_type = $num_rows['user_docu_type'];
    $app_status = $num_rows['user_approval_status'];
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = 'ajbeyyy@gmail.com';
    $mail->Password = 'cutlauvfirfvyerr';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    
    $mail->setFrom('ajbeyyy@gmail.com');
    $mail->addAddress($app_email);

    $mail->isHtml(true);

    $mail->Subject = $app_docu_type;
    $mail->Body = "Hello, $app_name! Your application for a request is now $app_status.";

    $mail->send();

     
    }    

    $message = "Updated Successfully";
    echo "<script type='text/javascript'>alert('$message');
    window.location.assign('index.php')</script>";

?>