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
  Flight::json(Flight::jwt(Flight::userService()->login(Flight::request()->data->getData())));
});

Flight::route('POST /forgot', function(){
  $data = Flight::request()->data->getData();
  Flight::userService()->forgot($data);
  Flight::json(["message" => "Recovery link has been sent to your email"]);
});

Flight::route('POST /reset', function(){
  Flight::json(Flight::jwt(Flight::userService()->reset(Flight::request()->data->getData())));
});

?>