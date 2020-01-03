<?php
require($root . '/models/signIn.php');

if ($method == 'GET'){
    require($root . '/views/signIn.php');
}

else if ($method == 'POST'){
    if (!empty($_POST['login']) && !empty($_POST['password'])){
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);

        if (match($login, $password) === true){
            $_SESSION['login'] = $login;
            $_SESSION['mail'] = recoverMail($login);
            $_SESSION['logon'] = 1;
            $_SESSION['messInfo'] = 'You signed in successfully!';
            header('Location: ' . $fullDomain . '/mounting');
            exit;
        }
        else{
            if (match($login, $password) === 'error'){
                $_SESSION['messInfo'] = 'Error.';
            }
            else{
                $_SESSION['messInfo'] = 'Try again.';
            }
        }
    }
    header('Location: '. $fullDomain . '/sign-in');
    exit;
}

else{
    echo '404 Error';
}

?>