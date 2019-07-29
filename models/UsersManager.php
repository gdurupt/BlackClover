<?php

class UsersManager extends Model{
//--------------------------------------------------------------------------------------------//       
    public function getUsers($email, $password){       
        return $this->secureUsers('users', $email, $password); 
    }
//--------------------------------------------------------------------------------------------//
    public function addUsers($pseudo,$email,$password){ 
                 
        $pass_hache = password_hash($pass, PASSWORD_DEFAULT);

        $update = ' (pseudo, email, password, admin) VALUES(:pseudo, :email, :password, false)';
        $execute =array(
            'pseudo' => $pseudo,
            'email' => $email,
            'password' => $pass_hache
                );

        $_SESSION['email'] = $email;
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['password'] = $password;
        
        return $this->addTable('users', $update, $execute);

    }
//--------------------------------------------------------------------------------------------//       
    public function multiUsers($pseudo,$email){       
        $update = 'SELECT * FROM users WHERE pseudo = ? OR email = ?';
        $execute = array($pseudo,$email);
        return $this->multiUser($update, $execute, true);     
    }
//--------------------------------------------------------------------------------------------//
    public function getCountUsers(){   
        
        $update = 'SELECT COUNT(*) AS nbUsers FROM users';
        $execute = NULL;
        return $this->selectTable('Users',$update, $execute);   
    }
//--------------------------------------------------------------------------------------------// 
    public function UpdatePseudo($change, $email,$col){             
        $update = ' SET '.$col.' = :change WHERE email = :email';
        $execute = array(
	       'change' => $change,
            'email' => $email
	);      
        return $this->updateTable('users', $update, $execute);      
    }
//--------------------------------------------------------------------------------------------// 
}