<?php
require('../models/changePass.php');
session_start();

if (isset($_GET) && isset($_GET['log']) && isset($_GET['n'])){
    if ($_GET['log'] != "" && $_GET['n'] != ""){
        $matchLN = matchLogNum($_GET['log'], $_GET['n']);
        if ($matchLN == true){
            $login = $_GET['log'];
            $_SESSION['log'] = $login;
            $num = $_GET['n'];
            require('../views/changePass.php');           
        }
        else{
            var_dump("login and num don't match.");
        }
    }
}

if (isset($_POST) && isset($_POST['password']) && isset($_POST['verif']) && isset($_SESSION) && isset($_SESSION['log'])){
    if ($_POST['password'] != "" && $_POST['verif'] != "" && $_SESSION['log'] != ""){
        $password = $_POST['password'];
        $verif = $_POST['verif'];
        $login = $_SESSION['log'];
        $matchPV = matchPassVerif($password, $verif);
        if ($matchPV == true){
            if (checkPasswd($password) == true){
                changePass($login, $password);
                require('../views/changeOk.php');
            }
            else{
                var_dump("Password not well formated.");
                require('../views/changePass.php');
            }
        }
        else{
            var_dump("password and verif are differents.");
        }
    }
}
?>