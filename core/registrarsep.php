<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//echo '{ "message": "' . $_POST['nombre'] . '" }';
require_once '../classes/UserSessions.php';

//Crea el objeto de Inserción



$rut = "";
$correo = "";
$password = "";
$nombre = "";
$apellido = "";
$direcc = "";
$ciu = "";
$pais = "";
$tc = "";
$fv = "";
$val = "";


//Recupera Objetos

function RecuperaFormaRegistro(){

$rut = $_POST['rut'];
$correo = $_POST['email'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direcc = $_POST['direccion'];
$ciu = $_POST['ciudad'];
$pais = $_POST['pais'];
$tc = $_POST['tcredito'];
$fv = $_POST['fvenc'];
$val = $_POST['vali'];


//Inserta los datos recuperados
InsertaDatosRegistro($rut, $correo, $password, $nombre, $apellido, $direcc, $ciu, $pais, $tc, $fv, $val);


}

function InsertaDatosRegistro($rut, $correo, $password, $nombre, $apellido, $direcc, $ciu, $pais, $tc, $fv, $val){
    
$sess = new UserSessions(); 



echo $sess->InsertData($rut, $correo, $password, $nombre, $apellido, $direcc, $ciu, $pais, $tc, $fv, $val);

}


//CODIGO PRINCIPAL

//Recupera los campos del formulario de registro
RecuperaFormaRegistro();






