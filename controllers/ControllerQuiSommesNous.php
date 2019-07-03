<?php

require_once 'views/View.php';

class ControllerQuiSommesNous{
    
    private $_view;
    
    public function __construct($url){     
        
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable"); 
            
        }else {       
            $this->PageQui();    
        }   
    }
    
    private function PageQui(){     
        
        $this->_view = new View('QuiSommesNous');     
        $this->_view->generate(array());
    }
}