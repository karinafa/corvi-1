<?php

require_once '../classes/Uploader.php';
require_once '../classes/SearchFindShow.php';
require_once '../classes/MyErrorHandler.php';

session_start();

/**Globla @var **/

      
$err = new MyErrorHandler();
$hcorreo = "";

function Sanity(){
    
if (isset($_SESSION['myemail'])){
//desde sigin.php
    
    //echo "En sanity...";
    global $err;
    global $hcorreo;
    
    
    $correo = $_SESSION['myemail'];
    
    $err->ErrorFile($correo);
    
    $hcorreo = hash('ripemd160', $correo);
    
    $err->ErrorFile($hcorreo);

    return 1;

    }
  return 0;  
}

// Directory where we're storing uploaded images
// Remember to set correct permissions or it won't work

if (Sanity()){
    
    $upload_dir = '../virtual/'.substr($hcorreo, 0, 5);
    
    $err->ErrorFile($upload_dir);

    $vtest = new SearchFindShow();
    
    $filename = ($upload_dir . "/");
  
    if (!file_exists($filename)) {
    

    $vtest->CreateVirtualFolder($upload_dir);
    
    
    }

    $uploader = new FileUpload('uploadfile');

    // Handle the upload
    $result = $uploader->handleUpload($upload_dir);

    if (!$result) {
        exit(json_encode(array('success' => false, 'msg' => $uploader->getErrorMsg())));  
        }

        echo json_encode(array('success' => true));
    
        }
        else{
         echo json_encode(array('success' => false, 'msg' => 'No se reconoce session'));}


