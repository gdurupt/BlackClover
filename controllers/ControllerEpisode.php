<?php

require_once 'views/View.php';

class ControllerEpisode{
//--------------------------------------------------------------------------------------------//   
    private $_view;
    private $_episodesManager;
    private $_commentsManager;
    private $_postManager;
    private $_ratingsManager;
//--------------------------------------------------------------------------------------------//    
    public function __construct($url){            
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable");            
        }else {       
            $this->PageEpisode();    
        }   
    }
//--------------------------------------------------------------------------------------------//    
    private function PageEpisode(){     
//-----------------------------------Id of episode -------------------------------------------//        
        if(isset($_GET["id"])){
//-----------------------------------Form manager  -------------------------------------------//            
        if(isset($_POST["Post"])){
            $post = filter_input(INPUT_POST, "Post", FILTER_SANITIZE_STRING); 
            $this->_postManager = new PostManager($post);
        }   
//--------------------------------------------------------------------------------------------//         
           $this->_ratingsManager = new RatingsManager;   
//----------------------------------- Get note for add and udapte rating ---------------------//            
        if(isset($_GET["note"])){
            if(isset($_GET["update"]) AND $_GET["update"] == 1){
                $this->_ratingsManager->updateRatings($_GET['note'],$_SESSION['id'],false,$_GET['id']);
                header("location: Episode&id=".$_GET['id']); 
            }else{
                $this->_ratingsManager->addRating($_GET['note'],$_SESSION['id'],false,$_GET['id']);
                header("location: Episode&id=".$_GET['id']);
                }
            }
//----------------------------------if member => security for multi rating ---------------------//           
            if(isset($_SESSION['id'])){
                $this->_ratingsManager->SecureMultiVote($_SESSION['id'],false, $_GET['id']);
            }
//-----------------------------------Get one episode --------------------------------------------//            
            $this->_episodesManager = new EpisodesManager;           
            $episodes = $this->_episodesManager->getOne($_GET["id"]);
//-----------------------------------Get ccommetns of episode  ----------------------------------//            
            $this->_commentsManager = new CommentsManager;
            $comments = $this->_commentsManager->getCommentOfPage(false,true);
//-----------------------------------Get all manga  ---------------------------------------------//            
            $this->_mangasManager = new MangasManager;
            $mangas = $this->_mangasManager->getAll(); 
//----------- get Count usersrating and AVG ratings of episode ----------------------------------//            
            $notations = $this->_ratingsManager->getRatingsForOne(false, $_GET['id']);           
            $nbratings = $this->_ratingsManager->getCountUsersRatings(false, $_GET['id']);
//-----------------------------------  View   ---------------------------------------------------//             
            $this->_view = new View('Episode');     
            $this->_view->generate(array('episodes' => $episodes,'comments' => $comments,'notations' => $notations,'nbratings' => $nbratings,'mangas' => $mangas));            
        }else{
            header("location : Episodes");
        }
    }
}
