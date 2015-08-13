@extends('_app.master')
@section('content')
  <div class="container-fluid">
    <div class="row-fluid">

      <div class="col-md-8">
        <h3 class="page-header">Welcome to slack-logger!</h3>
        <p class="lead">This application provides you with the ability to log user messages throughout specific channels in your <a href="https://slack.com">Slack</a> domain.</p>
        <h4>Getting Started</h4>
        <p>Please use the form below to start setting up slack-logger to be used within your environment!</p>

        {{ Form::open(array('url' => 'updateApp')) }}
          <div class="form-group">
            <label for="appurl">URL</label>
            <input type="text" class="form-control" id="appurl" placeholder="http://example.com" value="{{ $_SERVER['SCRIPT_URI'] }}">
            <p class="help-block">The URL for your webapp, the default value is almost always right.</p>
          </div>
          <div class="form-group">
            <label for="appname">App Name</label>
            <input type="text" class="form-control" id="appname" placeholder="Your Team">
            <p class="help-block">Your team name. Usually the name of your company or group.</p>
          </div>
          <div class="form-group">
            <label for="appname">Slack Team Domain</label>
            <input type="text" class="form-control" id="appname" placeholder="your-team">
            <p class="help-block">The subdomain for your Slack team. This is the part you use to login to Slack with. For example, if your Slack team URL is your-team.slack.com, your subdomain is <strong>your-team</strong>.</p>
          </div>
          <div class="form-group">
            <label for="webhookurl">Slack Webhook URL</label>
            <input type="text" class="form-control" id="webhookurl" placeholder="https://hooks.slack.com/services/...">
            <p class="help-block">The incoming-webhook URL from Slack. This is used to send messages back into Slack.</p>
          </div>
          <div class="form-group">
            <label for="webhookurl">Slack Channels</label>
            <table class="table table-condensed table-striped table-hover">
              <thead>
                <th>Channel Name</th>
                <th>Channel Token (Taken from outgoing-webhooks)</th>
              </thead>
              <tbody>
                <tr id='addr0'>
                  <td><input type="text" name="channelname0" class="form-control" placeholder="general"></td>
                  <td><input type="text" name="channeltoken0" class="form-control" placeholder="Token"></td>
                </tr>
                <tr id='addr1'></tr>
              </tbody>
            </table>
            <a id="add_row">Add Row</a> <a id='delete_row'>Delete Row</a>
          </div>
        {{ Form::close() }}

        <hr>
        <h4>Integration Mapping List</h4>
        <ul class="list-group">
          <li class="list-group-item">
            <h4 class="list-group-item-heading">outgoing-webhooks</h4>
            <p class="list-group-item-text">Map to <i>{{ URL::to('log') }}</i></p>
          </li>
          <li class="list-group-item">
            <h4 class="list-group-item-heading">/top5</h4>
            <p class="list-group-item-text">Returns the Top 5 users based on word count; map to <i>{{ URL::to('top5') }}</i></p>
          </li>
          <li class="list-group-item">
            <h4 class="list-group-item-heading">/stats</h4>
            <p class="list-group-item-text">Returns the user's stats, or optionally the user that is sent as an argument after the command; map to <i>{{ URL::to('stats') }}</i></p>
          </li>
        </ul>
      </div>

      <div class="col-md-4">
      </div>

    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      var i=1;
      $("#add_row").click(function(){
        $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='mail"+i+"' type='text' placeholder='Mail' class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text' placeholder='Mobile'  class='form-control input-md'></td>");
        $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
        i++; 
      });
      $("#delete_row").click(function(){
        if(i>1){
          $("#addr"+(i-1)).html('');
          i--;
        }
      });
    });
  </script>
@stop