<?php

require_once 'views/View.php';

class ControllerDeconnection{ 
//--------------------------------------------------------------------------------------------//   
    public function __construct($url){           
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable");           
        }else {       
            $this->PageDeconnection();    
        }   
    }
//------------------------------------------------------------------------------------------//    
    private function PageDeconnection(){     
//--------------------------- destroy session-----------------------------------------------//        
     session_destroy();
//--------------------------- redirection --------------------------------------------------//
     header('location: Accueil');
    }
}