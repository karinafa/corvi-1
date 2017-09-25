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
    
    $errobj = json_decode($errormsg);
    
    if ($errobj->{'code'}=="302") {
        // Inicia Sesion PHP
        session_start();
        //obtiene sesion
        $MID = session_id();
        //Guarda info de correo en var de session
        $_SESSION['myemail'] = $email;
        
        
        $errormsg = $sess->CreateSessionInDb($MID, $email);
        //Parsea el mensaje JSON
        $OSID = json_decode($errormsg);
        //Analiza el código de error
        if ($OSID->{'code'}!="500"){
            echo $errormsg;
            //redirect('https://localhost/corvi/core/vitrina.php?SID='.$OSID->{'message'}, false);
            //return 0;
            }
        else{
            echo $errormsg; 
        }
        
    } else{
        echo $errormsg;
    }
   
}






//MAIN

GetUserandPass();