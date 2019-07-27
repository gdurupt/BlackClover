<?php

class VisitedManager extends Model{
//--------------------------------------------------------------------------------------------// 
    public function UpdateVisited($lastVisited){             
        $visited = $lastVisited + 1;
        
        $update = ' SET visited = :change';
        $execute = array(
	       'change' => $visited
	);      
        return $this->updateTable('visited', $update, $execute);      
    }
//--------------------------------------------------------------------------------------------//       
    public function getAll(){
        $update = 'SELECT * FROM visited';
        $execute = NULL;
        return $this->selectTable('Visited', $update, $execute);     
    }
}