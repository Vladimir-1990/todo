<?php

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
$router->post("login", ["as" => "login", "uses" => "UserController@login"]);

$router->group(["middleware" => "auth"], function ($app) {
    $app->get("items", ["as" => "items", "uses" => "ItemsController@all"]);
    $app->get("items/{itemId}", ["as" => "item", "uses" => "ItemsController@get"]);
    $app->post("mark-done", ["as" => "mark-done", "uses" => "ItemsController@markDone"]);
    $app->post("create", ["as" => "create", "uses" => "ItemsController@create"]);
    $app->delete("delete/{itemId}", ["as" => "delete", "uses" => "ItemsController@delete"]);
});
