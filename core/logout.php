<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../classes/UserSessions.php';
require_once '../classes/MyErrorHandler.php';
session_start();


//Funcion de redireccion de Salida a otra pagina
function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

//Validacion de datos para terminar session
function CheckLogout($remail){
    $sess = new UserSessions(); 
    $myerr = new MyErrorHandler();
    $myerr->ErrorFile("test");
    
    
    $ID = session_id();
    
    $code = $sess->LogoutSession($ID, $remail);
    
    
    
     $errors = json_decode($code);

    if ($errors->{'code'}=="1"){
        
        // remove all session variables
        session_unset(); 

        // destroy the session 
        //session_destroy();
        
        //redirects
        redirect("https://".$_SERVER['SERVER_NAME']."/corvi/core/signin.php");
        
    }
    
    
}
    // PHP SESSION ID
    $lemail = $_POST['email'];
    
    
    CheckLogout($lemail);
    
    