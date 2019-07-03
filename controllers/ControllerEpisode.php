<?php

require_once 'views/View.php';

class ControllerEpisode{
    
    private $_view;
    private $_episodesManager;
    private $_commentsManager;
    private $_postManager;
    
    public function __construct($url){     
        
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable"); 
            
        }else {       
            $this->PageEpisode();    
        }   
    }
    
    private function PageEpisode(){     
        
        if(isset($_GET["id"])){
        
        
        if(isset($_POST["Post"])){
            $this->_postManager = new PostManager($_POST["Post"]);
        }    
            
            $this->_episodesManager = new EpisodesManager;
            
            $this->_commentsManager = new CommentsManager;
        
            $episodes = $this->_episodesManager->getOne($_GET["id"]);
            
            $comments = $this->_commentsManager->getCommentOfPage(false,true);
        
        
            $this->_view = new View('Episode');     
            $this->_view->generate(array('episodes' => $episodes,'comments' => $comments));
            
            
        }else{
            header("location : Episodes");
        }
        

    }
}
