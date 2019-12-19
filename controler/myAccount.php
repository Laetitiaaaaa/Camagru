<?php 
require($root . '/models/myAccount.php');

if (isset($_SESSION) && isset($_SESSION['login']) && isset($_SESSION['logon'])){
    if($_SESSION['logon'] == 1){
        if ($method == 'GET'){
            require($root . '/views/myAccount.php');
        }

        if ($method == 'POST'){
            if (!empty($_POST['login']) && !empty($_POST['changeLog'])){
                $login = $_POST['login'];
                changeLog($_SESSION['login'], $login);
                $_SESSION['login'] = $login;
            }
            else if (!empty($_POST['mail']) && !empty($_POST['changeMail'])){
                $mail = $_POST['mail'];
                changeMail($_SESSION['login'], $mail);
                $_SESSION['mail'] = $mail;
            }
            else if (!empty($_POST['password']) && !empty($_POST['verif']) && !empty($_POST['changePass'])){
                $newPass = $_POST['password'];
                $verif = $_POST['verif'];
                changePass($_SESSION['login'], $newPass, $verif);
            }
            header('Location: ' . $fullDomain . '/my-account');
            exit;
        }
    }
    else{
        require($root . '/views/notLogon.php');
    }
}
else{
    require($root . '/views/notLogon.php');
}

?>