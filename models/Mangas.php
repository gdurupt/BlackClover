<?php
class Mangas{
//--------------------------------------------------------------------------------------------//        
  private $_id;
  private $_title;
  private $_text;
  private $_image;
  private $_nbmangas;
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
 
    public function setTitle($title)
  {
    if (is_string($title)) {
      $this->_title = $title;
    }
  }
    public function setText($text)
  {
    if (is_string($text)) {
      $this->_text = $text;
    }
  }
    public function setImage($image)
  {
    if (is_string($image)) {
      $this->_image = $image;
    }
  }
    public function setNbmangas($nbmangas)
  {
    $nbmangas = (int) $nbmangas;
    if ($nbmangas > 0) {
      $this->_nbmangas = $nbmangas;
    }
  }  
//--------------------------------------------------------------------------------------------//   
    public function id()
  {
    return $this->_id;
  }
    
    public function title()
  {
    return $this->_title;
  }
    
    public function text()
  {
    return $this->_text;
  }
    
    public function image()
  {
    return $this->_image;
  }
    public function nbmangas()
  {
    return $this->_nbmangas;
  }

}