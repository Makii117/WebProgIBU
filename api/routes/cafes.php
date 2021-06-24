<?php
Flight::route('GET /cafes', function(){
    $cafe_id=Flight::query('cafe_id');
    $offset = Flight::query('offset', 0);
    $limit = Flight::query('limit', 25);
    $search = Flight::query('search');
    $order = Flight::query('order','-id');


  if ($search){
    Flight::json(Flight::CafeDao()->get_cafes($search, $offset, $limit, $order));
  }else{
    Flight::json(Flight::CafeDao()->get_all($offset,$limit, $order));
  }
});

Flight::route('GET /cafe/@id', function($id){
    Flight::json(Flight::CafeDao()->get_by_id($id));
});

Flight::route('POST /cafes', function(){
    $request = Flight::request()->data->getData();
    Flight::json(Flight::CafeDao()->add($data));
});

Flight::route('PUT /cafe/@id', function($id){

  $request = Flight::request();
  $data = $request->data->getData();
  Flight::json(Flight::CafeService()->update($id, $data));
});


?>