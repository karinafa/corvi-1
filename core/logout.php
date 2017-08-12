<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../classes/UserSessions.php';




//Funcion de redireccion de Salida a otra pagina
function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

//Validacion de datos para terminar session
function CheckLogout(){
    $sess = new UserSessions(); 
    session_start();
 
    
    
}
    // PHP SESSION ID
    $LID = $_GET['ID'];
    echo $LID;
    
    