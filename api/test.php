<?php


require_once dirname(__FILE__)."/dao/UserDao.class.php";

$user_dao = new UserDao();



$user1=[
"name"=>"Asim Veledarevic",
"email"=>"asim@gmail.com",
"password"=>"1234",
"account_id"=>1
];

$user=$user_dao->add_user($user1);

//$user =$user_dao->get_user_by_id(3);

//$user_dao->get_user_by_email("maki@gmail.com");
print_r($user)

?>