<?php 
    $file = file_get_contents("config/config.json") or die("FILE_CONFIG_NOT_FOUND");
    $_CONFIG = json_decode($file, true);
?>