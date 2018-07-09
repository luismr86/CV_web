<?php

    $emailTo = "luismr86@gmail.com";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: ".$_POST['rsEmail']."\r\n";

    if (!isset($_POST['rsSubject'])) {
        $subject = "Contact form message"; // Enter your subject here
    } else {
        $subject = $_POST['rsSubject'];
    }

    reset($_POST);

    $body = "";
    $body .= "<p><b>Nombre: </b>".$_POST['rsName']."</p>";
    $body .= "<p><b>Email: </b>".$_POST['rsEmail']."</p>";
    $body .= "<p><b>Asunto: </b>".$subject."</p>";
    $body .= "<p><b>Mensaje: </b>".$_POST['rsMessage']."</p>";

    if( mail($emailTo, $subject, $body, $headers) ){
        $mail_sent = true;
    } else {
        $mail_sent = false;
    }
    if(!isset($resp)){
        echo json_encode($mail_sent);
    }
?>
