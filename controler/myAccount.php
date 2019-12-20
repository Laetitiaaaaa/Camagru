<?php 
require($root . '/models/myAccount.php');

if ($method == 'GET'){
    require($root . '/views/myAccount.php');
}

if ($method == 'POST'){
    if (!empty($_POST['login']) && !empty($_POST['changeLog'])){
        $login = $_POST['login'];
        changeLog($_SESSION['login'], $login);
        $_SESSION['login'] = $login;
        $_SESSION['messInfo'] = 'Your loggin has been successfully changed.';
    }
    else if (!empty($_POST['mail']) && !empty($_POST['changeMail'])){
        $mail = $_POST['mail'];
        changeMail($_SESSION['login'], $mail);
        $_SESSION['mail'] = $mail;
        $_SESSION['messInfo'] = 'Your mail address has been successfully changed.';
    }
    else if (!empty($_POST['password']) && !empty($_POST['verif']) && !empty($_POST['changePass'])){
        $newPass = $_POST['password'];
        $verif = $_POST['verif'];
        changePass($_SESSION['login'], $newPass, $verif);
        $_SESSION['messInfo'] = 'Your password has been successfully changed.';
    }
    else if (!empty($_POST['preference']) && !empty($_POST['pref'])){
        $_SESSION['pref'] = $_POST['preference'];
        $_SESSION['messInfo'] = 'Your preference has been successfully changed.';
    }
    header('Location: ' . $fullDomain . '/my-account');
    exit;
}

?>