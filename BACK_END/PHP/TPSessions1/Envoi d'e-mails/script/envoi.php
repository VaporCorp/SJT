<?php

$headers = 'From: louisadressedev@gmail.com' . "\r\n" .
    'Reply-To: louisadressedev@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$erreur = FALSE;

if(isset($_POST['mailto']) && (trim($_POST['mailto']))) {
    $mailto = $_POST['mailto'];
}
else {
    $erreur .= "Le champs destinataire est vide <br>";
}

if(isset($_POST['subject']) && (trim($_POST['subject']))) {
    $subject = $_POST['subject'];
}
else {
    $erreur .= "Le champs sujet est vide <br>";
}

if(isset($_POST['message']) && (trim($_POST['message']))) {
    $message = $_POST['message'];
}
else {
    $erreur .= "Le champs message est vide <br>";
}

if (!$erreur) {
    mail($mailto, $subject, $message, $headers);
}
else {
    echo $erreur;
}