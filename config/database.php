<?php

function connexion(){
$servername = "localhost";
$username = "root";
$password = "rootroot";

    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE camagru; USE camagru;";
        //use exec() because no results are returned
        $conn->exec($sql);
        echo "Database created successfully<br>";
        return ($conn);
    }
    catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }
}

function create_tables($conn){
    $sql = "CREATE TABLE IF NOT EXISTS `user` (`id` int(11) NOT NULL AUTO_INCREMENT, `login` text NOT NULL, `mail` text NOT NULL, PRIMARY KEY (`id`));";
    $conn->query($sql);
}

?>