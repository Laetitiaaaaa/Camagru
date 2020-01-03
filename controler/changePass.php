<?php
require($root . '/models/changePass.php');

if ($method == 'GET'){
    if (!empty($_GET['log']) && !empty($_GET['n'])){
        $matchLN = matchLogNum($_GET['log'], $_GET['n']);
        if ($matchLN === true){
            $login = $_GET['log'];
            $num = $_GET['n'];
           
            require($root . '/views/changePass.php');           
        }
        else{
            header('Location: ' . $fullDomain . '/wrongPath');
            exit;
        }
    }
}

else if ($method = 'POST'){
    if (!empty($_POST['password']) && !empty($_POST['verif']) && !empty($_POST['log']) && !empty($_POST['n'])){
        $password = $_POST['password'];
        $verif = $_POST['verif'];
        $login = $_POST['log'];
        $n = $_POST['n'];
        
        $matchPV = matchPassVerif($password, $verif);
        if ($matchPV == true){
            if (checkPasswd($password) == true){
                $check = changePass($login, $password);
                if ($check === true){
                    $_SESSION['messInfo'] = 'Your password has been successfully changed! You can now <a href="http://localhost:8080/sign-in">sign in</a>.';
                }
                else{
                    $_SESSION['messInfo'] = 'Error.';
                }
            }
            else{
                $_SESSION['messInfo'] = 'Password not well formated; Password need at least 8 characters, one lowercase and one uppercase.';

            }
        }
        else{
            $_SESSION['messInfo'] = 'Please right the same password twice.';
        }
        header('Location: ' . $fullDomain . '/change-pass?log=' . $login . '&n=' . $n);
        exit;
    }
}

else{
    echo '404 Error';
}
?>