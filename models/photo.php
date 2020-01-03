<?php
include($root . '/config/database.php');

function getPhoto($id_user, $id_photo){
    try{
        $conn = connexion();
        $sql = "SELECT `path` FROM `gallery` WHERE `id_user` = '{$id_user}' AND `id` = '{$id_photo}'";
        $req = $conn->query($sql);
        $conn = null;
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data[0];
    }
    catch(PDOException $err){
        return 'error';
    }
}

function getLogin($id){
    try{
        $conn = connexion();
        $sql = "SELECT `login` FROM `user` WHERE `id` = '{$id}';";
        $req = $conn->query($sql);
        $conn = null;
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data[0];
    }
    catch(PDOException $err){
        return 'error';
    }
}

function getId($login){
    try{
        $conn = connexion();
        $sql = "SELECT `id` FROM `user` WHERE `login` = '{$login}'";
        $req = $conn->query($sql);
        $conn = null;
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data[0];
    }
    catch(PDOException $err){
        return 'error';
    }
}

function getMail($login){
    try{
        $conn = connexion();
        $sql = "SELECT `mail` FROM `user` WHERE `login` = '{$login}';";
        $req = $conn->query($sql);
        $conn = null;
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data[0]['mail'];
    }
    catch(PDOException $err){
        return 'error';
    }
}

function countLike($id_user, $id_photo){
    try{
        $conn = connexion();
        $sql = "SELECT `nb_like` FROM `gallery` WHERE `id_user` = '{$id_user}' AND `id` = '{$id_photo}'";
        $req = $conn->query($sql);
        $conn = null;
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data[0];
    }
    catch(PDOException $err){
        return 'error';
    }
}

function likePhoto($namePhoto){
    try{
        $conn = connexion();
        $sql = "UPDATE `gallery` SET `nb_like` = `nb_like` + 1 WHERE `path` = '{$namePhoto}';";
        $conn->query($sql);
        $conn = null;
        return true;
    }
    catch(PDOException $err){
        return 'error';
    }
}

function addDbCom($logUser, $comment, $filename){
    try{
        $conn = connexion();
        $idUser = getId($logUser);
        $sql = "INSERT INTO `com` (`id_user`, `comment`, `picname`) VALUES ('{$idUser['id']}', '{$comment}', '{$filename}');";
        $conn->query($sql);
        $conn = null;
        return true;
    }
    catch(PDOException $err){
        return 'error';
    }
}

function getComment($filename){
    try{
        $conn = connexion();
        $sql = "SELECT * FROM `com` WHERE `picname` = '{$filename}';";
        $req = $conn->query($sql);
        $conn = null;
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    catch(PDOException $err){
        return 'error';
    }
}

function suppPhoto($name){
    try{
        $conn = connexion();
        $sql = "DELETE FROM `gallery` WHERE `path` = '{$name}';";
        $sql .= "DELETE FROM `com` WHERE `picname` = '{$name}';";
        $conn->query($sql);
        $conn = null;
        return true;
    }
    catch(PDOException $err){
        return 'error';
    }
}

function sendCom($login){
    $mail = getMail($login);
    if ($mail === 'error'){
        return 'error';
    }
    $subject = "Picture's comment";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Camagru Team <no_reply@camagru.com>"."\r\n";
    $message = "
    <h1>Hello $login!</h1>
    <p>Someone comments one of your pictures, <a href='http://localhost:8080/sign-in'>log on</a> to see it :)</p>
    ";
    $com = mail($mail, $subject, $message, $headers);
    return $com;
}

function photoExists($idUser, $idPhoto){
    try{
        $conn = connexion();
        $sql = "SELECT COUNT(*) AS 'count' FROM `gallery` WHERE `id_user` = '{$idUser}' AND `id` = '{$idPhoto}';";
        $req = $conn->query($sql);
        $conn = null;
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        if ($data[0]['count'] > 0){
            return true;
        }
        else{
            return false;
        }
    }
    catch(PDOException $err){
        return 'error';
    }
}

?>