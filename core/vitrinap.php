<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../classes/SearchFindShow.php';


function RecuperaFormaRegistro(){
    
    $myquery  = new SearchFindShow();
    
    if(isset($_POST['comuna'])) {$comuna = $_POST['comuna'];} else {$comuna="";};
    if(isset($_POST['desde'])){$desde = $_POST['desde'];} else {$desde="";};
    if(isset($_POST['hasta'])){ $hasta = $_POST['hasta'];}else {$hasta="";};    
    if(isset($_POST['dorm'])){$dorm = $_POST['dorm'];}else {$dorm="";};
    if(isset($_POST['banos'])){$banos = $_POST['banos'];}else{$banos="";};
    
    $myquery->SearchEngine($comuna, $desde, $hasta, $dorm, $banos, $max, $page);
    
    
    
    
     
    
    
    
    
}


RecuperaFormaRegistro();