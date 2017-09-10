<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyErrorHandler
 *
 * @author lukasalarcon
 */
class MyErrorHandler {
    //put your code here
    
    
    public function ErrorFile($txt){
    
            $myfile = fopen("errorHandler.txt", "a") or die("Unable to open file!");
            
        $mydate = date(DATE_RFC2822);    
        
        fwrite($myfile, $mydate." ".$txt."\n");
            
        
        fclose($myfile);
    
    }
    
}
