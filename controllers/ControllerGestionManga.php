<?php

require_once 'views/View.php';

class ControllerGestionManga{
//--------------------------------------------------------------------------------------------//    
    private $_view;
    private $_mangasManager;
    private $_usersManager;
    private $_postManager;
//--------------------------------------------------------------------------------------------//    
    public function __construct($url){           
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable");          
        }else {       
            $this->PageGestionManga();    
        }   
    }
//--------------------------------------------------------------------------------------------//    
    private function PageGestionManga(){  
//--------------------------------------------------------------------------------------------//    
    if(isset($_SESSION['email']) AND isset($_SESSION['password'])){
    
            $this->_usersManager = new UsersManager;       
            $this->_usersManager->getUsers($_SESSION['email'], $_SESSION['password']);
      
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == "true"){
 //--------------------------------------------------------------------------------------------//
            $post = filter_input(INPUT_POST, "Post", FILTER_SANITIZE_STRING);
            
            if(isset($post)){
                $post = filter_input(INPUT_POST, "Post", FILTER_SANITIZE_STRING); 
                $this->_postManager = new PostManager($post);
            }       
//--------------------------------------------------------------------------------------------//             
                $this->_mangasManager = new MangasManager;        
                $mangas = $this->_mangasManager->getAll();  
//--------------------------------------------------------------------------------------------//                         
                $this->_view = new View('GestionManga');     
                $this->_view->generate(array('mangas' => $mangas));           
        }else{
            header('location: Accueil');
        }
    }else{
        header('location: Accueil');
    }

    }
}