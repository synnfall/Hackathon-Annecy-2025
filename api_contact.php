<?php
$to = "contact@hackathon.cmi-info.fr";
$subject = htmlspecialchars($_POST['subject']);
$message = htmlspecialchars($_POST['message']);

mail($to, $subject, $message);
?>