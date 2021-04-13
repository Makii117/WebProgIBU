<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class favoritesDao extends BaseDao{
    public function __construct(){
        parent::__construct("userfavorites");
    }



}


?>