<?php

require_once 'views/View.php';

class ControllerContact{
    
    private $_view;
    
    public function __construct($url){     
        
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable"); 
            
        }else {       
            $this->PageAccueil();    
        }   
    }
    
    private function PageAccueil(){     
        
        $this->_view = new View('Contact');     
        $this->_view->generate(array());
    }
}