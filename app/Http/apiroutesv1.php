<?php

/*
 |------------------------------------------------------------------------
 | Application Api Routes
 |------------------------------------------------------------------------
 |
 | Register application api routes start here.
 | Let's do something awesome
 |
 */

$api->group([ 'middleware' => 'api.auth'], function($api){

    $api->resource('note', 'App\Http\Controllers\Api\V1\NoteApiController');

});