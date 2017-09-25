<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
date_default_timezone_set("America/Santiago");
$dbhost="localhost";
$dbname="mydb";
$dbuser="root";
$dbpass="";
$tabla="tcalendario";


//$db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

$db= mysqli_connect("localhost","root","","mydb");


if ($db->connect_errno) {
	die ("<h1>Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error."</h1>");
}
?>
