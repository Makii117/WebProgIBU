<?php


require_once dirname(__FILE__)."/dao/UserDao.class.php";

$user_dao = new UserDao();
$user = $user_dao->get_user_by_email("maki@gmail.com");
print_r($user)

?>