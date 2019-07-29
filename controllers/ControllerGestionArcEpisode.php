<?php

require_once 'views/View.php';

class ControllerGestionArcEpisode{
//--------------------------------------------------------------------------------------------//   
    private $_view;
    private $_mangasManager;
    private $_episodesManager;
    private $_arcsManager;
    private $_usersManager;
    private $_postManager;
//--------------------------------------------------------------------------------------------//    
    public function __construct($url){            
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable");            
        }else {       
            $this->PageGestionArcEpisode();    
        }   
    }
//--------------------------------------------------------------------------------------------//    
    private function PageGestionArcEpisode(){  
//-------------------------------Member or not ?----------------------------------------------//     
    if(isset($_SESSION['email']) AND isset($_SESSION['password'])){
            $this->_usersManager = new UsersManager;       
            $this->_usersManager->getUsers($_SESSION['email'], $_SESSION['password']);
//--------------------------------Admin or not ?----------------------------------------------//        
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == "true"){
//--------------------------------- Form manager ---------------------------------------------//    
        if(isset($_POST["Post"])){
            $post = filter_input(INPUT_POST, "Post", FILTER_SANITIZE_STRING); 
            $this->_postManager = new PostManager($post);
        }  
//--------------------------------- all mangas ---------------------------------------------//            
            $this->_mangasManager = new MangasManager;
            $mangas = $this->_mangasManager->getAll();
//--------------------------------- EpisodesSubstring And all----------------------------------//               
            $this->_episodesManager = new EpisodesManager;
            $episodes = $this->_episodesManager->getAll();
            $episodesStrings = $this->_episodesManager->getEpisodesSUBSTRING();
//--------------------------------- all arcs ---------------------------------------------//            
            $this->_arcsManager = new ArcsManager;
            $arcs = $this->_arcsManager->getAll();
//-----------------------------------  View   ------------------------------------------------//                            
            $this->_view = new View('GestionArcEpisode');     
            $this->_view->generate(array('mangas' => $mangas,'arcs' => $arcs,'episodes' => $episodes,'episodesStrings' => $episodesStrings));
//--------------------------------------------------------------------------------------------//            
        }else{
            header('location: Accueil');
        }
    }else{
        header('location: Accueil');
       }
    }
}