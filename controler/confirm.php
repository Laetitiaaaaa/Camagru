<?php
require($root . '/models/confirm.php');

if ($method == 'GET'){
    $log = $_GET['log'];
    $n = $_GET['n'];
    $match = matchLogNum($log, $n);
    if ($match == true){
        addUser($log);
        require($root . '/views/confirm.php');
    }
    else{
        $_SESSION['messInfo'] = 'Wrong path';
        if ($_SESSION['logon'] == 1){
            header('Location: ' . $fullDomain . '/gallery');
            exit;
        }
        else{
            header('Location: ' . $fullDomain . '/sign-in');
            exit;
        }
    }
} 

?>