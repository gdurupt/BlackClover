<?php

require_once 'views/View.php';

class ControllerAdmin{
//--------------------------------------------------------------------------------------------//      
    private $_view;
    private $_comments;
    private $_episodesManager;
    private $_mangasManager;
    private $_arcsManager;
    private $_usersManager;
    private $_visitedManager;
//--------------------------------------------------------------------------------------------//          
    public function __construct($url){     
        
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable"); 
            
        }else {       
            $this->PageAdmin();    
        }   
    }
//--------------------------------------------------------------------------------------------//       
    private function PageAdmin(){  
//-------------------------------Member or not ?----------------------------------------------//       
    if(isset($_SESSION['email']) AND isset($_SESSION['password'])){   
            $this->_usersManager = new UsersManager;       
            $this->_usersManager->getUsers($_SESSION['email'], $_SESSION['password']);
//--------------------------------Admin or not ?----------------------------------------------//           
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == "true"){
            $UsersCounts = $this->_usersManager->getCountUsers();
//--------------------------------------------------------------------------------------------//   
            $this->_commentsManager = new CommentsManager;
            //------------Count all comment-------------//
            $commentsReport = $this->_commentsManager->getCountComment(true);
            //------------Count all comment signal-------------//
            $Allcomments = $this->_commentsManager->getCountComment(false);
//--------------------------------------------------------------------------------------------//      
            $this->_mangasManager = new MangasManager;
            //------------Count all manga-------------//
            $mangaCounts = $this->_mangasManager->getCountManga();
            //----------- Last manga upload ----------//
            $lastMangas = $this->_mangasManager->getLast();        
//--------------------------------------------------------------------------------------------//
            $this->_episodesManager = new EpisodesManager;
            //------------Count all episode ----------//
            $episodeCounts = $this->_episodesManager->getCountEpisode();
            //----------- Last episode upload --------//
            $lastEpisodes = $this->_episodesManager->getLast();       
//--------------------------------------------------------------------------------------------//
            $this->_arcsManager = new ArcsManager;
            //------------Count all arc ----------//
            $arcCounts = $this->_arcsManager->getCountArc();
            //----------- Last arc upload --------//
            $lastArcs = $this->_arcsManager->getLast(); 
//--------------------------------------------------------------------------------------------//
            $this->_visitedManager = new VisitedManager;
            //----------- Visited --------//
            $visiteds = $this->_visitedManager->getAll();
//-----------------------------------  View   ------------------------------------------------//   
            $this->_view = new View('AdminAccueil');     
            $this->_view->generate(array('commentsReport' => $commentsReport,'Allcomments' => $Allcomments,'mangaCounts' => $mangaCounts,'lastMangas' => $lastMangas,'episodeCounts' => $episodeCounts,'lastEpisodes' => $lastEpisodes,'arcCounts' => $arcCounts,'lastArcs' => $lastArcs,'UsersCounts' => $UsersCounts,'visiteds' => $visiteds));
//--------------------------------------------------------------------------------------------//               
        }else{
            header('location: Accueil');
            }
        }else{
        header('location: Accueil');
            }
    }
}