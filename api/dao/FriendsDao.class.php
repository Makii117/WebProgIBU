<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class frienssDao extends BaseDao{
    public function __construct(){
        parent::__construct("friends");
    }
    public function get_all_friends($userid){

        
    }


}


?>