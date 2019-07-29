<?php

class PostManager{
//--------------------------------------------------------------------------------------------//      
    private $_episodesManager;
    private $_commentManager;
    private $_mangaManager;
    private $_usersManager;
    private $_arcsManager;
    private $_personnageManager;
    private $_idPostSecure;
//--------------------------------------------------------------------------------------------//         
       public function __construct($data)
  {
    $this->hydrate($data);
  }
//--------------------------------------------------------------------------------------------//  
  public function hydrate($eventPost)
  {
 
      $method = ucfirst($eventPost);
      
        if (method_exists($this, $method)){
        $this->$method();
      }
  }
//--------------------------------------------------------------------------------------------//   
        public function episode(){
        $this->_episodesManager = new EpisodesManager;
    }    
        public function comment(){
        $this->_commentManager = new CommentsManager;
    }
        public function manga(){
        $this->_mangaManager = new MangasManager;
    }    
        public function user(){
        $this->_usersManager = new UsersManager;
    }
        public function arc(){
        $this->_arcsManager = new ArcsManager;
    } 
        public function personnage(){
        $this->_personnageManager = new PersonnageManager;
    } 
        public function idPost(){
            $idPost = $_POST['id'];
            if (filter_var($id, FILTER_VALIDATE_INT)) {
                $this->_idPostSecure = $idPost;
            } else {
                throw new \Exception("Error code interne");
            }
    } 
    
//--------------------------------------------------------------------------------------------//     
//----------------------POST PAGE ADMIN GestionArcEpisode-------------------------------------//    
//--------------------------------------------------------------------------------------------//
    public function AddArc(){
         $this->arc();  
         $this->_arcsManager->addArc($_POST['arc'],$_POST['content']);
            
         header('location: GestionArcEpisode');  
    } 
//--------------------------------------------------------------------------------------------// 
    public function DeleteArc(){
         $this->arc();
         $this->idPost();
         $this->_arcsManager->DeleteArc($this->_idPostSecure);
            
         $this->episode();  
         $this->_episodesManager->DeleteEpisodesAll($this->_idPostSecure);
            
         header('location: GestionArcEpisode');  
    }
//--------------------------------------------------------------------------------------------// 
    public function DeleteEpisode(){
            $this->episode();  
            $this->_episodesManager->DeleteEpisode($_POST['id']);         
            header('location: GestionArcEpisode');  
    }
//--------------------------------------------------------------------------------------------// 
    public function AddEpisode(){
            $this->episode();  
            $this->_episodesManager->AddEpisode($_POST['title'],$_POST['content'],$_POST['arc_id'],$_POST['manga_id'],$_POST['url']);         
            header('location: GestionArcEpisode');  
    }
//--------------------------------------------------------------------------------------------// 
    public function UpdateEpisode(){
            $this->episode();  
            $this->_episodesManager->UpdateEpisode($_POST['id'],$_POST['title'],$_POST['content'],$_POST['manga_id'],$_POST['url']);         
            header('location: GestionArcEpisode');  
    }

//--------------------------------------------------------------------------------------------//     
//---------------------------POST PAGE ADMIN GestionManga-------------------------------------//    
//--------------------------------------------------------------------------------------------//
     public function UpdateManga(){
 // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['file']) AND $_FILES['file']['error'] == 0){
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['file']['size'] <= 2000000)
        {
                
                unlink("public/images/manga/" . $_POST['lastFileName']);
            
                $infosfichier = pathinfo($_FILES['file']['name']);// le'extention du fichier envoye .jpg etc
            
                $extension_upload = $infosfichier['extension'];//on le met dans un tableau
                     
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');// les extention qu'on acceptes
            
		        $name = $infosfichier['filename'];// On recupere le nom du fichier envoye
            
		        $file = 'Time' .time(). 'Name' .$name. '.' .$extension_upload;
                //Nom du fichier qu'on lui donne Time du moment + name + nom du fichier + extention
                
                // Testons si l'extension du fichier est egale a celle que l'on autorise
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['file']['tmp_name'], 'public/images/manga/' . $file);
                }else{	            
                echo "<script>alert(\"L'extension du fichier n'est pas autorisée. Seuls les fichiers jpg, jpeg, png sont acceptés.\")</script>";
}
        }else{
                echo "<script>alert(\"Le fichier est trop volumineux (Poids limité à 4Mo)\")</script>";
		}
    }else{
   $file = $_POST['lastFileName'];
}
       
         $this->manga();  
         $this->_mangaManager->updateManga($_POST['id'], $_POST['title'], $_POST['content'], $file);
            
         header('location: GestionManga'); 
    } 
