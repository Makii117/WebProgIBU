<?php

require_once dirname(__FILE__) . "/BaseService.class.php";
require_once dirname(__FILE__).'/../dao/CafeDao.class.php';


class CafeService extends BaseService{


    public function __construct(){
      $this-> dao = new CafeDao();
    }

    public function add($cafe){
        try {
          $data = [
            "cafe_name" => $cafe["cafe_name"],
            "location" => $cafe["location"],
            "happyHourStart" => $cafe["happyHourStart"],
            "happyHourEnd" => $cafe["happyHourEnd"],
            "rating" => $cafe["rating"],
            "offer"=>$cafe["offer"]
          ];
            return parent::add($cafe);
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'cafe.name')) {
                throw new Exception("Cafe with same name already exists", 400, $e);
              }else{
                throw new Exception($e->getMessage(), 400, $e);
              }

        }

    }



        public function get_cafes($search, $offset, $limit){
          if ($search){
            return $this->dao->get_cafes($search, $offset, $limit);
            }else{
              return $this->dao->get_all($offset,$limit);
            }
          
          }


      }
    


?>