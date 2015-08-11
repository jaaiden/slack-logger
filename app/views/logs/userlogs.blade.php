@extends('_app.master')
@section('content')
  <div class="container-fluid">
    <div class="row-fluid">

      <div class="col-md-10 col-md-offset-1">
        <h3 class="page-header">{{ Config::get('app.logger_appname') }} Logs - {{ "@" . $username }}</h3>
        <?php $chanlogs = Logger::where('username', $username)->paginate(30); ?>
        <table class="table table-condensed table-striped">
          <thead>
            <th>Message #</th>
            <th>Username</th>
            <th>Message</th>
            <th>Channel</th>
            <th>Timestamp</th>
          </thead>
          <tbody>
            @foreach ($chanlogs as $log)
              <tr>
                <td>{{ $log->id }}</td>
                <td>{{ $log->username }}</td>
                <td>{{ $log->message }}</td>
                <td><a href="{{ URL::to('logs/channel/' . $log->channel) }}">#{{ $log->channel }}</a></td>
                <td>{{ $log->created_at }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <div class="text-center">{{ $chanlogs->links(); }}</div>
      </div>

    </div>
  </div>
@stop