<?php
require($root . '/models/forgot-pass.php');

if ($method == 'GET'){
    require($root . '/views/forgot-pass.php');
}

else if ($method == 'POST'){
    if (!empty($_POST['mail'])){
        $mail = htmlspecialchars($_POST['mail']);
        $change = sendPass($mail);

        if ($change === true){
            $_SESSION['messInfo'] = 'Mail has been successfully sent!';
        }
        else if ($change === false){
            $_SESSION['messInfo'] = "Mail can't be sent.";
        }
        else if ($change === 'error mail'){
            $_SESSION['messInfo'] = 'Mail already exists.';
        }
        else{
            $_SESSION['messInfo'] = 'Error.';
        }
    }
    header('Location: ' . $fullDomain . '/forgot-pass');
}

else{
    echo '404 Error';
}

?>