<?php

require_once 'views/View.php';

class ControllerIdentifiant{
//--------------------------------------------------------------------------------------------//       
    private $_view;
//--------------------------------------------------------------------------------------------//       
    public function __construct($url){
//--------------------------------------------------------------------------------------------//
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable");            
        }else {       
            $this->PageIdentifiant();    
        }   
    }
//--------------------------------------------------------------------------------------------//       
    private function PageIdentifiant(){    
//--------------------------------------------------------------------------------------------//                
        $post = filter_input(INPUT_POST, "Post", FILTER_SANITIZE_STRING);
            
        if(isset($post)){
            $post = filter_input(INPUT_POST, "Post", FILTER_SANITIZE_STRING); 
            $this->_postManager = new PostManager($post);
        }   
//-----------------------------------  View   ------------------------------------------------//          
            $this->_view = new View('Identifiant');     
            $this->_view->generate(array());
    }
}
