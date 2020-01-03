<?php
include($root . '/config/database.php');

function matchLogNum($login, $num){
    try{
        $conn = connexion();
        $sql = "SELECT * FROM `user_sub` WHERE `login` = '{$login}' AND `num` = '{$num}'";
        $req = $conn->query($sql);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $conn = null;
        if ($data){
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

function suppUsersub($login){
    try{
        $conn = connexion();
        $sql = "DELETE FROM `user_sub` WHERE `login` = '{$login}'";
        $conn->query($sql);
        $conn = null;
        return true;
    }
    catch(PDOException $err){
        return 'error';
    }
}

function get_user($login){
    try{
        $conn = connexion();
        $sql = "SELECT * FROM `user_sub` WHERE `login` = '{$login}'";
        $req = $conn->query($sql);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data[0];
    }
    catch(PDOException $err){
        return 'error';
    }
}

function addUser($login){
    try{
        $conn = connexion();
        $user = get_user($login);
        if (suppUsersub($login) === 'error' || $user === 'error'){
            return 'error';
        }
        $sql = "INSERT INTO `user` (`login`, `mail`, `password`) VALUES ('{$user['login']}', '{$user['mail']}', '{$user['password']}');";
        $conn->query($sql);
        return true;        
    }
    catch(PDOException $err){
        return 'error';
    }
}

?>