//--------------------------------------------------------------------------------------------//
     public function NewManga(){
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['file']) AND $_FILES['file']['error'] == 0){
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['file']['size'] <= 2000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['file']['name']);
            
                $extension_upload = $infosfichier['extension'];
            
                
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            
		        $name = $infosfichier['filename'];
            
		        $file = 'Time' .time(). 'Name' .$name. '.' .$extension_upload;
                
                // Testons si lextension du fichier
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['file']['tmp_name'], 'public/images/manga/' . $file);
                }else{	
            echo "<script>alert(\"L'extension du fichier n'est pas autorisée. Seuls les fichiers jpg, jpeg, png sont acceptés.\")</script>";
}
        }else{
echo "<script>alert(\"Le fichier est trop volumineux (Poids limité à 4Mo)\")</script>";
		}
    }else{
    $file = "imageexemple.jpg";
}

if ($_POST['title']){
    $title = $_POST['title'];
}else {
    $title = "Titre en cour de recherche :)";
}          
            
            
if ($_POST['content']){
    $content = $_POST['content'];
}else {
    $content = "Resumé en cour création :)";
}             
         $this->manga();  
         $this->_mangaManager->addManga($title,$content,$file);
            
         header('location: GestionManga');  
}       
//--------------------------------------------------------------------------------------------//  
     public function DeleteManga(){
         
         if($_POST['lastFileName'] != 'imageexemple.jpg'){
            unlink("public/images/manga/" . $_POST['lastFileName']);
         }
         $this->manga();  
         $this->_mangaManager->deleteManga($_POST['id']);
            
         header('location: GestionManga');  
    } 
//--------------------------------------------------------------------------------------------//     
//---------------------------POST PAGE ADMIN GestionPersonnage--------------------------------//    
//--------------------------------------------------------------------------------------------//
     public function UpdatePersonnage(){
 // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['file']) AND $_FILES['file']['error'] == 0){
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['file']['size'] <= 2000000)
        {
                
                unlink("public/images/personnage/" . $_POST['lastFileName']);
            
                $infosfichier = pathinfo($_FILES['file']['name']);// le'extention du fichier envoye .jpg etc
            
                $extension_upload = $infosfichier['extension'];//on le met dans un tableau
                     
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');// les extention qu'on acceptes
            
		        $name = $infosfichier['filename'];// On recupere le nom du fichier envoye
            
		        $file = 'Time' .time(). 'Name' .$name. '.' .$extension_upload;
                //Nom du fichier qu'on lui donne Time du moment + name + nom du fichier + extention
                
                // Testons si l'extension du fichier est egale a celle que l'on autorise
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['file']['tmp_name'], 'public/images/personnage/' . $file);
                }else{	            
                echo "<script>alert(\"L'extension du fichier n'est pas autorisée. Seuls les fichiers jpg, jpeg, png sont acceptés.\")</script>";
}
        }else{
                echo "<script>alert(\"Le fichier est trop volumineux (Poids limité à 4Mo)\")</script>";
		}
    }else{
   $file = $_POST['lastFileName'];
}
       
         $this->personnage();  
         $this->_personnageManager->updatePersonnage($_POST['id'], $_POST['title'], $_POST['content'], $file);
            
         header('location: GestionPersonnage'); 
    } 
//--------------------------------------------------------------------------------------------//
     public function NewPersonnage(){
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['file']) AND $_FILES['file']['error'] == 0){
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['file']['size'] <= 2000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['file']['name']);
            
                $extension_upload = $infosfichier['extension'];
            
                
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            
		        $name = $infosfichier['filename'];
            
		        $file = 'Time' .time(). 'Name' .$name. '.' .$extension_upload;
                
                // Testons si lextension du fichier
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['file']['tmp_name'], 'public/images/personnage/' . $file);
                }else{	
            echo "<script>alert(\"L'extension du fichier n'est pas autorisée. Seuls les fichiers jpg, jpeg, png sont acceptés.\")</script>";
}
        }else{
echo "<script>alert(\"Le fichier est trop volumineux (Poids limité à 4Mo)\")</script>";
		}
    }else{
    $file = "imageexemple.jpg";
}

