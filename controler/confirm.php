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
        header('Location: ' . $fullDomain . '/wrongpath');
    }
} 

?>