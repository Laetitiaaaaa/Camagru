<?php
require($root . '/models/photo.php');

if ($method == 'GET'){
    if (!empty($_GET['log']) && !empty($_GET['n'])){
        $id_user = getId(htmlspecialchars($_GET['log']));
        $id_photo = htmlspecialchars($_GET['n']);
        $photo = photoExists($id_user['id'], $id_photo);

        if ($photo === false || $photo === 'error' || $id_user === 'error'){
            $_SESSION['messInfo'] = 'Wrong path.';
            header('Location: ' . $fullDomain . '/gallery');
            exit;
        }

        $file_img = getPhoto($id_user['id'], $id_photo)['path'];
        $nbLike = countLike($id_user['id'], $id_photo);
        $comments = getComment($file_img);
        if ($file_img === 'error' ||  $nbLike === 'error' || $comments === 'error'){
            $_SESSION['messInfo'] = 'Error.';
        }
        require($root . '/views/photo.php');
    }
}

else if ($method == 'POST')
{
    if (!empty($_POST['namePhoto']) && !empty($_POST['logUser']) && !empty($_POST['idPhoto'])){
        $file_img = htmlspecialchars($_POST['namePhoto']);
        $idUser = getId(htmlspecialchars($_POST['logUser']));
        $idPhoto = htmlspecialchars($_POST['idPhoto']);

        if (!empty($_POST['like'])){
            $like = likePhoto($file_img);
            $nbLike = countLike($idUser['id'], $idPhoto);
            if ($like === 'error' || $nbLike === 'error'){
                $_SESSION['messInfo'] = 'Error.';
            }
        }
        else if (!empty($_POST['com']) && !empty($_POST['subcom'])){
            $logUser = $_SESSION['login'];
            $comment = htmlspecialchars($_POST['com']);
            
            addDbCom($logUser, $comment, $file_img);
            if ($addDbCom === 'error'){
                $_SESSION['messInfo'] = 'Can\'t save comment.';
            }

            if (empty($_SESSION['pref']) || $_SESSION['pref'] == 'yes'){
                if (sendCom($logUser) === 'error'){
                    $_SESSION['messInfo'] = 'Error.';
                }
            }
            
            $comments = getComment($file_img);
            if ($comments === 'error'){
                $_SESSION['messInfo'] = 'Can\'t get picture\'s comments.';
            }
        }
        else if (!empty($_POST['supp'])){
            $supp = suppPhoto($file_img);
            if ($supp === 'error'){
                $_SESSION['messInfo'] = 'Error.';
            }
            else if($supp === true){
                $_SESSION['messInfo'] = 'Picture deleted.';
                header('Location: ' . $fullDomain . '/gallery');
                exit;
            }
        }
        header('Location: ' . $fullDomain . '/photo?log=' . $_POST['logUser'] . '&n=' . $idPhoto);
    }
}

else{
    echo '404 Error';
}
?>