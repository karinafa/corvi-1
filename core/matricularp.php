<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../classes/SearchFindShow.php';


/**
 * @input: Obtiene los datos de Formulario de Matricula
 * @return Jcode
 */

function GetData(){
    
    
    
    if(!isset($_POST['dorm'])){
        $error = '{ "message": "Dormitorio no se encuentra", "code":"400"}';
        return $error;
    }
    
    if(!isset($_POST['banos'])){
        $error = '{ "message": "Ctd Baños no se encuentra", "code":"400"}';
        return $error;
    }
    
    if(!isset($_POST['piscina'])){
        $error = '{ "message": "Piscina no se encuentra", "code":"400"}';
        return $error;
    }
     
    
    if(!isset($_POST['mtscuad'])){
        $error = '{ "message": "Metros2 no se encuentra", "code":"400"}';
        return $error;
    }
    
    if(!isset($_POST['ufprecio'])){
        $error = '{ "message": "Precio UF no se encuentra", "code":"400"}';
        return $error;
    }
    
    if(!isset($_POST['gstcmn'])){
        $error = '{ "message": "Gasto Comùn no se encuentra", "code":"400"}';
        return $error;
    }
    
    if(!isset($_POST['ctcan'])){
        $error = '{ "message": "Contribución no se encuentra", "code":"400"}';
        return $error;
    }
    
    if(!isset($_POST['direccion'])){
        $error = '{ "message": "Direccion no se encuentra", "code":"400"}';
        return $error;
    }
    
    if(!isset($_POST['comuna'])){
        $error = '{ "message": "Comuna no se encuentra", "code":"400"}';
        return $error;
    }
    
    if(!isset($_POST['ref'])){
        $error = '{ "message": "Referencia no se encuentra", "code":"400"}';
        return $error;
    }
    
    
    return $error = '{ "message": "Datos Validados", "code":"302"}';
    
    
    
}

function IngresarDatosMatricula(){
    
    
    $MessErr = json_decode(GetData());
    
    if ($MessErr->{'code'}!=="400"){

    $mtscuad = $_POST['mtscuad'];
    $mtscrd = $_POST['mtscrd'];
    $direccion = $_POST['direccion'];
    $comuna = $_POST['comuna'];
    $dorm = $_POST['dorm'];
    $banos = $_POST['banos'];
    $piscina = $_POST['piscina'];
    $gstcmn = $_POST['gstcmn'];
    $impuesto = 19;
    $ufprecio = $_POST['ufprecio'];
    $ref = $_POST['ref'];
    $lat = 0;
    $lon = 0;
    $ctcan = $_POST['ctcan'];
    
    
    $Matricula = new SearchFindShow();
    
    $errcd = $Matricula->InsertaBienRaiz($mtscuad, $mtscrd, $direccion, $comuna, $dorm, $banos, $piscina, $gstcmn, $impuesto, $ufprecio, $ref, $lat, $lon, $ctcan);
    
    $errfinal = json_decode($errcd);
    
    //echo json_last_error();
    //echo json_last_error_msg();
    
    
    
    if ($errfinal->{'code'}=="500"){
        
            echo $error = '{ "message": "' . $errfinal->{'message'}. '", "code":"500"}';
        
        }
        else {
        
                echo $error = '{ "message": "Registros Insertados", "code":"302"}';
        
             }
    
    }
        else{
            
        echo '{ "message": "Faltan Datos para completar", "code":"400"}';
        }
    
    
    
}


/**
 * EVENTO PRINCIPAL
 */

IngresarDatosMatricula();