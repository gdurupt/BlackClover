<?php

require_once 'views/View.php';

class ControllerAccueil{
//--------------------------------------------------------------------------------------------//       
    private $_view;
    private $_mangasManager;
    private $_personnageManager;
//--------------------------------------------------------------------------------------------//       
    public function __construct($url){
//--------------------------------------------------------------------------------------------//
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable");            
        }else {       
            $this->PageAccueil();    
        }   
    }
//--------------------------------------------------------------------------------------------//       
    private function PageAccueil(){    
        
      
//----------------------------- Member or not ? ----------------------------------------------//                   
     if(isset($_SESSION['email']) AND isset($_SESSION['password'])){
            $this->_usersManager = new UsersManager;       
            $this->_usersManager->getUsers($_SESSION['email'], $_SESSION['password']);   
     }
//-----------------------------------  manga   ------------------------------------------------//             
            $this->_mangasManager = new MangasManager;
            //----------- Last manga upload ----------//
            $lastMangas = $this->_mangasManager->getLast();
//-----------------------------------  personnage   ------------------------------------------------//             
            $this->_personnageManager = new PersonnageManager;
            //----------- Last manga upload ----------//
            $lastPersonnages = $this->_personnageManager->getLast();  
//-----------------------------------  View   ------------------------------------------------//          
            $this->_view = new View('Accueil');     
            $this->_view->generate(array('lastMangas' => $lastMangas,'lastPersonnages' => $lastPersonnages));
    }
}
