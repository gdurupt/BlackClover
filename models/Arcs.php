<?php
class Arcs{
//--------------------------------------------------------------------------------------------//        
  private $_id;
  private $_title;
  private $_content;
  private $_nbArcs;
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
    public function setContent($content)
  {
    if (is_string($content)) {
      $this->_content = $content;
    }
  }
    public function setNbArcs($nbArcs)
  {
    $nbArcs = (int) $nbArcs;
    if ($nbArcs > 0) {
      $this->_nbArcs = $nbArcs;
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
    
    public function content()
  {
    return $this->_content;
  }
    public function nbArcs()
  {
    return $this->_nbArcs;
  }

}