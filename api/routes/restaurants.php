<?php
Flight::route('GET /restaurants', function(){
    $offset = Flight::query('offset', 0);
    $limit = Flight::query('limit', 10);
    $search = Flight::query('search');
    $order = Flight::query('order','-id');
    Flight::json(Flight::restaurantService()->get_restaurants($search, $offset, $limit,$order));

});

Flight::route('GET /restaurants/@id', function($id){
   
    Flight::json(Flight::restaurantService()->get_by_id($id));
});

Flight::route('POST /restaurants', function(){
    $data =Flight::request()->data->getData();
    Flight::json(Flight::restaurantService()->add($data));
});


Flight::route('PUT /restaurants/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::restaurantService()->update($id, $data));
});


?>