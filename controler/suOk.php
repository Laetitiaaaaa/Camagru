<?php
require('../models/suOk.php');
session_start();

$mail = $_SESSION['mail'];
$login = $_SESSION['login'];
sendConf($mail, $login);

require('../views/suOk.php');
?>