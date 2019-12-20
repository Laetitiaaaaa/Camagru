<?php

$_SESSION['mail'] = null;
$_SESSION['login'] = null;
$_SESSION['logon'] = null;
$_SESSION['messInfo'] = 'You signed out successfully!';
header('Location: ' . $fullDomain . '/sign-in');

?>