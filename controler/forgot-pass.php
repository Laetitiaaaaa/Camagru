<?php
require('../models/forgot-pass.php');

if (isset($_POST) && isset($_POST['mail'])){
    if ($_POST['mail'] != ""){
        $mail = $_POST['mail'];
        sendPass($mail);
    }
}

require('../views/forgot-pass.php');
?>