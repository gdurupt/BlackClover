<?php

class PersonnageManager extends Model{
//--------------------------------------------------------------------------------------------//    
    public function getAll(){
        $update = 'SELECT * FROM personnage ORDER by id';
        $execute = NULL;
        return $this->selectTable('Personnage', $update, $execute);     
    }
//--------------------------------------------------------------------------------------------//       
    public function addPersonnage($title,$content,$file){ 
  
        $update = '(title, content, image) VALUES(:title, :content, :file)';
        $execute =array(
	       'title' => $title,
	       'content' => $content,
           'file' => $file
        );
        return $this->addTable('personnage', $update, $execute);
    }
//--------------------------------------------------------------------------------------------//  
    public function updatePersonnage($id, $title, $content, $file){             
        $update = ' SET title = :title, content = :content, image = :file WHERE id = :id';
        $execute = array(
	       'title' => $title,
	       'content' => $content,
           'file' => $file,
           'id' => $id
	);      
        return $this->updateTable('personnage', $update, $execute);      
    }
//--------------------------------------------------------------------------------------------//   
        public function deletePersonnage($id){       
        $where = " WHERE id = ";
        
        return $this->deleteTable('personnage',$where, $id);     
    }
//--------------------------------------------------------------------------------------------//
    public function getLast(){
        $update = 'SELECT * FROM personnage ORDER by id DESC limit 1';
        $execute = NULL;
        return $this->selectTable('personnage', $update, $execute);     
    }
}