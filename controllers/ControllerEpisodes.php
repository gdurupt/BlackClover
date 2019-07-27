<?php

require_once 'views/View.php';

class ControllerEpisodes{
//--------------------------------------------------------------------------------------------//    
    private $_view;
    private $_episodesManager;
    private $_arcsManager;
    private $_ratingsManager;
 //--------------------------------------------------------------------------------------------//   
    public function __construct($url){     
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable");           
        }else {       
            $this->PageEpisodes();    
        }   
    }
//--------------------------------------------------------------------------------------------//    
    private function PageEpisodes(){     
//----------------------------------All episodes-------------------------------------------------//       
        $this->_episodesManager = new EpisodesManager;
        $episodes = $this->_episodesManager->getAll();
//-----------------------------------  All arcs   -----------------------------------------------//        
        $this->_arcsManager = new ArcsManager;
        $arcs = $this->_arcsManager->getAll();
//-----------------------------------  All ratting avg   -----------------------------------------------/        
        $this->_ratingsManager = new RatingsManager;
        $notations = $this->_ratingsManager->getRatings(); 
//-----------------------------------  View   ---------------------------------------------------//              
        $this->_view = new View('Episodes');     
        $this->_view->generate(array('episodes' => $episodes,'arcs' => $arcs,'notations' => $notations));
    }
}