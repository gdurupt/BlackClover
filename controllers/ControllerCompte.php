<?php

require_once 'views/View.php';

class ControllerCompte{
//--------------------------------------------------------------------------------------------//    
    private $_view;
    private $_comments;
    private $_usersManager;
//--------------------------------------------------------------------------------------------//        
    public function __construct($url){           
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable");          
        }else {       
            $this->PageCompte();    
        }   
    }
//--------------------------------------------------------------------------------------------//   
    private function PageCompte(){  
//-------------------------------Member or not ?----------------------------------------------//   
        if(isset($_SESSION['email']) AND isset($_SESSION['password'])){    
            $this->_usersManager = new UsersManager;       
            $this->_usersManager->getUsers($_SESSION['email'], $_SESSION['password']);       
//--------------------------------- Form manager ---------------------------------------------//        
            if(isset($_POST["Post"])){
                $this->_postManager = new PostManager($_POST["Post"]);
            }           
//-----------------------------------  View   ------------------------------------------------//   
            $this->_view = new View('Compte');     
            $this->_view->generate(array());           
        }else{
            header('location: Accueil');
        }
    }
}