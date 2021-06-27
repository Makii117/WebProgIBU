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
      
    public function get_restaurants($search,$offset,$limit,$order){

        list($order_column, $order_direction) = self::parse_order($order);


        return $this->query("SELECT * FROM cafes WHERE LOWER(name) LIKE CONCAT('%', :name, '%')
        ORDER BY ${order_column} ${order_direction} 
        LIMIT ${limit} OFFSET ${offset}", 
        ["name" => strtolower($search)]);
        
            
    }
}


?>