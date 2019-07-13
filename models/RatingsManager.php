<?php

class RatingsManager extends Model{
//--------------------------------------------------------------------------------------------//
        public function SecureMultiVote($id, $article, $id_article){
        
        if($article == true){
            $where = "id_manga = ".$id_article;
        }else if($article == false){
            $where = "id_episode = ".$id_article;
        }
            
        $update = 'SELECT * FROM ratings WHERE id_users = '.$id.' AND '.$where;
        $execute = NULL;
        return $this->selectRatings($update, $execute);     
    }
//--------------------------------------------------------------------------------------------// 
    public function getCountUsersRatings($article, $id_article){
        
        if($article == true){
            $where = "id_manga = ".$id_article;
        }else if($article == false){
            $where = "id_episode = ".$id_article;
        }
        
        $update = 'SELECT COUNT(*) AS nbRatings FROM ratings WHERE '.$where;
        $execute = NULL;
        return $this->selectTable('Ratings', $update, $execute);     
    }
//--------------------------------------------------------------------------------------------//
    public function getRatings($article, $id_article){
        
        if($article == true){
            $where = "id_manga = ".$id_article;
        }else if($article == false){
            $where = "id_episode = ".$id_article;
        }
        
        $update = 'SELECT AVG(ratings) AS notation FROM ratings WHERE '.$where;
        $execute = NULL;
        return $this->selectTable('Ratings', $update, $execute);     
    }
//--------------------------------------------------------------------------------------------// 
    public function addRating($rating,$id_users,$article,$id_article){ 
  
        if($article == true){
            $manga = $id_article;
            $episode = 0;
        }else if($article == false){
            $episode = $id_article;
            $manga = 0;
        }
  
        $update = '(id_users, ratings, id_episode, id_manga) VALUES(:id_users, :ratings, :id_episode, :id_manga)';
        $execute =array(
	       'id_users' => $id_users,
	       'ratings' => $rating,
           'id_episode' => $episode,
           'id_manga' => $manga
        );
        return $this->addTable('ratings', $update, $execute);
    }
//--------------------------------------------------------------------------------------------//  
    public function updateRatings($rating,$id_users,$article,$id_article){
        
        if($article == true){
            $manga = $id_article;
            $episode = 0;
        }else if($article == false){
            $episode = $id_article;
            $manga = 0;
        }
        
        $update = ' SET ratings = :ratings, id_episode = :id_episode, id_manga = :id_manga WHERE id_users = :id_users AND id_episode = :id_episode AND id_manga = :id_manga';
        $execute = array(
	       'id_users' => $id_users,
	       'ratings' => $rating,
           'id_episode' => $episode,
           'id_manga' => $manga
	);      
        return $this->updateTable('ratings', $update, $execute);      
    }
//--------------------------------------------------------------------------------------------//   
        public function deleteRatings($article, $id_article){       
                
        if($article == true){
            $delete = "id_manga = ".$id_article;
        }else if($article == false){
            $delete = "id_episode = ".$id_article;
        }
            
        $where = " WHERE ".$delete;
        
        return $this->deleteTable('ratings',$where, $id);     
    }
}