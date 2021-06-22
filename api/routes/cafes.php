<?php
Flight::route('GET /cafes', function(){
    $offset = Flight::query('offset', 0);
    $limit = Flight::query('limit', 25);
    $search = Flight::query('search');

  if ($search){
    Flight::json(Flight::CafeDao()->get_cafes($search, $offset, $limit));
  }else{
    Flight::json(Flight::CafeDao()->get_all($offset,$limit));
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

  Flight::CafeDao()->update($id, $data);
  $cafe = Flight::CafeDao()->get_by_id($id);
  Flight::json($cafe);
});


?>