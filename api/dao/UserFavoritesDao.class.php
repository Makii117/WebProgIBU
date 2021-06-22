<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class favoritesDao extends BaseDao{
    public function __construct(){
        parent::__construct("userfavorites");
    }
    public function get_favorite_cafes($userId){
        return $this->query("SELECT * FROM cafes WHERE id IN ( SELECT cafe_id FROM userfavourites WHERE user_id=:userId",["userId=>$userId"]);

}
    public function get_favorite_restaurants($userId){
     return $this->query("SELECT * FROM restaurants WHERE id IN ( SELECT restaurant_id FROM userfavourites WHERE user_id=:userId",["userId=>$userId"]);
        
    }
    public function add_favorite_restaurant($userId,$restaurant_id){
        return $this->query("INSERT INTO userfavourites (user_id,restaurant_id) VALUES (user_id=:userId,cafe_id=:restaurant_id)",["userId=>$userId","restaurant_id=>$restaurant_id"]);
    }
    
    public function add_favorite_cafe($userId,$cafe_id){
        return $this->query("INSERT INTO userfavourites (user_id,cafe_id) VALUES (user_id=:userId,cafe_id=:cafe_id)",["userId=>$userId","cafe_id=>$cafe_id"]);
    }
    
    public function remove_favorite_cafe($userId,$cafe_id){
        return $this->query("DELETE FROM userfavourites WHERE cafe_id=:cafe_id AND user_id=:userId",["userId=>$userId","cafe_id=$cafe_id"]);
    }
    public function remove_favorite_restaurant($userId,$restaurant_id){
        return $this->query("DELETE FROM userfavourites WHERE restaurant_id=:restaurant_id AND user_id=:userId",["userId=>$userId","resturant_id=$restaurant_id"]);
    }
}


?>