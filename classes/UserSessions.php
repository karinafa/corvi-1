<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserSessions
 *
 * @author lukasalarcon
 */

require_once '../classes/MyErrorHandler.php';

$err = new MyErrorHandler();

class UserSessions {
    
    
    
    
    private $errconn;
    public $email;
    

public function InsertData($rut,$correo,$password,$nombre,$apellido,$direcc,$ciu,$pais,$tc,$fv,$val){
    
    /**
 * Descripcion de InsertData
 *
 * @author lukasalarcon
     * 
     * Ingresa los datos a la base de datos
     * 
 */
    
    
    
    
    $conn = $this->ConnectDb();
    //Validar que los datos no sean repetidos
    if ($this->CheckDuplicate($rut, $correo)){
        
        $conn->close();
        return $this->JsonError("Los Datos Ingresados ya existen...");
        
        
    }
    
    //Revisar Validacion de RUT
    
    if (!$this->valida_rut($rut))
        return $this->JsonError("Error: " . "Rut".$rut." no es válido");
    
    
    if(!$this->luhn_check($number))
        return $this->JsonError("Error: " . "Tarjeta Credito".$tc." no es válida");
    
    
    $sql = "INSERT INTO usuario (rut,email,pass,nombre,apellido,fec_nac,direccion,comuna,comprador,vendedor,admin,sistema_banc) VALUES ('".$rut."','".$correo."','".$password."','".$nombre."','".$apellido."','".$direcc."','".$ciu."','".$pais."','".$tc."','".$fv."','".$val."','".$val."')";

    if ($conn->query($sql) === TRUE) {
                $conn->close();
                return $this->JsonError("Se ha creado registro.");
            
        } else {
                $this->errconn = $conn->error;
                   $conn->close();     
                return $this->JsonError("Error: " . $sql . $this->errconn);     
                }

        
    
}

private function CheckDuplicate($rut,$correo){
    
    
    $conn = $this->ConnectDb();
    $sql = "SELECT rut, email from mydb.usuario where rut='".$rut."' or email='".$correo."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    
        $conn->close();
        return 1;
    
    }
    
    return 0;  
}   

public function GetIDforFolder($correo){
    
    global $err;
    
    $hcorreo = hash('ripemd160', $correo);
    
    $err->ErrorFile("GetIDforFolder - ".$correo ." ".$hcorreo);
    
    
    return substr($hcorreo, 0,5);
    
    
}


private function ConnectDb(){
    
    
    $conn = mysqli_connect("localhost","admin","Corvi1.","mydb");

// Check connection
    if (mysqli_connect_errno())
    {
        return $this->JsonError("Failed to connect to MySQL: " . mysqli_connect_error());
    }
    
    return $conn;
       
}
  

public function JsonError($error,$generic = 101){
    
    
    
    $error = '{ "message": "' . $error . '", "code":"'.$generic.'"}';
    
    return $error;

}

public function JsonErrorI($error,$coderr){
    /* Version Mejorada de JsonError para incluir codigo de error */
    
    $error = '{ "message": "' . $error . '", "code":"'.$coderr.'"}';
    
    return $error;
    
    
}



private function luhn_check($number) {

  // Strip any non-digits (useful for credit card numbers with spaces and hyphens)
  $number=preg_replace('/\D/', '', $number);

  // Set the string length and parity
  $number_length=strlen($number);
  $parity=$number_length % 2;

  // Loop through each digit and do the maths
  $total=0;
  for ($i=0; $i<$number_length; $i++) {
    $digit=$number[$i];
    // Multiply alternate digits by two
    if ($i % 2 == $parity) {
      $digit*=2;
      // If the sum is two digits, add them together (in effect)
      if ($digit > 9) {
        $digit-=9;
      }
    }
    // Total up the digits
    $total+=$digit;
  }

  // If the total mod 10 equals 0, the number is valid
  return ($total % 10 == 0) ? TRUE : FALSE;

}

//GIT 
//https://gist.github.com/punchi/3a5c44e7aa7ac0609ce9e53365572541

