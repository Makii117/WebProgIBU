<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class CafeDao extends BaseDao{
    public function __construct(){
        parent::__construct("cafes");
    }

    public function get_rating($id){
        return $this->query("SELECT rating FROM cafes WHERE id =:id",["id"=>$id]);
    }
    public function get_location($id){
        return $this->query("SELECT location FROM cafes WHERE id =:id",["id"=>$id]);
    }
    public function get_start($id){
        return $this->query("SELECT happyHourStart FROM cafes WHERE id =:id",["id"=>$id]);
    }
    public function get_end($id){
        return $this->query("SELECT happyHourEnd FROM cafes WHERE id =:id",["id"=>$id]);
    }
    public function get_offer($id){
        return $this->query("SELECT offer FROM cafes WHERE id =:id",["id"=>$id]);
    }

    public function get_all_cafe(){
        return $this->query("SELECT * FROM cafes",[]);
    }
    public function get_cafes($search,$offset,$limit){
        return $this->query("SELECT * FROM cafes WHERE LOWER(name) LIKE CONCAT('%', :name, '%')
        LIMIT ${limit} OFFSET ${offset}", ["name" => strtolower($search)]);
        
        
    }
    public function get_cafes_oredered($cafe_id, $offset, $limit, $search,$order){
                list($order_column, $order_direction) = self::parse_order($order);

                $params = ["cafe_id" => $cafe_id];
                $query = "SELECT *
                          FROM cafes
                          WHERE id = :cafe_id ";
            


                if (isset($search)){
                  $query .= "AND ( LOWER(name) LIKE CONCAT('%', :search, '%') OR LOWER(subject) LIKE CONCAT('%', :search, '%'))";
                  $params['search'] = strtolower($search);
                }
                $query .= "ORDER BY ${order_column} ${order_direction} ";
                $query .="LIMIT ${limit} OFFSET ${offset}";
            
                return $this->query($query, $params);
}
}

?>