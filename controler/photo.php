<?php
require($root . '/models/photo.php');

if (isset($_SESSION) && isset($_SESSION['logon']) && isset($_SESSION['login'])){
    if ($_SESSION['logon'] != ""){

        if ($method == 'GET'){
            if ($_GET['log'] != "" && $_GET['n'] != ""){
                $id_user = getId($_GET['log']);
                $id_photo = $_GET['n'];
                $file_img = getPhoto($id_user['id'], $id_photo)['path'];
                $nbLike = countLike($id_user['id'], $id_photo);
                $comments = getComment($file_img);
                require($root . '/views/photo.php');
            }
        }

        if ($method == 'POST')
        {
            if ($_POST['namePhoto'] != "" && $_POST['logUser'] != "" && $_POST['idPhoto'] != ""){
                $file_img = $_POST['namePhoto'];
                $idUser = getId($_POST['logUser']);
                $idPhoto = $_POST['idPhoto'];
                if ($_POST['like'] != ""){
                    likePhoto($file_img);
                    $nbLike = countLike($idUser['id'], $idPhoto);
                }
                else if ($_POST['com'] != "" && $_POST['subcom']!= ""){
                    $logUser = $_SESSION['login'];
                    $comment = $_POST['com'];
                    addDbCom($logUser, $comment, $file_img);
                    sendCom($logUser);
                    $comments = getComment($file_img);
                }
                else if ($_POST['supp'] != ""){
                    suppPhoto($file_img);
                }
                header('Location: ' . $fullDomain . '/photo?log=' . $_POST['logUser'] . '&n=' . $idPhoto);
            }
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