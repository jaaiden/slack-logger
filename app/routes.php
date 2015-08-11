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
// Route::post('log', array('uses' => 'SlackController@logMessage'));
Route::post('log', function()
{
  $channel = Input::get('channel_name');
  $username = Input::get('user_name');
  $message = Input::get('text');

  // We'll log slackbot's messages, we just won't track them as a user statistic.
  if ($username != "slackbot")
  {
    $user = Stats::where('username', '=', $username)->first();
    if (is_null($user))
    {
      $user = new Stats;
      $user->username = $username;
      $user->msgcount = 1;
      $user->wordcount = str_word_count($message);
      $user->ratio = 0;
      // $user->ratio = round(((str_word_count($message))/1), 2);
      $user->save();
    }else
    {
      $user->msgcount += 1;
      $user->wordcount += str_word_count($message);
      $user->ratio = 0;
      // $user->ratio = round((($user->wordcount + str_word_count($message))/($user->msgcount + 1)), 2);
      $user->save();
    }

    $log = new Logger;
    $log->username = $username;
    $log->message = $message;
    $log->channel = $channel;
    $log->save();
  }else
  {
    $log = new Logger;
    $log->username = "slackbot";
    $log->message = $message;
    $log->channel = $channel;
    $log->save();
  }
});