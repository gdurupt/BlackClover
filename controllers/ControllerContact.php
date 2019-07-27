<?php

require_once 'views/View.php';

class ControllerContact{
 //--------------------------------------------------------------------------------------------//   
    private $_view;
 //--------------------------------------------------------------------------------------------//   
    public function __construct($url){           
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable");           
        }else {       
            $this->PageContact();    
        }   
    }
//--------------------------------------------------------------------------------------------//   
    private function PageContact(){            
//--------------------------------- Form manager ---------------------------------------------//       
        if(isset($_POST["Post"])){
            $this->_postManager = new PostManager($_POST["Post"]);
        } 
//-----------------------------------  View   ------------------------------------------------//       
        $this->_view = new View('Contact');     
        $this->_view->generate(array());
    }
}