<?php

class EpisodesManager extends Model{
//--------------------------------------------------------------------------------------------//    
    public function getAll(){
        $update = 'SELECT * FROM episodes ORDER by id';
        $execute = NULL;
        return $this->selectTable('Episodes', $update, $execute);
    }
//--------------------------------------------------------------------------------------------//       
    public function getOne($id){       
        $update = 'SELECT * FROM episodes WHERE id = ?';
        $execute = array($id);
        return $this->selectTable('Episodes', $update, $execute);     
    }
//--------------------------------------------------------------------------------------------//
    public function getCountEpisode(){   
        
        $update = 'SELECT COUNT(*) AS nbEpisodes FROM episodes';
        $execute = NULL;
        return $this->selectTable('Episodes',$update, $execute);   
    }
 //--------------------------------------------------------------------------------------------//
    public function getLast(){
        $update = 'SELECT * FROM episodes ORDER by id DESC limit 1';
        $execute = NULL;
        return $this->selectTable('Episodes', $update, $execute);     
    }
//--------------------------------------------------------------------------------------------//
    public function getEpisodesSUBSTRING(){       
        $update = 'SELECT id, SUBSTRING(title FROM 1 FOR 9) as title, arc_id FROM episodes';
        $execute = NULL;
        return $this->selectTable('Episodes', $update, $execute);      
    }
//--------------------------------------------------------------------------------------------//    
    public function DeleteEpisodesAll($id){ 
             
        $where = " WHERE arc_id = ";
        
        return $this->deleteTable('episodes',$where, $id);   
    }
//--------------------------------------------------------------------------------------------//
        public function DeleteEpisode($id){ 
             
        $where = " WHERE id = ";
        
        return $this->deleteTable('episodes',$where, $id);   
    }
//--------------------------------------------------------------------------------------------//    
    public function AddEpisode($title, $content, $arc_id, $manga_id){ 
             
        $update = '(title, content, arc_id, manga_id,url_video) VALUES(:title, :content, :arc_id, :manga_id,"null")';
        $execute =array(
	       'title' => $title,
	       'content' => $content,
           'arc_id' => $arc_id,
           'manga_id' => $manga_id
        );
        return $this->addTable('episodes', $update, $execute);
    }
//--------------------------------------------------------------------------------------------//  
    public function UpdateEpisode($id,$title,$content,$manga_id){             
        $update = ' SET title = :title, content = :content, manga_id = :manga_id WHERE id = :id';
        $execute = array(
	       'title' => $title,
	       'content' => $content,
           'manga_id' => $manga_id,
           'id' => $id
	);      
        return $this->updateTable('episodes', $update, $execute);      
    }
//--------------------------------------------------------------------------------------------//  
}