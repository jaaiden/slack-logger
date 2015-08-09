<?php

class SlackController extends BaseController {

  function postToSlack($channel, $message)
  {
    $data = array("channel" => $channel, "text" => $message);
    $data_string = json_encode($data);
    $ch = curl_init({{ Config::get('app.logger_webhookurl') }});
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
    );
    $result = curl_exec($ch);
    curl_close($ch);
  }

  public function logMessage()
  {
    $channel = Input::get('channel_name');
    $username = Input::get('user_name');
    $message = Input::get('text');

    // We'll log slackbot's messages, we just won't track them as a user statistic.
    if ($username != "slackbot")
    {
      $user = Stats::where('username', $username)->first();
      if (is_null($user))
      {
        $user = new Stats;
        $user->username = $username;
        $user->msgcount = 1;
        $user->wordcount = str_word_count($message);
        $user->ratio = round(((str_word_count($message))/1), 2);
        $user->save();
      }else
      {
        $user->msgcount += 1;
        $user->wordcount += str_word_count($message);
        $user->ratio = round((($user->wordcount + str_word_count($message))/($user->msgcount + 1)), 2);
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
  }

}
