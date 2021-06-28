<?php

require_once dirname(__FILE__) . "/BaseService.class.php";
require_once dirname(__FILE__).'/../dao/UserFavoritesDao.class.php';


class FavoritesService extends BaseService{


    public function __construct(){
      $this-> dao = new UserFavoritesDao();
    }

    public function add_favourite_cafe($user,$cafe){
        try {
          $data = [
            "user_id" => $user["user_id"],
            "cafe_id" => $cafe["cafe_id"]
          ];
            return parent::add($data);


        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'userfavourites.cafe_id')) {
                throw new Exception("Already favourited", 400, $e);
              }else{
                throw new Exception($e->getMessage(), 400, $e);
              }

        }
       
    }

    public function add_favourite_restaurant($user,$restaurant){
      try {
        $data = [
          "user_id" => $user["user_id"],
          "restaurant_id" => $restaurant["restaurant_id"]
        ];
          return parent::add($data);

      } catch (\Exception $e) {
          if (str_contains($e->getMessage(), 'userfavourites.restaurant_id')) {
              throw new Exception("Already favourited", 400, $e);
            }else{
              throw new Exception($e->getMessage(), 400, $e);
            }

      }

      
  }


        public function get_favourite_cafes($userId){
      
            return $this->dao->get_favorite_cafes($userId);
   
          }
          public function get_favourite_restaurants($userId){
      
            return $this->dao->get_favorite_restaurants($userId);
   
          }

      }
    


?>