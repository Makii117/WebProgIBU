<?php
Flight::route('GET /cafes', function(){
    $offset = Flight::query('offset', 0);
    $limit = Flight::query('limit', 10);
    $search = Flight::query('search');


    Flight::json(Flight::cafeService()->get_cafes($search,$offset,$limit));

});

Flight::route('GET /cafe/@id', function($id){
    Flight::json(Flight::cafeService()->get_by_id($id));

});


Flight::route('POST /cafes', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::cafeService()->add($data));

});

Flight::route('PUT /cafe/@id', function($id){

  $request = Flight::request();
  $data = $request->data->getData();
  Flight::json(Flight::cafeService()->update($id, $data));
});


?>