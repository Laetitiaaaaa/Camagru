<?php
require('../models/signIn.php');
session_start();

if (isset($_POST) && isset($_POST['login']) && isset($_POST['password'])){
    $siOk = 0;
    if ($_POST['login'] != "" && $_POST['password'] != ""){
        $login = $_POST['login'];
        $password = $_POST['password'];
        if (match($login, $password) == true){
            $_SESSION['login'] = $login;
            $_SESSION['mail'] = recoverMail($login);
            $_SESSION['logon'] = 1;
            echo "Connection succeed!</br>";
            $siOk = 1;
        }
        else{
            echo "Connection failed</br>";
        }
    }
}

if ($siOk == 0){
    require('../views/signIn.php');
}
else{
    header('Location: http://localhost:8080/controler/home.php');   
}

?>