if ($_POST['title']){
    $title = $_POST['title'];
}else {
    $title = "Titre en cour de recherche :)";
}          
            
            
if ($_POST['content']){
    $content = $_POST['content'];
}else {
    $content = "Resumé en cour création :)";
}             
         $this->personnage();  
         $this->_personnageManager->addPersonnage($title,$content,$file);
            
         header('location: GestionPersonnage');  
}       
//--------------------------------------------------------------------------------------------//  
     public function DeletePersonnage(){
         if($_POST['lastFileName'] != 'imageexemple.jpg'){
            unlink("public/images/personnage/" . $_POST['lastFileName']);
         }
         $this->personnage();  
         $this->_personnageManager->deletePersonnage($_POST['id']);
            
         header('location: GestionPersonnage');  
    }   
//--------------------------------------------------------------------------------------------//     
//---------------------------POST PAGE ADMIN Gestion Commentaire------------------------------//    
//--------------------------------------------------------------------------------------------//   
        public function DeleteComment(){
         $this->comment();  
         $this->_commentManager->DeleteComment($_POST['id']);
         header('location: Gestioncommentaire'); 
    }     
//--------------------------------------------------------------------------------------------//       
        public function ManageComment(){
         $this->comment();  
         $this->_commentManager->getReportComment($_POST['id'],"0");
         header('location: Gestioncommentaire');
    }   
//--------------------------------------------------------------------------------------------//
//-----------------------------------POST PAGE Episode---------------------------------------//    
//--------------------------------------------------------------------------------------------// 
        public function NewCommentEpisode(){
            $this->comment();  
            $this->_commentManager->AddComment($_POST['pseudo'], $_POST['content'], $_GET['id'],false,true);         
            header('location: Episode&id='.$_GET["id"]);  
    }    
//--------------------------------------------------------------------------------------------//
//-----------------------------------POST PAGE Manga---------------------------------------//    
//--------------------------------------------------------------------------------------------// 
        public function NewCommentManga(){
            $this->comment();  
            $this->_commentManager->AddComment($_POST['pseudo'], $_POST['content'], $_GET['id'],true,false);         
            header('location: Tome&id='.$_GET["id"]);  
    }        
//--------------------------------------------------------------------------------------------//
//----------------------------REPORT PAGE Manga and Episode-----------------------------------//    
//--------------------------------------------------------------------------------------------//    
        public function ReportComment(){    
            $this->comment();  
            $this->_commentManager->getReportComment($_POST['report'],"1");
            header('location: '.$_GET["url"].'&id='.$_GET["id"]);
    } 
//--------------------------------------------------------------------------------------------//
//-----------------------------------POST PAGE Contact----------------------------------------//    
//--------------------------------------------------------------------------------------------//
        public function Contact(){
       
        $from = $_POST['email'];
 
        $to = "g.durupt88@hotmail.fr";
 
        $subject =  $_POST['objet'] ;
 
        $message = $_POST['message'];
 
        $headers = "From: " .$from;
 
        mail($to,$subject,$message, $headers);
    
        header('location: Contact'); 
      
    } 
//--------------------------------------------------------------------------------------------//
//-----------------------------------POST PAGE Users------------------------------------------//    
//--------------------------------------------------------------------------------------------//    
        public function ConnectUsers(){
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
            header('location: Accueil');
    }  
//--------------------------------------------------------------------------------------------//
        public function addUsers(){
            $this->user();
            $this->_usersManager->multiUsers();   
    }  
//--------------------------------------------------------------------------------------------//
//-----------------------------------POST PAGE Compte------------------------------------------//    
//--------------------------------------------------------------------------------------------//
        public function ChangePseudo(){
            
            $pseudo = $_POST['pseudo'];
            $email = $_SESSION['email'];
            
            $_SESSION['pseudo'] = $_POST['pseudo'];
            
            $col = "pseudo";
            
            $this->user();
            $this->_usersManager->UpdatePseudo($pseudo,$email,$col);
            header('location: Compte');
    }
//--------------------------------------------------------------------------------------------//
        public function ChangeEmail(){
                     
            $change = $_POST['email'];
            $email = $_SESSION['email'];
            
            $_SESSION['email'] = $_POST['email'];
            
            $col = "email";
            
            $this->user();
            $this->_usersManager->UpdatePseudo($change,$email,$col);
            header('location: Compte');
    }
//--------------------------------------------------------------------------------------------//
        public function ChangePass(){
            
            $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            $email = $_SESSION['email'];
            
            $_SESSION['password'] = $_POST['password'];
            
            $col = "password";
            
            $this->user();
            $this->_usersManager->UpdatePseudo($pass_hache,$email,$col);
            header('location: Compte');
    }
//--------------------------------------------------------------------------------------------//
}
