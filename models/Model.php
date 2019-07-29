<?php

abstract class Model
{

  private static $_bdd;
//--------------------------------------------------------------------------------------------//     
//--------------------------------           BDD          ------------------------------------//    
//--------------------------------------------------------------------------------------------//
  private static function setBdd(){
    self::$_bdd = new PDO('mysql:host=localhost;dbname=blackclover;charset=utf8', 'root', '');
    self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  }
//--------------------------------------------------------------------------------------------//     
//--------------------------------Recuperation de la BDD--------------------------------------//    
//--------------------------------------------------------------------------------------------//
  protected function getBdd(){
    if (self::$_bdd == null) {
      self::setBdd();
      return self::$_bdd;
    }
  }
//--------------------------------------------------------------------------------------------//     
//--------------------------------    MODEL   SELECT     -------------------------------------//    
//--------------------------------------------------------------------------------------------//
  protected function selectTable($obj, $select, $execute){
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare($select);
    $req->execute($execute);

    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {

        $var[] = new $obj($data);
    }

    return $var;
    $req->closeCursor();
  }

//--------------------------------------------------------------------------------------------//     
//--------------------------------    MODEL   SELECT Rating    -------------------------------------//    
//--------------------------------------------------------------------------------------------//
  protected function selectRatings($select, $execute){
    $this->getBdd();
    $req = self::$_bdd->prepare($select);
    $req->execute($execute);

        $resultat = $req->fetch();
        
        if (!$resultat){     
            $_SESSION['rating'] = 0;
        }else{
            $_SESSION['rating'] = 1;
        }
  }
//--------------------------------------------------------------------------------------------//     
//--------------------------------    MODEL   INSERT     -------------------------------------//    
//--------------------------------------------------------------------------------------------//   
    protected function addTable($table, $insert, $execute){
    $this->getBdd();
    $req = self::$_bdd->prepare('INSERT INTO '.$table.$insert);
    $req->execute($execute);
  }
//--------------------------------------------------------------------------------------------//     
//--------------------------------MODEL Secure pass & login-----------------------------------//    
//--------------------------------------------------------------------------------------------//   
    protected function multiUser($select, $execute){
            
       $this->getBdd();
        $req = self::$_bdd->prepare($select);
        $req->execute($execute);
           
        $resultat = $req->fetch();
        
        if (!$resultat){     
            UsersManager::addUsers($_POST['pseudo'],$_POST['email'],$_POST['password']);
            header('location: Accueil');
        }else{
            $_SESSION['alert'] = "Error";
            header('location: Connection');
    }
   }

    protected function secureUsers($table, $email, $password){
    
        $this->getBdd();
        $req = self::$_bdd->prepare('SELECT * FROM '.$table.' WHERE email = :email');
        $req->execute(array(
        'email' => $email));
        $resultat = $req->fetch();

        $isPasswordCorrect = password_verify($password, $resultat['password']);

        if (!$resultat){     
            header('location: Connection');
        }else{
         if ($isPasswordCorrect){
             $_SESSION['admin'] = $resultat['admin'];
             $_SESSION['pseudo'] = $resultat['pseudo'];
             $_SESSION['id'] = $resultat['id'];
            }else{
             header('location: Connection');
    }
   }
  }
//--------------------------------------------------------------------------------------------//     
//--------------------------------     MODEL  UPDATE     -------------------------------------//    
//--------------------------------------------------------------------------------------------//  
    protected function updateTable($table, $update, $execute){
    $this->getBdd();
    $req = self::$_bdd->prepare('UPDATE '.$table.$update);
    $req->execute($execute);
  }
//--------------------------------------------------------------------------------------------//     
//--------------------------------     MODEL DELETE      -------------------------------------//    
//--------------------------------------------------------------------------------------------//    
    protected function deleteTable($table, $where, $id){
    $this->getBdd();
    $req = self::$_bdd->prepare('DELETE FROM '.$table.$where.$id);
    $req->execute();
  }
}
?>
