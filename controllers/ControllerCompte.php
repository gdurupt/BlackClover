<?php

require_once 'views/View.php';

class ControllerAdmin{
    
    private $_view;
    private $_comments;
    private $_episodesManager;
    private $_mangasManager;
    private $_arcsManager;
    private $_usersManager;
    
    
    public function __construct($url){     
        
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable"); 
            
        }else {       
            $this->PageAdmin();    
        }   
    }
    
    private function PageAdmin(){  
    
    if(isset($_SESSION['email']) AND isset($_SESSION['password'])){
    
            $this->_usersManager = new UsersManager;       
            $this->_usersManager->getUsers($_SESSION['email'], $_SESSION['password']);
        
     //--------------------------------------------------------------------------------------------//
    
            $this->_view = new View('Compte');     
            $this->_view->generate(array());
            
    }else{
        header('location: Accueil');
    }

    }
}