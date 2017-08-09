<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../classes/UserSessions.php';



//echo '{ "message": "' . $_POST['password'] . '" }';

function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}


function GetUserandPass(){
    
    $sess = new UserSessions(); 
    $pwd = $_POST['password'];
    $email = $_POST['email'];
    /*
     * 
     * Descripcion
     * 1)Valida si el usuario existe en Base de Datos
     * 2)Genera un sesion de PHP
     * 3)Guarda un super ID de Sesion de PHP + Hash de Correo
     * 4)Redirije a vitrina con super ID
     * 
     */
    $errormsg = $sess->CheckUserLogin($email, $pwd);
    
    $obj = json_decode($errormsg);
    if ($obj->{'message'}=="302") {
        
        session_start();
        $MID = session_id();
        $OSID = json_decode($sess->CreateSessionInDb($MID, $email));
        
        redirect('https://localhost/corvi/core/vitrina.php?SID='.$OSID->{'message'}, false);
        
        
    } else{
        echo $errormsg;
    }
   
}


//MAIN

GetUserandPass();