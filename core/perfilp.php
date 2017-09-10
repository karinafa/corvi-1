<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once '../classes/SearchFindShow.php';
require_once '../classes/MyErrorHandler.php';

session_start();

/**
 * @input: Obtiene los datos de Actualizacion de Usuario
 * @return Jcode
 */

function GetData(){
    
    //return
    //404: No encontrado
    
    if(!isset($_POST['password'])){
        $error = '{ "message": "Password no se encuentra", "code":"404"}';
        return $error;
    }
    
    
    if(!isset($_POST['apellido'])){
        $error = '{ "message": "Apellido no se encuentra", "code":"404"}';
        return $error;
    }
    
    if(!isset($_POST['direccion'])){
        $error = '{ "message": "Direccion no se encuentra", "code":"404"}';
        return $error;
    }
    
    if(!isset($_POST['comuna'])){
        $error = '{ "message": "Piscina no se encuentra", "code":"400"}';
        return $error;
    }

    return $error = '{ "message": "Datos Correctos", "code":"302"}';
    
}


function Updater(){
    
    $errcd = GetData();
    $updater = new UserSessions();
    
    $errfinal = json_decode($errcd);
    //retorna error 500 en caso de no encontrar asociasion
  if ($errfinal->{'code'}!="400"){
          
      $errupd = $updater->UpdateUserData($rut, $password, $nombre, $apellido, 0000, $direccion, $comuna, 1, 0, 0);
      
      $errfinal = json_decode($errupd);
      
      if ($errfinal->{'code'}!="500"){
          
          echo $error = '{ "message": "Datos Actualizados", "code":"302"}';
          
      }else
      {
          
          echo $error = '{ "message": "Error en la actualizacion", "code":"302"}';
      }
      
      
      
      
  }
    
    
    
    
    
}


// PROGRAMA PRINCIPAL

Updater();