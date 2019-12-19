<?php

$_SESSION['mail'] = null;
$_SESSION['login'] = null;
$_SESSION['logon'] = null;

header('Location: ' . $fullDomain . '/sign-in');

?>