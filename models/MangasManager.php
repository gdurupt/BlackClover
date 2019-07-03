<?php

class MangasManager extends Model{
//--------------------------------------------------------------------------------------------//    
    public function getAll(){
        $update = 'SELECT * FROM mangas ORDER by id';
        $execute = NULL;
        return $this->selectTable('Mangas', $update, $execute);     
    }
//--------------------------------------------------------------------------------------------//       
    public function getOne($id){       
        $update = 'SELECT * FROM mangas WHERE id = ?';
        $execute = array($id);
        return $this->selectTable('Mangas', $update, $execute);     
    }
//--------------------------------------------------------------------------------------------//
    public function getCountManga(){   
        
        $update = 'SELECT COUNT(*) AS nbMangas FROM Mangas';
        $execute = NULL;
        return $this->selectTable('Mangas',$update, $execute);   
    }
 //--------------------------------------------------------------------------------------------//
    public function getLast(){
        $update = 'SELECT * FROM mangas ORDER by id DESC limit 1';
        $execute = NULL;
        return $this->selectTable('Mangas', $update, $execute);     
    }
//--------------------------------------------------------------------------------------------//
    public function addManga($title,$content,$file){ 
  
        $update = '(title, text, image) VALUES(:title, :content, :file)';
        $execute =array(
	       'title' => $title,
	       'content' => $content,
           'file' => $file
        );
        return $this->addTable('mangas', $update, $execute);
    }
//--------------------------------------------------------------------------------------------//  
    public function updateManga($id, $title, $content, $file){             
        $update = ' SET title = :title, text = :content, image = :file WHERE id = :id';
        $execute = array(
	       'title' => $title,
	       'content' => $content,
           'file' => $file,
           'id' => $id
	);      
        return $this->updateTable('mangas', $update, $execute);      
    }
//--------------------------------------------------------------------------------------------//   
        public function deleteManga($id){       
        $where = " WHERE id = ";
        
        return $this->deleteTable('mangas',$where, $id);     
    }
}