<?php
class Episodes{
//--------------------------------------------------------------------------------------------//        
  private $_id;
  private $_title;
  private $_content;
  private $_arc_id;
  private $_manga_id;
  private $_url_video;
  private $_nbEpisodes;
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
    
    public function setArc_id($arc_id)
  {
    $arc_id = (int) $arc_id;
    if ($arc_id > 0) {
      $this->_arc_id = $arc_id;
    }
  }
    public function setManga_id($manga_id)
  {
    $manga_id = (int) $manga_id;
    if ($manga_id > 0) {
      $this->_manga_id = $manga_id;
    }
  }
    public function setUrl_video($url_video)
  {
    if (is_string($url_video)) {
      $this->_url_video = $url_video;
    }
  }
    public function setNbEpisodes($nbEpisodes)
  {
    $nbEpisodes = (int) $nbEpisodes;
    if ($nbEpisodes > 0) {
      $this->_nbEpisodes = $nbEpisodes;
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
        
    public function arc_id()
  {
    return $this->_arc_id;
  }
        
    public function manga_id()
  {
    return $this->_manga_id;
  }
        
    public function url_video()
  {
    return $this->_url_video;
  }
    public function nbEpisodes()
  {
    return $this->_nbEpisodes;
  }


}