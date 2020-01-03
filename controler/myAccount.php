<?php 
require($root . '/models/myAccount.php');

if ($method == 'GET'){
    require($root . '/views/myAccount.php');
}

else if ($method == 'POST'){
    if (!empty($_POST['login']) && !empty($_POST['changeLog'])){
        $login = $_POST['login'];
        $check = changeLog($_SESSION['login'], $login);

        if ($check === true){
            $_SESSION['login'] = $login;
            $_SESSION['messInfo'] = 'Your loggin has been successfully changed.';
        }
        else if($check === false){
            $_SESSION['messInfo'] = 'Login already exists.';
        }
        else{
            $_SESSION['messInfo'] = 'Error.';
        }
    }
    else if (!empty($_POST['mail']) && !empty($_POST['changeMail'])){
        $mail = $_POST['mail'];
        $check = changeMail($_SESSION['login'], $mail);

        if ($check === true){
            $_SESSION['mail'] = $mail;
            $_SESSION['messInfo'] = 'Your mail address has been successfully changed.';
        }
        else if ($check === false){
            $_SESSION['messInfo'] = 'Mail already exists.';
        }
        else{
            $_SESSION['messInfo'] = 'Error.';
        }
    }
    else if (!empty($_POST['password']) && !empty($_POST['verif']) && !empty($_POST['changePass'])){
        $newPass = $_POST['password'];
        $verif = $_POST['verif'];
        $check = changePass($_SESSION['login'], $newPass, $verif);

        if($check === true){
            $_SESSION['messInfo'] = 'Your password has been successfully changed.';
        }
        else if ($check === 'verif wrong'){
            $_SESSION['messInfo'] = 'You must write the same password twice.';
        }
        else if ($check === 'pass wrong'){
            $_SESSION['messInfo'] = 'Password not well formated; Password need at least 8 characters, one lowercase and one uppercase.';
        }
        else{
            $_SESSION['messInfo'] = 'Error.';
        }
    }
    else if (!empty($_POST['preference']) && !empty($_POST['pref'])){
        $_SESSION['pref'] = $_POST['preference'];
        $_SESSION['messInfo'] = 'Your preference has been successfully changed.';
    }
    header('Location: ' . $fullDomain . '/my-account');
    exit;
}

else{
    echo '404 Error';
}

?>