<?php

require_once 'views/View.php';

class ControllerTome{
    
    private $_view;
    private $_mangasManager;
    private $_commentsManager;
    private $_postManager;
    
    public function __construct($url){     
        
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable"); 
            
        }else {       
            $this->PageTome();    
        }   
    }
    
    private function PageTome(){  
        
        if(isset($_GET["id"]) AND $_GET['id'] != null){
            
            if(isset($_POST["Post"])){
                $this->_postManager = new PostManager($_POST["Post"]);
            }
                        
            $this->_mangasManager = new MangasManager;
            
            $this->_commentsManager = new CommentsManager;
        
            $mangas = $this->_mangasManager->getOne($_GET['id']);
            
            $comments = $this->_commentsManager->getCommentOfPage(true,false);
            
            $this->_view = new View('Tome');     
            $this->_view->generate(array('mangas' => $mangas,'comments' => $comments));
        }else
        
        header("location : Manga");
    }
}