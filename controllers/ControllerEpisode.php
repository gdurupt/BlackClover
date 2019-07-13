<?php

require_once 'views/View.php';

class ControllerEpisode{
    
    private $_view;
    private $_episodesManager;
    private $_commentsManager;
    private $_postManager;
    private $_ratingsManager;
    
    public function __construct($url){     
        
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable"); 
            
        }else {       
            $this->PageEpisode();    
        }   
    }
    
    private function PageEpisode(){     
        
        if(isset($_GET["id"])){
        
        $this->_ratingsManager = new RatingsManager;
            
        if(isset($_POST["Post"])){
            $this->_postManager = new PostManager($_POST["Post"]);
        }   
            
        if(isset($_GET["note"])){
            if(isset($_GET["update"]) AND $_GET["update"] == 1){
                $this->_ratingsManager->updateRatings($_GET['note'],$_SESSION['id'],false,$_GET['id']);
                header("location: Episode&id=".$_GET['id']); 
            }else{
                $this->_ratingsManager->addRating($_GET['note'],$_SESSION['id'],false,$_GET['id']);
                header("location: Episode&id=".$_GET['id']);
                }
            }
            
            if(isset($_SESSION['id'])){
                $this->_ratingsManager->SecureMultiVote($_SESSION['id'],false, $_GET['id']);
            }
            
            $this->_episodesManager = new EpisodesManager;
            
            $this->_commentsManager = new CommentsManager;
            
            $this->_mangasManager = new MangasManager;
            
            $notations = $this->_ratingsManager->getRatings(false, $_GET['id']);
            
            $nbratings = $this->_ratingsManager->getCountUsersRatings(false, $_GET['id']);
            
            $episodes = $this->_episodesManager->getOne($_GET["id"]);
            
            $comments = $this->_commentsManager->getCommentOfPage(false,true);
            
            $mangas = $this->_mangasManager->getAll(); 
        
        
            $this->_view = new View('Episode');     
            $this->_view->generate(array('episodes' => $episodes,'comments' => $comments,'notations' => $notations,'nbratings' => $nbratings,'mangas' => $mangas));
            
            
        }else{
            header("location : Episodes");
        }
        

    }
}
