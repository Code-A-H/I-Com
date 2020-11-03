<?php

global $host,$user,$pass,$database;

$host='pdb49.awardspace.net';

$user="3359174_icom";
$pass="psplus10";
$database="3359174_icom";

@$link=mysqli_connect($host,$user,$pass) or die ("Conexion Mala");
mysqli_select_db($link,$database) or die ("error");

?>
