<?php
include('../config/database.php');

function recoverFiles(){
    $conn = connexion();
    $sql = "SELECT *, `gallery`.`id` AS 'id_gall' FROM `gallery` INNER JOIN `user` WHERE `user`.`id` = `gallery`.`id_user` ORDER BY `gallery`.`id` DESC;";
    $req = $conn->query($sql);
    $conn = null;
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}


?>