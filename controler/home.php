<?php
require('../models/home.php');
session_start();

if (isset($_SESSION) && isset($_SESSION['logon'])){
    if ($_SESSION['logon'] == 1){
        require('../views/home.php');
    }
    else{
        require('../views/notLogon.php');
    }
}
else{
    require('../views/notLogon.php');    
}

?>