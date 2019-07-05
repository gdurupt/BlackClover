<?php
class Comments{
//--------------------------------------------------------------------------------------------//        
  private $_id;
  private $_pseudo;
  private $_content;
  private $_comment_date;
  private $_manga_id;
  private $_episode_id; 
  private $_report;
  private $_nbreport;
  private $_nbcomments;
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

  public function setContent($content)
  {
    if (is_string($content)) {
      $this->_content = $content;
    }
  }

  public function setComment_date($comment_date)
  {
    $this->_comment_date = $comment_date;
  }
    
    public function setReport($report)
  {
    if (is_string($report)) {
      $this->_report = $report;
    }
  }
 
    public function setNbreport($nbreport)
  {
    $nbreport = (int) $nbreport;
    if ($nbreport > 0) {
      $this->_nbreport = $nbreport;
    }
  }
    public function setManga_id($manga_id)
  {
    $manga_id = (int) $manga_id;
    if ($manga_id > 0) {
      $this->_manga_id = $manga_id;
    }
  }
    public function setEpisode_id($episode_id)
  {
    $episode_id = (int) $episode_id;
    if ($episode_id > 0) {
      $this->_episode_id = $episode_id;
    }
  }
    public function setNbcomments($nbcomments)
  {
    $nbcomments = (int) $nbcomments;
    if ($nbcomments > 0) {
      $this->_nbcomments = $nbcomments;
    }
  }
//------------------------------------------------------------------------------------------//   
    public function id()
  {
    return $this->_id;
  }
    
    public function pseudo()
  {
    return $this->_pseudo;
  }
    
    public function content()
  {
    return $this->_content;
  }
    
    public function comment_date()
  {
    return $this->_comment_date;
  }
    
    public function report()
  {
    return $this->_report;
  }
    
     public function nbreport()
  {
    return $this->_nbreport;
  }
    
    public function manga_id()
  {
    return $this->_manga_id;
  }
    public function episode_id()
  {
    return $this->_episode_id;
  }
    public function nbcomments()
  {
    return $this->_nbcomments;
  }
}
