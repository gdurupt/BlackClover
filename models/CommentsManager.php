<?php

class CommentsManager extends Model{
//--------------------------------------------------------------------------------------------//    
    public function getCommentOfPage($manga,$episode){  
        
        if($manga == true){
            $update = 'SELECT * FROM comments WHERE manga_id = ? ORDER by id';
        }else if($episode == true){
            $update = 'SELECT * FROM comments WHERE episode_id = ? ORDER by id';
        }
  
        $execute = array($_GET['id']);
        return $this->selectTable('Comments',$update, $execute);    
    }
//--------------------------------------------------------------------------------------------//    
    public function addComment($pseudo, $content, $id, $manga, $episode){ 
        
        if($manga == true){
            $manga_id = $id;
            $episode_id = 0;
        }else if($episode == true){
            $episode_id = $id;
            $manga_id = 0;
        }
             
        $update = '(pseudo, content, comment_date, manga_id, report, episode_id) VALUES(:pseudo, :content, NOW(), :manga_id, 0, :episode_id)';
        $execute =array(
	       'pseudo' => $pseudo,
	       'content' => $content,
           'manga_id' => $manga_id,
           'episode_id' => $episode_id
        );
        return $this->addTable('comments', $update, $execute);
    }
 //--------------------------------------------------------------------------------------------//   
    public function getAllComment(){       
        $update = 'SELECT * FROM comments';
        $execute = NULL;
        return $this->selectTable('Comments',$update, $execute);     
    }
 //--------------------------------------------------------------------------------------------//   
    public function getDeleteComment($id){       
        $where = " WHERE id = ";
        
        return $this->deleteTable('Comments',$where, $id);     
    }
 //--------------------------------------------------------------------------------------------//    
        public function getDeleteAllComment($id){ 
        $where = " WHERE page = ";   
            
        return $this->deleteTable('Comments',$where, $id);     
    }
 //--------------------------------------------------------------------------------------------// 
    public function getReportComment($id,$obj){       
        $update = ' SET report = :report WHERE id = '.$id;
        $execute =array(
	       'report' => $obj
        );
        return $this->updateTable('Comments', $update, $execute);     
    }
 //--------------------------------------------------------------------------------------------//   
    public function getCountComment($report){   
        
        if($report == true){
            $update = 'SELECT COUNT(*) AS nbreport FROM comments WHERE report > 0';
        }else if($report == false){
            $update = 'SELECT COUNT(*) AS nbcomments FROM comments';
        }
        
        $execute = NULL;
        return $this->selectTable('Comments',$update, $execute);   
    }
 //--------------------------------------------------------------------------------------------//   
}