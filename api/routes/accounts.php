<?php
Flight::route('GET /accounts', function(){
    $offset = Flight::query('offset', 0);
    $limit = Flight::query('limit', 25);
    $search = Flight::query('search');

    Flight::json(Flight::accountService()->get_accounts($search, $offset, $limit, $order));

});

Flight::route('GET /accounts/@id', function($id){
   
    Flight::json(Flight::AccountService()->get_by_id($id));
});

Flight::route('POST /accounts', function(){
    $data =Flight::request()->data->getData();
    Flight::json(Flight::AccountService()->add($data));
});


Flight::route('PUT /accountss/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::AccountService()->update($id, $data));
});


?>