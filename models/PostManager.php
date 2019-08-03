<?php

class PostManager{
//--------------------------------------------------------------------------------------------//      
    private $_episodesManager;
    private $_commentManager;
    private $_mangaManager;
    private $_usersManager;
    private $_arcsManager;
    private $_personnageManager;
    //--------------------------------------------------------------------------------------------// 
    private $_idPostSecure;
    private $_titlePostSecure;
    private $_contentPostSecure;
    private $_arcPostSecure;
    private $_arcIdPostSecure;
    private $_mangaIdPostSecure;
    private $_urlPostSecure;
    private $_lastFileNamePostSecure;
    private $_pseudoPostSecure;
    private $_reportPostSecure;
    private $_emailPostSecure;
    private $_objetPostSecure;
    private $_messagePostSecure;
    private $_passwordPostSecure;
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
            $post = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);           
            $this->_idPostSecure = $post;
    }
        public function titlePost(){
            $post = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);           
            $this->_titlePostSecure = $post;
    }
        public function contentPost(){
            $post = filter_input(INPUT_POST, "content", FILTER_SANITIZE_STRING);           
            $this->_contentPostSecure = $post;
    }
        public function arcPost(){
            $post = filter_input(INPUT_POST, "arc", FILTER_SANITIZE_NUMBER_INT);           
            $this->_arcPostSecure = $post;
    }
        public function arcIdPost(){
            $post = filter_input(INPUT_POST, "arc_id", FILTER_SANITIZE_NUMBER_INT);           
            $this->_arcIdPostSecure = $post;
    }
        public function mangaIdPost(){
            $post = filter_input(INPUT_POST, "manga_id", FILTER_SANITIZE_NUMBER_INT);          
            $this->_mangaIdPostSecure = $post;
    }
        public function urlPost(){
            $post = filter_input(INPUT_POST, "url", FILTER_SANITIZE_STRING);          
            $this->_urlPostSecure = $post;
    }
        public function lastfileNamePost(){
            $post = filter_input(INPUT_POST, "lastFileName", FILTER_SANITIZE_STRING);           
            $this->_lastFileNamePostSecure = $post;
    }
        public function pseudoPost(){
            $post = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_STRING);           
            $this->_pseudoPostSecure = $post;
    }
        public function reportPost(){
            $post = filter_input(INPUT_POST, "report", FILTER_SANITIZE_NUMBER_INT);            
            $this->_reportPostSecure = $post;
    }
        public function emailPost(){
            $post = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);           
            $this->_emailPostSecure = $post;
    }
        public function objetPost(){
            $post = filter_input(INPUT_POST, "objet", FILTER_SANITIZE_STRING);           
            $this->_objetPostSecure = $post;
    }
        public function messagePost(){
            $post = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);           
            $this->_messagePostSecure = $post;
    }
        public function passwordPost(){
            $post = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);           
            $this->_passwordPostSecure = $post;
    }
     
//--------------------------------------------------------------------------------------------//     
//----------------------POST PAGE ADMIN GestionArcEpisode-------------------------------------//    
//--------------------------------------------------------------------------------------------//
    public function AddArc(){
         $this->arc();
         $this->arcPost();
         $this->contentPost();
         $this->_arcsManager->addArc($this->_arcPostSecure,$this->_contentPostSecure);
            
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
            $this->idPost();
            $this->_episodesManager->DeleteEpisode($this->_idPostSecure);         
            header('location: GestionArcEpisode');  
    }
//--------------------------------------------------------------------------------------------// 
    public function AddEpisode(){
            $this->episode();
            $this->titlePost();
            $this->contentPost();
            $this->arcIdPost();
            $this->mangaIdPost();
            $this->urlPost();
            $this->_episodesManager->AddEpisode($this->_titlePostSecure,$this->_contentPostSecure,$this->_arcIdPostSecure,$this->_mangaIdPostSecure,$this->_urlPostSecure);         
            header('location: GestionArcEpisode');  
    }
//--------------------------------------------------------------------------------------------// 
    public function UpdateEpisode(){
            $this->episode();
            $this->idPost();
            $this->titlePost();
            $this->contentPost();
            $this->mangaIdPost();
            $this->urlPost();
            $this->_episodesManager->UpdateEpisode($this->_idPostSecure,$this->_titlePostSecure,$this->_contentPostSecure,$this->_mangaIdPostSecure,$this->_urlPostSecure);         
            header('location: GestionArcEpisode');  
    }

