<?php

require_once 'views/View.php';

class ControllerQuisommesnous{
 //--------------------------------------------------------------------------------------------//    
    private $_view;
    private $_usersManager;
 //--------------------------------------------------------------------------------------------//    
    public function __construct($url){           
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable");         
        }else {       
            $this->PageQui();    
        }   
    }
//--------------------------------------------------------------------------------------------//     
    private function PageQui(){   
        $this->_usersManager = new UsersManager; 
        
        $UsersCounts = $this->_usersManager->getCountUsers();
        
        
        $this->_view = new View('Quisommesnous');     
        $this->_view->generate(array('UsersCounts' => $UsersCounts));
    }
}