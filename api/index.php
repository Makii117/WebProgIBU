<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require dirname(__FILE__)."/../vendor/autoload.php";
require dirname(__FILE__)."/dao/CafeDao.class.php";
require_once dirname(__FILE__).'/dao/AccountDao.class.php';
require_once dirname(__FILE__).'/dao/BaseDao.class.php';


//include routes
require_once dirname(__FILE__)."/routes/users.php";
require_once dirname(__FILE__)."/routes/cafes.php";
require_once dirname(__FILE__)."/routes/favorites.php";
require_once dirname(__FILE__)."/routes/restaurants.php";
require_once dirname(__FILE__)."/routes/accounts.php";


//include services
require_once dirname(__FILE__)."/services/AccountService.class.php";
require_once dirname(__FILE__)."/services/UsersService.class.php";
require_once dirname(__FILE__)."/services/CafeService.class.php";
require_once dirname(__FILE__)."/services/RestaurantsService.class.php";
require_once dirname(__FILE__)."/services/FavouritesService.class.php";

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

Flight::register('accountService','AccountService');
Flight::register('userService', 'UserService');
Flight::register('cafeService','CafeService');
Flight::register('restaurantService','RestaurantsService');
Flight::register('favoriteService','FavouritesService');


Flight::route('/', function(){
    echo 'hello world3!';


 });
Flight::start();


?>