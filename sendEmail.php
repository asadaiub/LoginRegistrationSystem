<?php



if(isset($_POST['submit'])){


    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['mail'];
    $message = $_POST['message'];



    $mailTo = "asad@techplato.com";
    $headers = "From: ".$mailFrom;
    $txt = "You have  received an email fomr ".$name." .\n\n".$message;



    mail($mailTo, $subject, $txt, $headers);
    header("Location: contact.php?mailsend");


}