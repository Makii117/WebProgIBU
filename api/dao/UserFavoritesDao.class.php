<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class favoritesDao extends BaseDao{
    public function __construct(){
        parent::__construct("userfavorites");
    }
    public function get_favorite_cafes($userId){
        return $this->query("SELECT * FROM userfavorites INNER JOIN users ON userfavourites.user_id=:userId",["userId=>$userId"]);
    }
    public function get_favorite_restaurants($userId){

    }
    public function add_favorite(){
        
    }
    public function remove_favorite(){

    }
}


?>