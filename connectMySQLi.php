<?php
$connDB = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$connDB->set_charset("utf8");

if($connDB->connect_errno){
    die("Connection failed : ".$connDB->connect_errno);
}

?>
