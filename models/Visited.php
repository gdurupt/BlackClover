<?php
class Visited{
//--------------------------------------------------------------------------------------------//        
  private $_visited;
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
  public function setVisited($visited)
  {
    $visited = (int) $visited;
    if ($visited > 0) {
      $this->_visited = $visited;
    }
      $_SESSION['visited'] = $visited;
  }
//--------------------------------------------------------------------------------------------//   
    public function visited()
  {
    return $this->_visited;
  }
}