public function valida_rut($rut)
{
    if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut)) {
        return false;
    }
    $rut = preg_replace('/[\.\-]/i', '', $rut);
    $dv = substr($rut, -1);
    $numero = substr($rut, 0, strlen($rut) - 1);
    $i = 2;
    $suma = 0;
    foreach (array_reverse(str_split($numero)) as $v) {
        if ($i == 8)
            $i = 2;
        $suma += $v * $i;
        ++$i;
    }
    $dvr = 11 - ($suma % 11);
    if ($dvr == 11)
        $dvr = 0;
    if ($dvr == 10)
        $dvr = 'K';
    if ($dvr == strtoupper($dv))
        return true;
    else
        return false;
}

private function ValidateUser($user, $pwd){
    
    //REtornos:
    //302: Encontrado
    //401: No autorizado
    //404: No encontrado
    
    
    
    $conn = $this->ConnectDb();
    
    // Validación de correo y password
    $sql = "SELECT email from mydb.usuario where email='".$user."' and pass='".$pwd."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
            return 302;
    }
    // Validación de correo
    $sql = "SELECT email from mydb.usuario where email='".$user."'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
            return 401;
    }
    
    $conn->close();
    // No se encuentra usuario
    return 404; 
    
}
    
public function CheckUserLogin($user, $pwd){
    
    //REtornos:
    //302: Encontrado
    //401: No autorizado
    //404: No encontrado
    
    
    if ($this->ValidateUser($user, $pwd)=="401"){
        
        //echo "Usuario Coincide;";
        return $this->JsonErrorI("Sus datos no coincide con nuestros registros","401");
        
    }
    
    if ($this->ValidateUser($user, $pwd)=="404"){
        //echo "Usuario NO registrado;";
        return $this->JsonErrorI("Usuario no registrado","404");
        
    }
    
     if ($this->ValidateUser($user, $pwd)=="302"){
        
        return $this->JsonErrorI("Usuario Válido","302");
        
    }
    
    
}    


public function CreateSessionInDb($IDnG,$correo){
    
    global $err;
//Codificacion de Error
    //200: No hay problema
    //201: Session ya Creada
    //500: PRoblema con la insersion
    
    $conn = $this->ConnectDb();
     //Crea un Hash del Correo Electronico
     $hcorreo = hash('ripemd160', $correo);
     
     $err->ErrorFile("correo sesion".$correo);
     
     $this->email = $correo;
     
     
     
     if ($this->CheckSessionInDb($IDnG,$correo)!="302"){
     
     $sql = "INSERT INTO sesionesweb (phpsession,email) VALUES ('".$IDnG."','".$hcorreo."')";

    if ($conn->query($sql) === TRUE) {
                $conn->close();
                return $this->JsonErrorI("Insersión realizada",200);
            
        } else {
                $this->errconn = $conn->error;
                $conn->close();     
                return $this->JsonErrorI("Error: " . $sql . $this->errconn,500);     
                }
     }
    else{
        $conn->close();
        return $this->JsonErrorI("Sesión ya creada",201);
        
    }
    
    
    
}
    
public function CheckSessionInDb($ID,$correo){
    
     //REtornos:
    //302: Encontrado
    //401: No autorizado
    //404: No encontrado
    
    
    $conn = $this->ConnectDb();
    $hcorreo = hash('ripemd160', $correo);
    // Validación de correo y password
    $sql = "SELECT phpsession,email from mydb.sesionesweb where phpsession='".$ID."' and email='".$hcorreo."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
            $myerrorcode =  302;
    }else{
    
    $myerrorcode =  404;
    }
    
    $conn->close();
    
    return $myerrorcode;
}

public function LogoutSession($ID,$correo){
    
    // retornos
    // 0: nada eliminado 
    // 1: eliminado
    //- 1 : error
    
    $conn = $this->ConnectDb();
    $hcorreo = hash('ripemd160', $correo);
    $sql = "DELETE from mydb.sesionesweb where phpsession='".$ID."' and email='".$hcorreo."'";
    $conn->query($sql);
    $myerr = mysqli_affected_rows($conn);
    
    if ($myerr == 1){
    
    session_destroy();    
    return $this->JsonErrorI("Eliminado", $myerr);}
    
    
    if ($myerr == 0){
        
        return $this->JsonErrorI("No hay registros eliminados", $myerr);
        
    }
    
   if ($myerr == -1){
        
        return $this->JsonErrorI("Error", $myerr);
        
    }
    
    
}




}

    
    
