<?php

require_once 'views/View.php';

class ControllerCompte{
//--------------------------------------------------------------------------------------------//    
    private $_view;
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
            $post = filter_input(INPUT_POST, "Post", FILTER_SANITIZE_STRING);
            
        if(isset($post)){
            $post = filter_input(INPUT_POST, "Post", FILTER_SANITIZE_STRING); 
            $this->_postManager = new PostManager($post);
        }           
//-----------------------------------  View   ------------------------------------------------//   
            $this->_view = new View('Compte');     
            $this->_view->generate(array());           
        }else{
            header('location: Accueil');
        }
    }
}