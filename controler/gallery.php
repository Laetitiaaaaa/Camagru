<?php
require('../models/gallery.php');
session_start();

$photo_tab = recoverFiles();

require('../views/gallery.php');
?>