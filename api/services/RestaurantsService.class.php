<?php

require_once dirname(__FILE__) . "/BaseService.class.php";
require_once dirname(__FILE__).'/../dao/RestaurantDao.class.php';


class RestaurantService extends BaseService{

    public function __construct(){
        $this-> dao = new RestaurantDao();
      }
  
public function add($restaurant){
        try {
          $data = [
            "restaurant_name" => $restaurant["restaurant_name"],
            "location" => $restaurant["location"],
            "happyHourStart" => $restaurant["happyHourStart"],
            "happyHourEnd" => $restaurant["happyHourEnd"],
            "rating" => $restaurant["rating"],
            "offer"=>$restaurant["offer"]
          ];
            return parent::add($restaurant);
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'restaurants.name')) {
                throw new Exception("restaurant with same name already exists", 400, $e);
              }else{
                throw new Exception($e->getMessage(), 400, $e);
              }

        }

    }

    public function get_restaurants($search, $offset, $limit){
        if ($search){
          return $this->dao->get_restaurants($search, $offset, $limit);
          }else{
            return $this->dao->get_all($offset,$limit);
          }
        
        }



}
    


?>