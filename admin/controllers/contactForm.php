<?php

$nameValue = "";
$lastNameValue = "";
$phoneValue = "";
$emailValue = "";
$messageValue =  "";
    
if(isset($_POST['btn-send-message-fo'])){
    
    $nameValue = $_POST['input-name-fo'];
    $lastNameValue = $_POST['input-lastName-fo'];
    $phoneValue = $_POST['input-phone-fo'];
    $emailValue = $_POST['input-email-fo'];
    $messageValue =  $_POST['input-message-fo'];
    $emailToSend = $_POST['userEmailToSend'];

    
    if(empty($nameValue) || empty($lastNameValue) || empty($phoneValue) || empty($emailValue)){
        echo "<script>alert('Ingrese todos sus datos');</script>";
    }else{
        
    $subject = "Técnicos servitec";
    
    $emailsSend = ["mariano260996@gmail.com",$emailToSend,"beto1perk@gmail.com","nat26arhe@gmail.com"];
    
    $to2 = "$emailsSend[0],$emailsSend[1],$emailsSend[2],$emailsSend[3]";
    
    echo $to2;

    $message = "
    <html>
    <head>
        <title>Email-Técnicos Servitec</title>
    </head>
    <body>
    <p>Este <strong>mensaje de consulta</strong> fue enviado desde su pagina web http://www.tecnicos.servitecperu.com/</p>
    <table style='margin:0!important'>
        <tr>
        <td style='margin:0!important;border:1px solid #444;background:#F9FF00;color:#000;padding:8px;'><b>Nombres y Apellidos:</b></td>
        <td style='margin:0!important;border:1px solid #444;padding:8px;'>".$nameValue." ".$lastNameValue."</td>
        </tr>
        <tr>
        <td style='margin:0!important;border:1px solid #444;background:#F9FF00;color:#000;padding:8px;'><b>Email:</b></td>
        <td style='margin:0!important;border:1px solid #444;padding:8px;'>".$emailValue."</td>
        </tr>
        <tr>
        <td style='margin:0!important;border:1px solid #444;background:#F9FF00;color:#000;padding:8px;'><b>Cell:</b></td>
        <td style='margin:0!important;border:1px solid #444;padding:8px;'>".$phoneValue."</td>
        </tr>
        <tr>
        <td style='margin:0!important;border:1px solid #444;background:#F9FF00;color:#000;padding:8px;'><b>Mensaje:</b></td>
        <td style='margin:0!important;border:1px solid #444;padding:8px;'>".$messageValue."</td>
        </tr>
    </table>
    </body>
    </html>
    ";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    mail($to,$subject,$message,$headers);  
        
    $nameValue = "";
    $lastNameValue = "";
    $phoneValue = "";
    $emailValue = "";
    $messageValue =  "";

    echo `<script>
                if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
            </script>`; 

    //header("location:../../briefcase.php");

    }
}
?>