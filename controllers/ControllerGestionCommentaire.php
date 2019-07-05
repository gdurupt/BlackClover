<?php

require_once 'views/View.php';

class ControllerGestionCommentaire{
    
    private $_view;
    private $_commentsManager;
    private $_episodesManager;
    private $_mangasManager;
    private $_arcsManager;
    private $_usersManager;
    
    public function __construct($url){     
        
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable"); 
            
        }else {       
            $this->PageGestionCommentaire();    
        }   
    }
    
    private function PageGestionCommentaire(){  
    
    if(isset($_SESSION['email']) AND isset($_SESSION['password'])){
    
            $this->_usersManager = new UsersManager;       
            $this->_usersManager->getUsers($_SESSION['email'], $_SESSION['password']);
        
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == "true"){
 //--------------------------------------------------------------------------------------------//
    
        if(isset($_POST["Post"])){
            $this->_postManager = new PostManager($_POST["Post"]);
        }   
            
            $this->_mangasManager = new MangasManager;
        
            $mangas = $this->_mangasManager->getAll();
//--------------------------------------------------------------------------------------------//            
            $this->_arcsManager = new ArcsManager;
        
            $arcs = $this->_arcsManager->getAll(); 
//--------------------------------------------------------------------------------------------//           
            $this->_episodesManager = new EpisodesManager;
        
            $episodes = $this->_episodesManager->getEpisodesSUBSTRING();
//--------------------------------------------------------------------------------------------//          
            $this->_commentsManager = new CommentsManager;
        
            $comments = $this->_commentsManager->getAll(); 
//--------------------------------------------------------------------------------------------//           
            
            $this->_view = new View('GestionCommentaire');     
            $this->_view->generate(array('mangas' => $mangas,'arcs' => $arcs,'episodes' => $episodes,'comments' => $comments));
            
        }else{
            header('location: Accueil');
        }
    }else{
        header('location: Accueil');
    }

    }
}