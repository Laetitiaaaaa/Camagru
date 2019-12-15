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
            }
        }

        if (isset($_POST) && isset($_POST['namePhoto']) && (isset($_POST['like']) || (isset($_POST['com']) && isset($_POST['subcom']))))
        {
            if ($_POST['namePhoto'] != ""){
                $file_img = $_POST['namePhoto'];
                var_dump($file_img);
                if ($_POST['like'] != ""){
                    likePhoto($file_img);
                }
                else if ($_POST['com'] != "" && $_POST['subcom']!= ""){

                }
            }
        }
    }
}


require('../views/photo.php');
?>