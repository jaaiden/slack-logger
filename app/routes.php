<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function(){ return View::make('index'); });
Route::group(array('prefix' => 'stats'), function()
{
  Route::get('/', function(){ return View::make('stats.index'); });
  Route::get('user/{username}', function($username){ return View::make('stats.userstats')->with('username', $username); });
});
Route::group(array('prefix' => 'logs'), function()
{
  Route::get('/', function(){ return View::make('logs.index'); });
  Route::get('channel/{channel}', function($channel){ return View::make('logs.chanlogs')->with('channel', $channel); });
  Route::get('user/{username}', function($username){ return View::make('logs.userlogs')->with('username', $username); });
});

// POST Routes
Route::post('log', array('uses' => 'SlackController@logMessage'));