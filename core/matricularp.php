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
 * @input: Obtiene los datos de Formulario de Matricula
 * @return Jcode
 */


// INICIO FUNCION GETDATA
function GetData(){
    
    //return
    //404: No encontrado
    
    if(!isset($_POST['rol'])){
        $error = '{ "message": "Rol no se encuentra", "code":"404"}';
        return $error;
    }
    
    
    if(!isset($_POST['dorm'])){
        $error = '{ "message": "Dormitorio no se encuentra", "code":"404"}';
        return $error;
    }
    
    if(!isset($_POST['banos'])){
        $error = '{ "message": "Ctd Baños no se encuentra", "code":"404"}';
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
//FIN FUNCION GETDATA


//INICIO FUNCION GETIMAGE DATA
function GetImageData(){
    
    
    //var_dump($_POST); 
    
    echo "Getting into GetImageData";
        foreach($_FILES as $file) { 
            $n = $file['name']; 
            $s = $file['size']; 
            if (!$n) continue; 
             
            return $error='{"message":"Archivo '.$n.$s.'","code":"302"}';
        } 
} 

//FIN FUNCION GETIMAGE DATA

    
// INICIO FUNCION INGRESAR IMAGENES
function IngresarDatosImagenes(){
    
    
    
    
    GetImageData();
    
    
    
    
}  
//FIN FUNCION INGRESAR IMAGENES

    
function IngresarDatosDocumentos(){
    
    
    
    
    
    
}    
    
  
    


//INICIO INGRESAR DATOS MATRICULA
function IngresarDatosMatricula(){
    
    $NewErr = new MyErrorHandler();
    
    $correo = $_SESSION['myemail'];
    
    $MessErr = json_decode(GetData());

    $NewErr->ErrorFile("Dato no Encontrado".$MessErr->{'message'});
    
    if ($MessErr->{'code'}!=="400"){

    $rol = $_POST['rol'];
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
    
    
    
    $NewErr->ErrorFile("Matricularp - Valor UPD".$_POST['upd']);    
    
    if ($_POST['upd'] == "0" )
        {
            $NewErr->ErrorFile("AJAX CALL INSERTAR".$rol.$banos);  
            $errcd = $Matricula->InsertaBienRaiz($rol, $mtscuad, $mtscrd, $direccion, $comuna, $dorm, $banos, $piscina, $gstcmn, $impuesto, $ufprecio, $ref, $lat, $lon, $ctcan,$correo);
        }
            else
                {
        
                $NewErr->ErrorFile("AJAX CALL ACTUALIZAR".$rol.$banos);       
                $errcd = $Matricula->ActualizaBienRaiz($rol, $mtscuad, $mtscrd, $direccion, $comuna, $dorm, $banos, $piscina, $gstcmn, $impuesto, $ufprecio, $ref, $lat, $lon, $ctcan, $correo);    
    
                }
    
    
    
    $errfinal = json_decode($errcd);
    
    $NewErr->ErrorFile("IngresarDatosMatricula()->".$errcd);
    //echo json_last_error();
    //echo json_last_error_msg();
  
      $NewErr->ErrorFile("IngresarDatosMatricula() Cod Err->".$errfinal->{'code'});
    
    $msgfinal = $errfinal->{'code'};
    
        switch ((int)$msgfinal) {
    case 500:
        $NewErr->ErrorFile("IngresarDatosMatricula() Cod Err Sw 500");
        echo '{ "message": "' . $errfinal->{'message'}. '", "code":"500"}';
        break;
    case 302:
        $NewErr->ErrorFile("IngresarDatosMatricula() Cod Err Sw 302");
        echo '{ "message": "Registros Insertados", "code":"302"}';
        break;
    case 400:
        $NewErr->ErrorFile("IngresarDatosMatricula() Cod Err Sw-> 400");
        echo '{ "message": "Faltan Datos para completar", "code":"400"}';
        break;
    case 200:   
        echo $mycode = '{ "message": "Actualizacion Realizada", "code":"200"}';
        break;
    default:
        $NewErr->ErrorFile("IngresarDatosMatricula() Cod Err SW-> Default");
        echo '{ "message": "No se determina el error", "code":"100"}';
    }
        
        
    
}
//FIN IF
}
//FIN INGRESAR DATOS MATRICULA

/**
 * EVENTO PRINCIPAL
 */


if (isset($_POST['id'])){
    
    $i = 0;
    
    $i = ((int)$_POST["id"]);

    switch ($i) {
    case 0:
        IngresarDatosMatricula();
        break;
    case 1:
        IngresarDatosImagenes();
        break;
    case 2:
        IngresarDatosDocumentos();
        break;
    
    }
}   

   
 
    