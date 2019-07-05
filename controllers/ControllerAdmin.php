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
        
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == "true"){
            $UsersCounts = $this->_usersManager->getCountUsers();
    //--------------------------------------------------------------------------------------------//   
            $this->_commentsManager = new CommentsManager;
        
            $commentsReport = $this->_commentsManager->getCountComment(true);
        
            $Allcomments = $this->_commentsManager->getCountComment(false);
    //--------------------------------------------------------------------------------------------//      
            $this->_mangasManager = new MangasManager;
        
            $mangaCounts = $this->_mangasManager->getCountManga();
            
            $lastMangas = $this->_mangasManager->getLast();
        
     //--------------------------------------------------------------------------------------------//
            $this->_episodesManager = new EpisodesManager;
        
            $episodeCounts = $this->_episodesManager->getCountEpisode();
            
            $lastEpisodes = $this->_episodesManager->getLast();
        
     //--------------------------------------------------------------------------------------------//
            $this->_arcsManager = new ArcsManager;
        
            $arcCounts = $this->_arcsManager->getCountArc();
            
            $lastArcs = $this->_arcsManager->getLast();
        
     //--------------------------------------------------------------------------------------------//
    
            $this->_view = new View('AdminAccueil');     
            $this->_view->generate(array('commentsReport' => $commentsReport,'Allcomments' => $Allcomments,'mangaCounts' => $mangaCounts,'lastMangas' => $lastMangas,'episodeCounts' => $episodeCounts,'lastEpisodes' => $lastEpisodes,'arcCounts' => $arcCounts,'lastArcs' => $lastArcs,'UsersCounts' => $UsersCounts));
            
        }else{
            header('location: Accueil');
        }
    }else{
        header('location: Accueil');
    }

    }
}