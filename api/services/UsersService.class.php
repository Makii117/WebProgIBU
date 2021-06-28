<?php
require_once dirname(__FILE__). '/BaseService.class.php';
require_once dirname(__FILE__).'/../dao/UserDao.class.php';
require_once dirname(__FILE__).'/../dao/AccountDao.class.php';

use \Firebase\JWT\JWT;

class UserService extends BaseService{

  private $accountDao;

  public function __construct(){
    $this->dao = new UserDao();
  }


  public function login($user){
    $db_user = $this->dao->get_user_by_email($user['email']);
    if (!isset($db_user['id'])) throw new Exception("User doesn't exists", 400);
    if ($db_user['status'] != 'ACTIVE') throw new Exception("Account is not active!", 400);
    if ($db_user['password'] != md5($user['password'])) throw new Exception("Invalid password! Try again!", 400);

    return $db_user;
  }

  
  public function register($user){
   
   
    try {
      $this->dao->beginTransaction();
      $user = parent::add([

        "uname" => $user['uname'],
        "email" => $user['email'],
        "password" => $user['password'],
        "role" => "USER",
        "token" => md5(random_bytes(16))
      
      ]);

    } catch (\Exception $e) {
      
      if (str_contains($e->getMessage(), 'users.user_email')) {
          throw new Exception("Account with same email exists in the database", 400, $e);
        }else{
        throw $e;
      }
      $this->dao->rollBack();
    }
    $this->dao->commit();
    // TODO: send email with some token

    return $user;
  }


  public function confirm($token){
    $user = $this->dao->get_user_by_token($token);

    if (!isset($user['id'])) throw Exception("Invalid token",400);

    $this->dao->update($user['id'], ["status" => "ACTIVE",'token'=>NULL]);
    
    //TODO send email to customer
  }


  public function reset($user){
    $db_user = $this->dao->get_user_by_token($user['token']);

    if (!isset($db_user['id'])) throw new Exception("Invalid token", 400);
    if (strtotime(date(Config::DATE_FORMAT)) - strtotime($db_user['token_created_at']) > 300) throw new Exception("Token expired", 400);

    $this->dao->update($db_user['id'], ['password' => md5($user['password']),'token'=>NULL]);
    return $db_user;
  }


  public function forgot($user){
    $db_user = $this->dao->get_user_by_email($user['email']);

    if (!isset($db_user['id'])) throw new Exception("User doesn't exists", 400);
    if (strtotime(date(Config::DATE_FORMAT)) - strtotime($db_user['token_created_at']) < 300) throw new Exception("Be patient tokens is on his way", 400);

    // generate token - and save it to db
    $db_user = $this->update($db_user['id'], ['token' => md5(random_bytes(16)), 'token_created_at' => date(Config::DATE_FORMAT)]);

    //send recovery main TODO

  }
  }

?>