<?php
Flight::route('GET /favouriteCafes', function($userId){

    Flight::json(Flight::favouritesService()->get_favorite_cafes($userId));

});

Flight::route('GET /favouriteRestaurants', function($userId){

    Flight::json(Flight::favouritesService()->get_favorite_restaurants($userId));

});


?>