//--------------------------------------------------------------------------------------------//     
//---------------------------POST PAGE ADMIN GestionManga-------------------------------------//    
//--------------------------------------------------------------------------------------------//
     public function UpdateManga(){
         $this->idPost();
         $this->titlePost();
         $this->contentPost();
         $this->manga();
         $this->lastFileNamePost();
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
   $file = $this->_lastFileNamePostSecure;
}  
         $this->_mangaManager->updateManga($this->_idPostSecure, $this->_titlePostSecure, $this->_contentPostSecure, $file);
            
         header('location: GestionManga'); 
    } 
//--------------------------------------------------------------------------------------------//
     public function NewManga(){
         $this->titlePost();
         $this->contentPost();
         $this->manga();
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

if ($this->_titlePostSecure){
    $title = $this->_titlePostSecure;
}else {
    $title = "Titre en cour de recherche :)";
}          
            
            
if ($this->_contentPostSecure){
    $content = $this->_contentPostSecure;
}else {
    $content = "Resumé en cour création :)";
}              
         $this->_mangaManager->addManga($title,$content,$file);
            
         header('location: GestionManga');  
}
//--------------------------------------------------------------------------------------------//  
     public function DeleteManga(){
         $this->idPost();
         $this->lastFileNamePost();
         if($this->_lastFileNamePostSecure != 'imageexemple.jpg'){
            unlink("public/images/manga/" . $this->_lastFileNamePostSecure);
         }
         $this->manga();  
         $this->_mangaManager->deleteManga($this->_idPostSecure);
            
         header('location: GestionManga');  
    } 
//--------------------------------------------------------------------------------------------//     
//---------------------------POST PAGE ADMIN GestionPersonnage--------------------------------//    
//--------------------------------------------------------------------------------------------//
     public function UpdatePersonnage(){
         $this->idPost();
         $this->lastFileNamePost();
         $this->titlePost();
         $this->contentPost();
         $this->personnage();  
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
   $file = $this->_lastFileNamePostSecure;
} 
         $this->_personnageManager->updatePersonnage($this->_idPostSecure, $this->_titlePostSecure, $this->_contentPostSecure, $file);
            
         header('location: GestionPersonnage'); 
    } 
//--------------------------------------------------------------------------------------------//
     public function NewPersonnage(){
         $this->titlePost();
         $this->contentPost();
         $this->personnage(); 
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

if ($this->_titlePostSecure){
    $title = $this->_titlePostSecure;
}else {
    $title = "Titre en cour de recherche :)";
}          
            
            
if ($this->_contentPostSecure){
    $content = $this->_contentPostSecure;
}else {
    $content = "Resumé en cour création :)";
}             
         $this->personnage();  
         $this->_personnageManager->addPersonnage($title,$content,$file);
            
         header('location: GestionPersonnage');  
}       
//--------------------------------------------------------------------------------------------//  
     public function DeletePersonnage(){
         $this->idPost();
         $this->lastFileNamePost();
         if($this->_lastFileNamePostSecure != 'imageexemple.jpg'){
            unlink("public/images/personnage/" . $this->_lastFileNamePostSecure);
         }
         $this->personnage();  
         $this->_personnageManager->deletePersonnage($this->_idPostSecure);
            
         header('location: GestionPersonnage');  
    }   
//--------------------------------------------------------------------------------------------//     
//---------------------------POST PAGE ADMIN Gestion Commentaire------------------------------//    
//--------------------------------------------------------------------------------------------//   
        public function DeleteComment(){
         $this->idPost();
         $this->comment();  
         $this->_commentManager->DeleteComment($this->_idPostSecure);
         header('location: Gestioncommentaire'); 
    }     
//--------------------------------------------------------------------------------------------//       
        public function ManageComment(){
         $this->idPost();  
         $this->comment();  
         $this->_commentManager->getReportComment($this->_idPostSecure,"0");
         header('location: Gestioncommentaire');
    }   
