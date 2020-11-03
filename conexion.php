<?php

//NO BORRAR !!!!!!!!!

/*global $host,$user,$pass,$database;

$host='pdb49.awardspace.net';

$user="3359174_icom";
$pass="psplus10";
$database="3359174_icom";

 $conexion= mysqli_connect($host,$user,$pass,$database);
  
 if (!$conexion){
   echo "conexion no ok";
 }*/

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "i-com";

$conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$conexion)
{
    die("No hay conexion:" .mysqli_connect_error());
}

?>
