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
/*
$router->get('/', function () use ($router) {
    return $router->app->version();
});
*/

$router->get('/', [
    'as' => 'home', 'uses' => 'HomeController@home'
]);

//route for actors
$router->group([''], function () use ($router) {
       $router->get('actors',['as'=>'actors','uses' => 'ActorController@all']);

       $router->get('actor/details/{id}', ['as'=>'actorDetails','uses' => 'ActorController@read']);

       $router->post('actor/ajouter', ['as'=>'addActor','uses' => 'ActorController@create']);

       $router->get('actor/edit/{id}', ['as'=>'editActor','uses' => 'ActorController@edit']);

       $router->put('actor/modifier/{id}', ['as'=>'updateActor','uses' => 'ActorController@update']);

       $router->delete('actor/supprimer/{id}', ['as'=>'deleteActor','uses' => 'ActorController@delete']);

   });


   //route for films
    $router->group([''], function () use ($router) {

       $router->get('films',  ['as'=>'movies','uses' => 'MovieController@all']);

       $router->post('film/ajouter', ['as'=>'addMovie','uses' => 'MovieController@create']);

       $router->get('film/details/{id}', ['as'=>'movieDetails','uses' => 'MovieController@read']);

       $router->get('movie/edit/{id}', ['as'=>'editMovie','uses' => 'MovieController@edit']);

       $router->put('film/modifier/{id}', ['as'=>'updateMovie','uses' => 'MovieController@update']);

       $router->delete('film/supprimer/{id}', ['as'=>'deleteMovie','uses' => 'MovieController@delete']);

       $router->get('films/{année}', ['uses' => 'MovieController@moviesByYear']);

       $router->get('acteur/{id}/films', ['as'=>'actorMovies','uses' => 'MovieController@actorMovies']);

 });