//--------------------------------------------------------------------------------------------//
//-----------------------------------POST PAGE Episode---------------------------------------//    
//--------------------------------------------------------------------------------------------// 
        public function NewCommentEpisode(){
            $this->comment();
            $this->pseudoPost();
            $this->contentPost();
            $this->_commentManager->AddComment($this->_pseudoPostSecure, $this->_contentPostSecure, $_GET['id'],false,true);         
            header('location: Episode&id='.$_GET["id"]);  
    }    
//--------------------------------------------------------------------------------------------//
//-----------------------------------POST PAGE Manga---------------------------------------//    
//--------------------------------------------------------------------------------------------// 
        public function NewCommentManga(){
            $this->comment(); 
            $this->pseudoPost();
            $this->contentPost();
            $this->_commentManager->AddComment($this->_pseudoPostSecure, $this->_contentPostSecure, $_GET['id'],true,false);         
            header('location: Tome&id='.$_GET["id"]);  
    }        
//--------------------------------------------------------------------------------------------//
//----------------------------REPORT PAGE Manga and Episode-----------------------------------//    
//--------------------------------------------------------------------------------------------//    
        public function ReportComment(){    
            $this->comment();
            $this->reportPost();
            $this->_commentManager->getReportComment($this->_reportPostSecure,"1");
            header('location: '.$_GET["url"].'&id='.$_GET["id"]);
    } 
//--------------------------------------------------------------------------------------------//
//-----------------------------------POST PAGE Contact----------------------------------------//    
//--------------------------------------------------------------------------------------------//
        public function Contact(){
        $this->emailPost();
        $this->objetPost();
        $this->messagePost();
            
        $from = $this->_emailPostSecure;
 
        $to = "g.durupt88@hotmail.fr";
 
        $subject = $this->_objetPostSecure;
 
        $message = $this->_messagePostSecure;
 
        $headers = "From: " .$from;
 
        mail($to,$subject,$message, $headers);
    
        header('location: Contact'); 
      
    } 
//--------------------------------------------------------------------------------------------//
//-----------------------------------POST PAGE Users------------------------------------------//    
//--------------------------------------------------------------------------------------------//    
        public function ConnectUsers(){
            $this->emailPost();
            $this->passwordPost();
            
            $_SESSION['email'] = $this->_emailPostSecure;
            $_SESSION['password'] = $this->_passwordPostSecure;
            header('location: Accueil');
    }  
//--------------------------------------------------------------------------------------------//
        public function addUsers(){
            $this->user();
            $this->emailPost();
            $this->pseudoPost();
            $this->_usersManager->multiUsers($this->_pseudoPostSecure,$this->_emailPostSecure);   
    }
//--------------------------------------------------------------------------------------------//
        public function UsersLost(){
            $this->user();
            $this->emailPost();
            $this->_usersManager->UsersLost($this->_emailPostSecure);   
    }
//--------------------------------------------------------------------------------------------//
//-----------------------------------POST PAGE Compte------------------------------------------//    
//--------------------------------------------------------------------------------------------//
        public function ChangePseudo(){
            $this->pseudoPost();

            $email = $_SESSION['email'];
            
            $_SESSION['pseudo'] = $this->_pseudoPostSecure;
            
            $col = "pseudo";
            
            $this->user();
            $this->_usersManager->UpdatePseudo($this->_pseudoPostSecure,$email,$col);
            header('location: Compte');
    }
//--------------------------------------------------------------------------------------------//
        public function ChangeEmail(){
            $this->emailPost();

            $email = $_SESSION['email'];
            
            $_SESSION['email'] = $this->_emailPostSecure;
            
            $col = "email";
            
            $this->user();
            $this->_usersManager->UpdatePseudo($this->_emailPostSecure,$email,$col);
            header('location: Compte');
    }
//--------------------------------------------------------------------------------------------//
        public function ChangePass(){
            $this->passwordPost();
            
            $pass_hache = password_hash($this->_passwordPostSecure, PASSWORD_DEFAULT);
            
            $email = $_SESSION['email'];
            
            $_SESSION['password'] = $this->_passwordPostSecure;
            
            $col = "password";
            
            $this->user();
            $this->_usersManager->UpdatePseudo($pass_hache,$email,$col);
            header('location: Compte');
    }
//--------------------------------------------------------------------------------------------//
}
