<?php

require_once 'views/View.php';

class ControllerPolitique{
 //--------------------------------------------------------------------------------------------//    
    private $_view;
 //--------------------------------------------------------------------------------------------//    
    public function __construct($url){           
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable");         
        }else {       
            $this->PagePolitique();    
        }   
    }
//--------------------------------------------------------------------------------------------//     
    private function PagePolitique(){             
        $this->_view = new View('Politique');     
        $this->_view->generate(array());
    }
}