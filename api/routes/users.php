<?php

Flight::route('POST /register', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::userService()->register($data));
});

Flight::route('GET /confirm/@token', function($token){
  Flight::userService()->confirm($token);
  Flight::json(["message" => "Your account has been activated"]);
});


Flight::route('POST /login', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::userService()->login($data));
});

Flight::route('POST forgot', function(){
  $data = Flight::request()->data->getData();
  Flight::userService()->forgot($data);
  Flight::json(["message" => "Recovery link has been sent to your email"]);
});

Flight::route('POST /reset', function(){
  $data = Flight::request()->data->getData();
  Flight::userService()->reset($data);
  Flight::json(["message" => "Your password has been changed"]);
});

?>