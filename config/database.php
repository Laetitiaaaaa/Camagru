<?php
function connexion(){
    $DB_DSN = "localhost";
    $DB_USER = "root";
    $DB_PASSWORD = "rootroot";
    try {
    $conn = new PDO("mysql:host=$DB_DSN", $DB_USER, $DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS db_camagru; USE db_camagru;";
    $conn->exec($sql);
    echo "Connection successful<br>";
    return ($conn);
    }
    catch(PDOException $e){
        echo "Connection failed<br>" . $e->getMessage();
    }
}

function create_tables($conn){
    $sql = "CREATE TABLE IF NOT EXISTS `user_sub` (`id` int(11) NOT NULL AUTO_INCREMENT, `login` text NOT NULL, `mail` text NOT NULL, `password` text NOT NULL, PRIMARY KEY (`id`), `num` int(11) NOT NULL);";
    $sql .= "CREATE TABLE IF NOT EXISTS `user` (`id` int(11) NOT NULL AUTO_INCREMENT, `login` text NOT NULL, `mail` text NOT NULL, `password` text NOT NULL, PRIMARY KEY (`id`), `num` int(11) NOT NULL);";
    $sql .= "CREATE TABLE IF NOT EXISTS `gallery` (`id` int(11) NOT NULL AUTO_INCREMENT, `id_user` int(11) NOT NULL, `path` text NOT NULL, PRIMARY KEY (`id`));";
    $conn->query($sql);
}

?>