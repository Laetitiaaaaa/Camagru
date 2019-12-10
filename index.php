<?php
require('models/sign_up.php');

if (isset($_POST) && isset($_POST['login']) && isset($_POST['mail']) && isset($_POST['password'])){
    insert_user($_POST['login'], $_POST['mail'], $_POST['password']);
}

require('vues/sign_up.php');
?>