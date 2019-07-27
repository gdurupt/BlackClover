<?php

require_once 'views/View.php';

class ControllerGestionPersonnage{
 //--------------------------------------------------------------------------------------------//   
    private $_view;
    private $_personnageManager;
    private $_usersManager;
    private $_postManager;
 //--------------------------------------------------------------------------------------------//   
    public function __construct($url){        
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable");      
        }else {       
            $this->PageGestionPersonnage();    
        }   
    }
//--------------------------------------------------------------------------------------------//    
    private function PageGestionPersonnage(){  
    
    if(isset($_SESSION['email']) AND isset($_SESSION['password'])){
    
            $this->_usersManager = new UsersManager;       
            $this->_usersManager->getUsers($_SESSION['email'], $_SESSION['password']);
        
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == "true"){
 //--------------------------------------------------------------------------------------------//
    
        if(isset($_POST["Post"])){
            $this->_postManager = new PostManager($_POST["Post"]);
        }   
        
            $this->_personnageManager = new PersonnageManager;
        
            $personnages = $this->_personnageManager->getAll(); 
 //--------------------------------------------------------------------------------------------//            

                
            $this->_view = new View('GestionPersonnage');     
            $this->_view->generate(array('personnages' => $personnages));
            
        }else{
            header('location: Accueil');
        }
    }else{
        header('location: Accueil');
    }

    }
}