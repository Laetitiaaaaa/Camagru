<?php
include('../config/database.php');

function getPhoto($id_user, $id_photo){
    $conn = connexion();
    $sql = "SELECT `path` FROM `gallery` WHERE `id_user` = '{$id_user}' AND `id` = '{$id_photo}'";
    $req = $conn->query($sql);
    $conn = null;
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data[0];
}

function getLogin($id){
    $conn = connexion();
    $sql = "SELECT `login` FROM `user` WHERE `id` = '{$id}';";
    $req = $conn->query($sql);
    $conn = null;
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data[0];
}

function getId($login){
    $conn = connexion();
    $sql = "SELECT `id` FROM `user` WHERE `login` = '{$login}'";
    $req = $conn->query($sql);
    $conn = null;
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data[0];
}

function countLike($id_user, $id_photo){
    $conn = connexion();
    $sql = "SELECT `nb_like` FROM `gallery` WHERE `id_user` = '{$id_user}' AND `id` = '{$id_photo}'";
    $req = $conn->query($sql);
    $conn = null;
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data[0];
}

function likePhoto($namePhoto){
    $conn = connexion();
    $sql = "UPDATE `gallery` SET `nb_like` = `nb_like` + 1 WHERE `path` = '{$namePhoto}';";
    $conn->query($sql);
    $conn = null;
}

function addDbCom($logUser, $comment, $filename){
    $conn = connexion();
    $idUser = getId($logUser);
    $sql = "INSERT INTO `com` (`id_user`, `comment`, `picname`) VALUES ('{$idUser['id']}', '{$comment}', '{$filename}');";
    $conn->query($sql);
    $conn = null;
}

function getComment($filename){
    $conn = connexion();
    $sql = "SELECT * FROM `com` WHERE `picname` = '{$filename}';";
    $req = $conn->query($sql);
    $conn = null;
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function suppPhoto($name){
    $conn = connexion();
    $sql = "DELETE FROM `gallery` WHERE `path` = '{$name}';";
    $sql .= "DELETE FROM `com` WHERE `picname` = '{$name}';";
    $conn->query($sql);
    $conn = null;
}

?>