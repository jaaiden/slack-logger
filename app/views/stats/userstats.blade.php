@extends('_app.master')
@section('content')
  <div class="container-fluid">
    <div class="row-fluid">

      <div class="col-md-8 col-xs-8">
        <h3 class="page-header">{{ Config::get('app.logger_appname') }} Statistics - {{ "@" . $username }}</h3>
        <?php $userstat = Stats::where('username', $username)->firstOrFail(); ?>
        <table class="table table-condensed">
          <thead>
            <th>Username</th>
            <th>Word Count</th>
            <th>Message Count</th>
            <th>Word/Message Ratio</th>
          </thead>
          <tbody>
            <tr>
              <td>{{ $userstat->username }}</td>
              <td>{{ $userstat->wordcount }}</td>
              <td>{{ $userstat->msgcount }}</td>
              <td>{{ $userstat->ratio }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="col-md-4 col-xs-4">
        <div class="panel panel-default">
          <div class="panel-heading"><div class="panel-title">Monthly Statistics</div></div>
          <ul class="list-group">
            <li class="list-group-item">Item 1</li>
            <li class="list-group-item">Item 2</li>
            <li class="list-group-item">Item 3</li>
          </ul>
        </div>
      </div>

    </div>
  </div>
@stop