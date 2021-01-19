<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});




//route for actors
$router->group(['prefix' => 'gateWayApi'], function () use ($router) {
       $router->get('actors',  ['uses' => 'ActorController@all']);

       $router->get('actor/details/{id}', ['uses' => 'ActorController@read']);

       $router->post('actors/ajouter', ['uses' => 'ActorController@create']);

       $router->put('actor/modifier/{id}', ['uses' => 'ActorController@update']);

       $router->delete('actor/supprimer/{id}', ['uses' => 'ActorController@delete']);

   });


   //route for films
    $router->group(['prefix' => 'gateway'], function () use ($router) {
       $router->get('films',  ['uses' => 'MovieController@all']);

       $router->post('film/ajouter', ['uses' => 'MovieController@create']);

       $router->get('film/details/{id}', ['uses' => 'MovieController@read']);

       $router->put('film/modifier/{id}', ['uses' => 'MovieController@update']);

       $router->delete('film/supprimer/{id}', ['uses' => 'MovieController@delete']);

       $router->get('films/{année}', ['uses' => 'MovieController@moviesByYear']);

     /*$router->get('film/actor/{actor}', ['uses' => 'MovieController@actorMovies']);*/
 });
