<?php
class Ratings{
//--------------------------------------------------------------------------------------------//        
  private $_id;
  private $_id_users;
  private $_ratings;
  private $_id_episodes;
  private $_id_mangas;
  private $_notation;
  private $_nbRatings;
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
 
    public function setId_users($id_users)
  {
    $id_users = (int) $id_users;
    if ($id_users > 0) {
      $this->_id_users = $id_users;
    }
  }
    public function setRatings($ratings)
  {
    $ratings = (int) $ratings;
    if ($ratings > 0) {
      $this->_ratings = $ratings;
    }
  }
    public function setId_manga($id_mangas)
  {
    $id_mangas = (int) $id_mangas;
    if ($id_mangas > 0) {
      $this->_id_mangas = $id_mangas;
    }
  }
    public function setId_episode($id_episodes)
  {
    $id_episodes = (int) $id_episodes;
    if ($id_episodes > 0) {
      $this->_id_episodes = $id_episodes;
    }
  }
    
    public function setNotation($notation)
  {
    $notation = (int) $notation;
    if ($notation > 0) {
      $this->_notation = $notation;
    }
  }
    
    public function setNbRatings($nbRatings)
  {
    $nbRatings = (int) $nbRatings;
    if ($nbRatings > 0) {
      $this->_nbRatings = $nbRatings;
    }
  }
  
//--------------------------------------------------------------------------------------------//   
    public function id()
  {
    return $this->_id;
  }
    
    public function id_users()
  {
    return $this->_id_users;
  }
    
    public function ratings()
  {
    return $this->_ratings;
  }
    
    public function id_mangas()
  {
    return $this->_id_mangas;
  }
    
    public function id_episodes()
  {
    return $this->_id_episodes;
  }
    
    public function notation()
  {
    return $this->_notation;
  }
    
    public function nbRatings()
  {
    return $this->_nbRatings;
  }

}