<?php
require('../models/confirm.php');

if (isset($_GET) && isset($_GET['log']) && isset($_GET['n'])){
    $log = $_GET['log'];
    $n = $_GET['n'];
    $match = matchLogNum($log, $n);
    if ($match == true){
        addUser($log);
        require('../views/confirm.php');
    }
} 

?>