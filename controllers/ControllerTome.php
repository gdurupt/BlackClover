<?php

require_once 'views/View.php';

class ControllerTome{
    
    private $_view;
    private $_mangasManager;
    private $_commentsManager;
    private $_postManager;
    private $_ratingsManager;
    
    public function __construct($url){     
        
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable"); 
            
        }else {       
            $this->PageTome();    
        }   
    }
    
    private function PageTome(){  
        
        if(isset($_GET["id"]) AND $_GET['id'] != null){
            
            $this->_ratingsManager = new RatingsManager;
                        
            if(isset($_POST["Post"])){
                $this->_postManager = new PostManager($_POST["Post"]);
            }
            
            if(isset($_GET["note"])){
                if(isset($_GET["update"]) AND $_GET["update"] == 1){
                    $this->_ratingsManager->updateRatings($_GET['note'],$_SESSION['id'],true,$_GET['id']);
                    header("location: Tome&id=".$_GET['id']); 
                }else{
                    $this->_ratingsManager->addRating($_GET['note'],$_SESSION['id'],true,$_GET['id']);
                    header("location: Tome&id=".$_GET['id']);
                }
            }
            
            if(isset($_SESSION['id'])){
                $this->_ratingsManager->SecureMultiVote($_SESSION['id'],true, $_GET['id']);
            }
                
            $this->_mangasManager = new MangasManager;
            
            $this->_commentsManager = new CommentsManager;
            
            $notations = $this->_ratingsManager->getRatings(true, $_GET['id']);
            
            $nbratings = $this->_ratingsManager->getCountUsersRatings(true, $_GET['id']);
        
            $mangas = $this->_mangasManager->getOne($_GET['id']);
            
            $comments = $this->_commentsManager->getCommentOfPage(true,false);
            
            $this->_view = new View('Tome');     
            $this->_view->generate(array('mangas' => $mangas,'comments' => $comments,'notations' => $notations,'nbratings' => $nbratings));
        }else
        
        header("location : Manga");
    }
}