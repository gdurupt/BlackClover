<?php

require_once 'views/View.php';

class ControllerPersonnage{
//--------------------------------------------------------------------------------------------//    
    private $_view;
    private $_personnageManager;
//--------------------------------------------------------------------------------------------//    
    public function __construct($url){           
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable");            
        }else {       
            $this->PagePersonnage();    
        }   
    }
//--------------------------------------------------------------------------------------------//   
    private function PagePersonnage(){         
//-----------------------------  all personnage ----------------------------------------------//       
        $this->_personnageManager = new PersonnageManager;       
        $personnages = $this->_personnageManager->getAll(); 
//------------------------------- view ----------------------------------------------------------//        
        $this->_view = new View('Personnage');    
        $this->_view->generate(array('personnages' => $personnages));
    }
}