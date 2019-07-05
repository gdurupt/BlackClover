<?php

class ArcsManager extends Model{
//--------------------------------------------------------------------------------------------//    
    public function getAll(){
        $update = 'SELECT * FROM arcs ORDER by id';
        $execute = NULL;
        return $this->selectTable('Arcs', $update, $execute);     
    }
//--------------------------------------------------------------------------------------------//       
    public function getOne($id){       
        $update = 'SELECT * FROM arcs WHERE id = ?';
        $execute = array($id);
        return $this->selectTable('Arcs', $update, $execute);     
    }
//--------------------------------------------------------------------------------------------//
        public function getCountArc(){   
        
        $update = 'SELECT COUNT(*) AS nbArcs FROM arcs';
        $execute = NULL;
        return $this->selectTable('Arcs',$update, $execute);   
    }
 //--------------------------------------------------------------------------------------------//
    public function getLast(){
        $update = 'SELECT * FROM arcs ORDER by id DESC limit 1';
        $execute = NULL;
        return $this->selectTable('Arcs', $update, $execute);     
    }
//--------------------------------------------------------------------------------------------//
}