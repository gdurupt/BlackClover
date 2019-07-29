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
            $getId = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
            $sessionId = filter_var($_SESSION['id']);
            $this->_ratingsManager = new RatingsManager;
            $post = filter_input(INPUT_POST, "Post", FILTER_SANITIZE_STRING);
            
        if(isset($post)){
            $post = filter_input(INPUT_POST, "Post", FILTER_SANITIZE_STRING); 
            $this->_postManager = new PostManager($post);
        }  
            
            if(isset($_GET["note"])){
                $getNote = filter_input(INPUT_GET, "note", FILTER_SANITIZE_NUMBER_INT);
                if(isset($_GET["update"]) AND $_GET["update"] == 1){
                    $this->_ratingsManager->updateRatings($getNote,$sessionId,true,$getId);
                    header("location: Tome&id=".$getId); 
                }else{
                    $this->_ratingsManager->addRating($getNote,$sessionId,true,$getId);
                    header("location: Tome&id=".$getId);
                }
            }
            
            if(isset($_SESSION['id'])){
                $this->_ratingsManager->SecureMultiVote($sessionId,true, $getId);
            }
                
            $this->_mangasManager = new MangasManager;
            
            $this->_commentsManager = new CommentsManager;
            
            $notations = $this->_ratingsManager->getRatingsForOne(true, $getId);
            
            $nbratings = $this->_ratingsManager->getCountUsersRatings(true, $getId);
        
            $mangas = $this->_mangasManager->getOne($getId);
            
            $comments = $this->_commentsManager->getCommentOfPage(true,false);
            
            $this->_view = new View('Tome');     
            $this->_view->generate(array('mangas' => $mangas,'comments' => $comments,'notations' => $notations,'nbratings' => $nbratings));
        }else
        
        header("location : Manga");
    }
}