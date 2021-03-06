<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class RestaurantDao extends BaseDao{
    public function __construct(){
        parent::__construct("restaurants");
    }

    public function get_rating($id){
        return $this->query("SELECT rating FROM restaurants WHERE id =:id",["id"=>$id]);
    }
    public function get_location($id){
        return $this->query("SELECT location FROM restaurants WHERE id =:id",["id"=>$id]);
    }
    public function get_start($id){
        return $this->query("SELECT happyHourStart FROM restaurants WHERE id =:id",["id"=>$id]);
    }
    public function get_end($id){
        return $this->query("SELECT happyHourEnd FROM restaurants WHERE id =:id",["id"=>$id]);
    }
    public function get_offer($id){
        return $this->query("SELECT offer FROM restaurants WHERE id =:id",["id"=>$id]);
    }
      
    public function get_restaurants($search,$offset,$limit){

        return $this->query("SELECT * FROM cafes WHERE LOWER(restaurant_name) LIKE CONCAT('%', :restaurant_name, '%')
        LIMIT ${limit} OFFSET ${offset}", 
        ["restaurant_name" => strtolower($search)]);
        
            
    }

}


?>