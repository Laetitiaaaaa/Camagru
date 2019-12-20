<?php
require($root . '/models/photo.php');

if ($method == 'GET'){
    if (!empty($_GET['log']) && !empty($_GET['n'])){
        $id_user = getId($_GET['log']);
        $id_photo = $_GET['n'];
        $photo = photoExists($id_user['id'], $id_photo);

        if ($photo == false){
            $_SESSION['messInfo'] = 'Wrong path.';
            header('Location: ' . $fullDomain . '/gallery');
            exit;
        }

        $file_img = getPhoto($id_user['id'], $id_photo)['path'];
        $nbLike = countLike($id_user['id'], $id_photo);
        $comments = getComment($file_img);
        require($root . '/views/photo.php');
    }
}

if ($method == 'POST')
{
    if (!empty($_POST['namePhoto']) && !empty($_POST['logUser']) && !empty($_POST['idPhoto'])){
        $file_img = $_POST['namePhoto'];
        $idUser = getId($_POST['logUser']);
        $idPhoto = $_POST['idPhoto'];

        if (!empty($_POST['like'])){
            likePhoto($file_img);
            $nbLike = countLike($idUser['id'], $idPhoto);
        }
        else if (!empty($_POST['com']) && !empty($_POST['subcom'])){
            $logUser = $_SESSION['login'];
            $comment = $_POST['com'];
            
            addDbCom($logUser, $comment, $file_img);

            if (empty($_SESSION['pref']) || $_SESSION['pref'] == 'yes'){
                $comSent = sendCom($logUser);
                if ($comSent == true){
                    $_SESSION['messInfo'] = 'Mail sent';
                }
                else{
                    $_SESSION['messInfo'] = 'Mail can\'t be sent.';
                }
            }
            
            $comments = getComment($file_img);
        }
        else if (!empty($_POST['supp'])){
            suppPhoto($file_img);
        }
        header('Location: ' . $fullDomain . '/photo?log=' . $_POST['logUser'] . '&n=' . $idPhoto);
    }
}

?>