<?php
require('../models/photo.php');
session_start();

if (isset($_SESSION) && isset($_SESSION['logon']) && isset($_SESSION['login'])){
    if ($_SESSION['logon'] != ""){

        if (isset($_GET) && isset($_GET['log']) && isset($_GET['n'])){
            if ($_GET['log'] != "" && $_GET['n'] != ""){
                $id_user = getId($_GET['log']);
                $id_photo = $_GET['n'];
                $file_img = getPhoto($id_user['id'], $id_photo)['path'];
                $nbLike = countLike($id_user['id'], $id_photo);
                $comments = getComment($file_img);
            }
        }

        if (isset($_POST) && isset($_POST['namePhoto']) && isset($_POST['logUser']) && isset($_POST['idPhoto']) && (isset($_POST['like']) || isset($_POST['supp']) || (isset($_POST['com']) && isset($_POST['subcom']))))
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
            }
        }
        require('../views/photo.php');
    }
    else{
        require('../views/notLogon.php');
    }
}
else{
    require('../views/notLogon.php');
}
?>