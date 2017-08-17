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
    
public function InsertaBienRaiz($mtscuad,$mtscrd,$direccion,$comuna,$dorm,$banos,$piscina,$gstcmn,$impuesto,$ufprecio,$ref,$lat,$lon,$ctcan){
    
  $sql = "INSERT INTO `mydb`.`braiz`
(
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
`ctcan`)
VALUES
(
".$mtscuad.",".
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
$ctcan.")";
  
  
  
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
