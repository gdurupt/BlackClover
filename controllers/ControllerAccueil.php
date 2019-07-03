<?php

require_once 'views/View.php';

class ControllerAccueil{
    
    private $_view;
    
    public function __construct($url){     
        
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable"); 
            
        }else {       
            $this->PageAccueil();    
        }   
    }
    
    private function PageAccueil(){     
        
        
     if(isset($_SESSION['email']) AND isset($_SESSION['password'])){
    
            $this->_usersManager = new UsersManager;       
            $this->_usersManager->getUsers($_SESSION['email'], $_SESSION['password']);   
     }
        
            $this->_view = new View('Accueil');     
            $this->_view->generate(array());

    }
}