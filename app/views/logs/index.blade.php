@extends('_app.master')
@section('content')
  <div class="container-fluid">
    <div class="row-fluid">

      <div class="col-md-8">
        <h3 class="page-header">{{ Config::get('app.logger_appname') }} Logs</h3>
        <p class="lead">Currently logged channels:</p>
        <ul class="list-unstyled">
          @foreach (Config::get('app.logger_channels') as $logchannel)
            <li><a href="{{ URL::to('logs/channel/' . $logchannel) }}">{{ "#" . $logchannel }}</a></li>
          @endforeach
        </ul>
      </div>

      <div class="col-md-4">
      </div>

    </div>
  </div>
@stop