@extends('_app.master')
@section('content')
  <div class="container-fluid">
    <div class="row-fluid">

      <div class="col-md-8">
        <h3 class="page-header">Welcome to the {{ Config::get('app.logger_appname') }} Slack Logger!</h3>
        <p class="lead">This application provides you with the ability to log user messages throughout specific channels in your <a href="https://slack.com">Slack</a> domain.</p>
        <h4>Getting Started</h4>
        <p>To start using the logger, please setup a few integrations within your Slack domain.</p>
        <p>To provide logging, you need to setup a <code>outgoing-webhook</code> integration. Specify the channel you would like the logger to monitor and do not set a trigger word. Make sure the method is set to <code>POST</code> and the URL should be set to <span class="text-primary">{{ URL::to('log') }}</span>.</p>
        <p>Do this for every channel you would like to log to, and make sure to add each channel to the <code>logger_channels</code> array in <code>app/config/app.php</code> file.</p>
        <p><br>You will also need to configure an <code>incomming-webhook</code> integration for posting messages back in to Slack. Set this up however you would like, and make sure to set the <code>logger_webhookurl</code> variable in <code>app/config/app.php</code> with the URL provided by the integration.</p>
        <hr>
        <h4>Extras</h4>
        <p>This logging application also comes with extras, such as individualized user statistics and group statistics. These extras are already enabled and will start to work once messages are logged. These statistics are stored within a different table and they can be viewed at <a href="{{ URL::to('stats') }}">{{ URL::to('stats') }}</a>.
      </div>

      <div class="col-md-4">
      </div>

    </div>
  </div>
@stop