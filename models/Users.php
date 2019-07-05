<?php
class Users{
//--------------------------------------------------------------------------------------------//        
  private $_id;
  private $_pseudo;
  private $_email;
  private $_password;
  private $_admin;
  private $_nbUsers;
//--------------------------------------------------------------------------------------------//          
   public function __construct(array $data)
  {
    $this->hydrate($data);
  }
//--------------------------------------------------------------------------------------------//
  public function hydrate(array $data)
  {
    foreach ($data as $key => $value) {
      $method = 'set'.ucfirst($key);
      
        if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }
//--------------------------------------------------------------------------------------------//          
  public function setId($id)
  {
    $id = (int) $id;
    if ($id > 0) {
      $this->_id = $id;
    }
  }
 
    public function setPseudo($pseudo)
  {
    if (is_string($pseudo)) {
      $this->_pseudo = $pseudo;
    }
  }
    public function setEmail($email)
  {
    if (is_string($email)) {
      $this->_email = $email;
    }
  }
    
      public function setPassword($password)
  {
    if (is_string($password)) {
      $this->_password = $password;
    }
  }
    public function setAdmin($admin)
  {
      $this->_admin = $admin;
  }
    public function setNbUsers($nbUsers)
  {
    $nbUsers = (int) $nbUsers;
    if ($nbUsers > 0) {
      $this->_nbUsers = $nbUsers;
    }
  }  
 
//--------------------------------------------------------------------------------------------//   
    public function id()
  {
    return $this->_id;
  }
    
    public function pseudo()
  {
    return $this->_pseudo;
  }
    
    public function email()
  {
    return $this->_email;
  }
    public function password()
  {
    return $this->_password;
  }
    public function admin()
  {
    return $this->_admin;
  }
    public function nbUsers()
  {
    return $this->_nbUsers;
  }

}