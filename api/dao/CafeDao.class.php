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

}


?>