<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require dirname(__FILE__)."/../vendor/autoload.php";
require dirname(__FILE__)."/dao/CafeDao.class.php";


//include routes
require_once dirname(__FILE__)."/routes/users.php";
require_once dirname(__FILE__)."/routes/cafes.php";
require_once dirname(__FILE__)."/routes/favorites.php";
require_once dirname(__FILE__)."/routes/restaurants.php";
require_once dirname(__FILE__)."/routes/users.php";


//include services
require_once dirname(__FILE__)."/services/AccountService.class.php";
require_once dirname(__FILE__)."/services/UserService.class.php";

Flight::set('flight.log_errors', TRUE);

Flight::map('error', function(Exception $ex){
    Flight::json(["message" => $ex->getMessage()], $ex->getCode());
  });


//read query parameters from url
Flight::map('query', function($name, $default_value = NULL){
    $request = Flight::request();
    $query_param = @$request->query->getData()[$name];
    $query_param = $query_param ? $query_param : $default_value;
    return $query_param;
  });

//register services

Flight::register('AccountService','AccountService');
Flight::register('userService', 'UserService');


Flight::route('/', function(){
    echo 'hello world3!';
});



Flight::route('/hello5', function(){
    echo 'hello world5!';
});



Flight::start();


?>