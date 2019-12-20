<?php
require($root . '/models/forgot-pass.php');

if ($method == 'GET'){
    require($root . '/views/forgot-pass.php');
}

if ($method == 'POST'){
    if (!empty($_POST['mail'])){
        $mail = $_POST['mail'];
        $change = sendPass($mail);
        if ($change == true){
            $_SESSION['messInfo'] = 'Mail has been successfully sent!';
        }
        else{
            $_SESSION['messInfo'] = "Mail can't be sent.";
        }
    }
    header('Location: ' . $fullDomain . '/forgot-pass');
}

?>