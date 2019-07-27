<?php

require_once 'views/View.php';

class ControllerManga{
//--------------------------------------------------------------------------------------------//    
    private $_view;
    private $_mangasManager;
//--------------------------------------------------------------------------------------------//    
    public function __construct($url){          
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable");           
        }else {       
            $this->PageManga();    
        }   
    }
//--------------------------------------------------------------------------------------------//   
    private function PageManga(){     
//------------------------------------All manga ------------------------------------------------//        
        $this->_mangasManager = new MangasManager;
        
        $Mangas = $this->_mangasManager->getAll();      
//----------------------------------- View -----------------------------------------------------//        
        $this->_view = new View('Manga');    
        $this->_view->generate(array('Mangas' => $Mangas));
    }
}