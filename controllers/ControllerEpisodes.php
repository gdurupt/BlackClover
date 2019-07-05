<?php

require_once 'views/View.php';

class ControllerEpisodes{
    
    private $_view;
    private $_episodesManager;
    private $_arcsManager;
    
    public function __construct($url){     
        
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable"); 
            
        }else {       
            $this->PageAccueil();    
        }   
    }
    
    private function PageAccueil(){     
        
        $this->_episodesManager = new EpisodesManager;
        
        $this->_arcsManager = new ArcsManager;
        
        $episodes = $this->_episodesManager->getAll();
        
        $arcs = $this->_arcsManager->getAll();
        
        
        $this->_view = new View('Episodes');     
        $this->_view->generate(array('episodes' => $episodes,'arcs' => $arcs));
    }
}