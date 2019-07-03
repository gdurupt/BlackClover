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
}