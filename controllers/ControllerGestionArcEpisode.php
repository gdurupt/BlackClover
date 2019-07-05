<?php

require_once 'views/View.php';

class ControllerGestionArcEpisode{
    
    private $_view;
    private $_mangasManager;
    private $_episodesManager;
    private $_arcsManager;
    private $_usersManager;
    private $_postManager;
    
    public function __construct($url){     
        
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable"); 
            
        }else {       
            $this->PageGestionArcEpisode();    
        }   
    }
    
    private function PageGestionArcEpisode(){  
    
    if(isset($_SESSION['email']) AND isset($_SESSION['password'])){
    
            $this->_usersManager = new UsersManager;       
            $this->_usersManager->getUsers($_SESSION['email'], $_SESSION['password']);
        
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == "true"){
 //--------------------------------------------------------------------------------------------//
    
        if(isset($_POST["Post"])){
            $this->_postManager = new PostManager($_POST["Post"]);
        }   
            
            $this->_mangasManager = new MangasManager;
            
            $this->_episodesManager = new EpisodesManager;
            
            $this->_arcsManager = new ArcsManager;
        
            $mangas = $this->_mangasManager->getAll();
            
            $episodes = $this->_episodesManager->getAll();  
            
            $arcs = $this->_arcsManager->getAll();  
                
            $this->_view = new View('GestionArcEpisode');     
            $this->_view->generate(array('mangas' => $mangas,'arcs' => $arcs,'episodes' => $episodes));
            
        }else{
            header('location: Accueil');
        }
    }else{
        header('location: Accueil');
    }

    }
}