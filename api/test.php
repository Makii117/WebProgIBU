<?php


require_once dirname(__FILE__)."/dao/UserDao.class.php";
require_once dirname(__FILE__)."/dao/CafeDao.class.php";



$dao=new CafeDao();

$cafe=[
    "name"=>"Te Amo",
    "location"=>"Nova Otoka",
    "happyHourStart"=>"06:00:00",
    "happyHourEnd"=>"09:00:00",
    "offer"=>"Kafa marka"
];

$dao->add($cafe);


print_r($cafe)

?>