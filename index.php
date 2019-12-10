<?php
require('sign_up.php');
include('config/database.php');
$conn = connexion();
var_dump($_POST);
if (isset($_POST) && isset($_POST['login']) && isset($_POST['mail']) && isset($_POST['password'])){
    if ($_POST['login'] != "" && $_POST['mail'] != "" && $_POST['password'] != ""){
        $sql = "INSERT INTO `user`(`login`, `mail`, `password`) VALUES ('{$_POST['login']}', '{$_POST['mail']}', '{$_POST['password']}')";
        $conn->query($sql);
        $conn = null;
    }
}
?>