<?php

class UsersManager extends Model{
//--------------------------------------------------------------------------------------------//       
    public function getUsers($email, $password){       
        return $this->secureUsers('users', $email, $password); 
    }
//--------------------------------------------------------------------------------------------//
    public function addUsers($pseudo,$email,$pass){ 
                 
        $pass_hache = password_hash($pass, PASSWORD_DEFAULT);

        $update = ' (pseudo, email, password, admin) VALUES(:pseudo, :email, :password, false)';
        $execute =array(
            'pseudo' => $pseudo,
            'email' => $email,
            'password' => $pass_hache
                );
        
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['pseudo'] = $_POST['pseudo'];
        $_SESSION['password'] = $_POST['password'];
        
        return $this->addTable('users', $update, $execute);

    }
//--------------------------------------------------------------------------------------------//       
    public function multiUsers(){       
        $update = 'SELECT * FROM users WHERE pseudo = ? OR email = ?';
        $execute = array($_POST['pseudo'],$_POST['email']);
        return $this->multiUser($update, $execute, true);     
    }
//--------------------------------------------------------------------------------------------//
    public function getCountUsers(){   
        
        $update = 'SELECT COUNT(*) AS nbUsers FROM users';
        $execute = NULL;
        return $this->selectTable('Users',$update, $execute);   
    }
    
    
             
}