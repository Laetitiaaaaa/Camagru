<?php
include($root . '/config/database.php');

function recoverFiles(){
    try{
        $conn = connexion();
        $sql = "SELECT *, `gallery`.`id` AS 'id_gall' FROM `gallery` INNER JOIN `user` WHERE `user`.`id` = `gallery`.`id_user` ORDER BY `gallery`.`id` DESC;";
        $req = $conn->query($sql);
        $conn = null;
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    catch(PDOException $err){
        return 'error';
    }
    // $conn = connexion();
    // $sql = "SELECT *, `gallery`.`id` AS 'id_gall' FROM `gallery` INNER JOIN `user` WHERE `user`.`id` = `gallery`.`id_user` ORDER BY `gallery`.`id` DESC;";
    // $req = $conn->query($sql);
    // $conn = null;
    // $data = $req->fetchAll(PDO::FETCH_ASSOC);
    // return $data;
}

function countPhoto(){
    try{
        $conn = connexion();
        $sql = "SELECT COUNT(*) AS 'count' FROM `gallery`";
        $req = $conn->query($sql);
        $conn = null;
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data[0]['count'];
    }
    catch(PDOException $err){
        return 'error';
    }
    // $conn = connexion();
    // $sql = "SELECT COUNT(*) AS 'count' FROM `gallery`";
    // $req = $conn->query($sql);
    // $conn = null;
    // $data = $req->fetchAll(PDO::FETCH_ASSOC);
    // return $data[0]['count'];
}

function limitPhoto($start, $limit){
    try{
        $conn = connexion();
        $sql = "SELECT *, `gallery`.`id` AS 'id_gall' FROM `gallery` INNER JOIN `user` WHERE `user`.`id` = `gallery`.`id_user` ORDER BY `gallery`.`id` DESC LIMIT {$start}, {$limit};";
        $req = $conn->query($sql);
        $conn = null;
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    catch(PDOException $err){
        return 'error';
    }
    // $conn = connexion();
    // $sql = "SELECT *, `gallery`.`id` AS 'id_gall' FROM `gallery` INNER JOIN `user` WHERE `user`.`id` = `gallery`.`id_user` ORDER BY `gallery`.`id` DESC LIMIT {$start}, {$limit};";
    // $req = $conn->query($sql);
    // $conn = null;
    // $data = $req->fetchAll(PDO::FETCH_ASSOC);
    // return $data;
}

?>