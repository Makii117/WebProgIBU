<?php


require_once dirname(__FILE__). '/BaseService.class.php';
require_once dirname(__FILE__) . "/../dao/AccountDao.class.php";

class AccountService extends BaseService{

public function __construct(){
    $this->dao =new AccountDao();
}
public function get_accounts($search, $offset, $limit, $order){
if ($search){
    Flight::json(Flight::AccountDao()->get_accounts($search, $offset, $limit, $order));
  }else{
    Flight::json(Flight::AccountDao()->get_all($offset,$limit, $order));
  }

}
public function add($account){
    // validation of account data
    if (!isset($account['name'])) throw new Exception("Account name is missing");
    return parent::add($account);
  }



}





?>