<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SearchFindShow
 *
 * @author lukasalarcon
 */

require_once '../classes/MyErrorHandler.php';

$err = New MyErrorHandler();


class SearchFindShow {
    
    private $conn = null;
    private $errconn = null;
    
    
    
function __construct() {
      
    
    $this->conn = mysqli_connect("localhost","admin","Corvi1.","mydb");

// Check connection
    if (mysqli_connect_errno())
    {
        return $this->JsonErrorI("Failed to connect to MySQL: " . mysqli_connect_error(),"500");
    }
    
    return $this->conn;
    
   }
   
public function CountAllRows(){
    
    global $err;

    $sql = "SELECT * FROM `braiz`";
    
    $err->ErrorFile("SearchFindShow->CountAllRows() ".$sql);
    
    $result = $this->conn->query($sql);
    
    if ( $result->num_rows > 0) {
        
        return $result->num_rows;
        
    }
 else {
    
        return 0;
    }
    
    
    
}   
   

public function DisplayPageResults($max){
    
    //https://www.thoughtco.com/pagination-of-mysql-query-results-2694115
    
    global $err;

    $sql = "SELECT * FROM `braiz` ".$max;
    
    $err->ErrorFile("SearchFindShow->DisplayPageResults() ".$sql);
    
    $data_p = $this->conn->query($sql);
    
    return $data_p->fetch_array(MYSQLI_ASSOC);
    
    
    //retorna arreglo  
}


public function DisplaySQLResults($sql){
    
    //Genera un retorno de cualquier consulta SQL en formato ASOCIATIVO
    
    global $err;

    $err->ErrorFile("SearchFindShow->DisplaySQLResults() ".$sql);
    
    $data_p = $this->conn->query($sql);
    
    return $data_p->fetch_array(MYSQLI_ASSOC);
   
}



   
public function CreateVirtualFolder($folder){
    
    global $err;
    
    $myNewFolderPath = "../virtual/".$folder;
   if ( $e = mkdir($myNewFolderPath, 0700) ) {
      $err->ErrorFile($e."crea directorio");
   } else {
      // something went wrong
       $err->ErrorFile($e. "no crea directorio");
   }
    
    
    
}   

public function GetRutID($correo){
    
    
    global $err;

    $sql = "SELECT `usuario`.`rut` FROM `usuario` where `email`='".$correo."'";
    
    $err->ErrorFile($sql);
    
    $result = $this->conn->query($sql);
    
    if ( $result->num_rows > 0) {
        
               
        
                $row = $result->fetch_assoc();
                
                $rut = $row["rut"];

                return $this->JsonErrorI($rut,200);
            
        } else {
                $this->errconn = $this->conn->error;
                $this->conn->close();     
                return $this->JsonErrorI($this->errconn,500);     
                }
    
    
}

public function ActualizaBienRaiz($rol,$mtscuad,$mtscrd,$direccion,$comuna,$dorm,$banos,$piscina,$gstcmn,$impuesto,$ufprecio,$ref,$lat,$lon,$ctcan,$correo){
    
    global $err;
    // Obtiene el Rut en base al correo
    $errcd = $this->GetRutID($correo);
    //Decodifica el error Json
    $errfinal = json_decode($errcd);
    //retorna error 500 en caso de no encontrar asociasion
  if ($errfinal->{'code'}=="500"){
          $this->errconn = $this->conn->error;
          $this->conn->close();     
          return $this->JsonErrorI($this->errconn,500);   
  }
  else
      $rutID = $errfinal->{'message'};
    
  $sql = "UPDATE `braiz`
SET
`rolid` = ".$rol.",
`mtscuad` = ".$mtscuad." ,
`mtscrd` = ".$mtscuad.",
`direccion` = '".$direccion."',
`comuna` = ".$comuna.",
`dorm` = ".$dorm.",
`banos` = ".$banos.",
`piscina` = ".$piscina.",
`gstocmn` = ".$gstcmn.",
`impuesto` = ".$impuesto.",
`ufprecio` = ".$ufprecio.",
`ref` = '".$ref."',
`lat` = ".$lat.",
`lon` = ".$lon.",
`ctcan` = ".$ctcan.",
`us` = '".$rutID."'
 WHERE `rolid` = ".$rol;  
    
   $err->ErrorFile("SearhFindShow()-ActualizaBienRaiz " .$sql);  
  
   if ($this->conn->query($sql) > 0) {
                $this->conn->close();
                return $this->JsonErrorI("Actualizacion realizada",200);
            
        } else {
                $this->errconn = $this->conn->error;
                $this->conn->close();     
                return $this->JsonErrorI($this->errconn,500);     
                }
     
    
    
}


   
public function InsertaBienRaiz($rol,$mtscuad,$mtscrd,$direccion,$comuna,$dorm,$banos,$piscina,$gstcmn,$impuesto,$ufprecio,$ref,$lat,$lon,$ctcan,$correo){
    
    global $err;
 
    $errcd = $this->GetRutID($correo);
    
    $errfinal = json_decode($errcd);
    
  if ($errfinal->{'code'}=="500"){
          $this->errconn = $this->conn->error;
          $this->conn->close();     
          return $this->JsonErrorI($this->errconn,500);   
  }
  else
      $rutID = $errfinal->{'message'};
  
  
  $sql = "INSERT INTO `braiz`
(
`rolid`,
`mtscuad`,
`mtscrd`,
`direccion`,
`comuna`,
`dorm`,
`banos`,
`piscina`,
`gstocmn`,
`impuesto`,
`ufprecio`,
`ref`,
`lat`,
`lon`,
`ctcan`,
`us`)
VALUES
(
".$rol.",".
$mtscuad.",".
$mtscrd.",'".
$direccion."',".
$comuna.",".
$dorm.",".
$banos.",".
$piscina.",".
$gstcmn.",".
$impuesto.",".
$ufprecio.",'".
$ref."',".
$lat.",".
$lon.",".
$ctcan.",'".
$rutID."')";         
  
 $err->ErrorFile("SearchFindShow()->Insertabienraiz ".$sql);  
  
   if ($this->conn->query($sql) > 0) {
                $this->conn->close();
                return $this->JsonErrorI("Insersión realizada",200);
            
        } else {
                $this->errconn = $this->conn->error;
                $this->conn->close();     
                return $this->JsonErrorI($this->errconn,500);     
                }
    
    
    
    
}    
    
public function JsonErrorI($error,$coderr){
    /* Version Mejorada de JsonError para incluir codigo de error */
    
    $error = '{ "message": "' . $error . '", "code":"'.$coderr.'"}';
    
    return $error;
    
    
}
    

    
    
    
    
    
    
    
    
    
    
    
    
    
}
