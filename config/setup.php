<?php

include("database.php");

$conn = connexion();
create_tables($conn);

$conn = null;

?>