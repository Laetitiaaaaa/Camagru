<?php
session_start();

$_SESSION['login'] = null;
$_SESSION['logon'] = null;

header('Location: http://localhost:8080/controler/signIn.php');

?>