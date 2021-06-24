<?php

require_once dirname(__FILE__) . "/BaseService.class.php";
require_once dirname(__FILE__).'/../dao/CafeDao.class.php';


class CafeService extends BaseService{

    public function __construct(){
      $this->dao = new CafeeDao();
    }

    public function add($cafe){
        try {
            
            return parent::add($cafe);
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'cafes.name')) {
                throw new Exception("Cafe with same name already exists", 400, $e);
              }else{
                throw $e;
              }
        }

    }

     public function get($cafe_id, $offset, $limit, $search,$order){
         return $this->dao->get($cafe_id, $offset, $limit, $search,$order);

     }



?>