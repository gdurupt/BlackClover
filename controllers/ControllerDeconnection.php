<?php

require_once 'views/View.php';

class ControllerDeconnection{
    
    private $_view;
    
    public function __construct($url){     
        
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable"); 
            
        }else {       
            $this->PageDeconnection();    
        }   
    }
    
    private function PageDeconnection(){     
        
     session_destroy(); 
     header('location: Accueil');

    }
}