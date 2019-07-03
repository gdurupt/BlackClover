<?php

require_once 'views/View.php';

class ControllerConnection{
    
    private $_view;
    
    public function __construct($url){     
        
        if (isset($url) && count($url) > 1) {       
            throw new \Exception("Page Introuvable"); 
            
        }else {       
            $this->PageConnection();    
        }   
    }
    
    private function PageConnection(){  
        
    
        if(isset($_SESSION['alert'])){
            echo "<script>alert(\"Le pseudo ou l'email est deja pris par un autre utilisateur\")</script>";
            session_destroy();
        }
                 
        if(isset($_POST["Post"])){
            $this->_postManager = new PostManager($_POST["Post"]);
        }    
  
        $this->_view = new View('Connection');     
        $this->_view->generate(array());

    }
}