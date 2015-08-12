@extends('_app.master')
@section('content')
  <div class="container-fluid">
    <div class="row-fluid">

      <div class="col-md-7">
        <h3 class="page-header">{{ Config::get('app.logger_appname') }} Statistics</h3>
        <table class="table table-condensed table-striped">
          <thead>
            <th>Username</th>
            <th>Word Count</th>
            <th>Message Count</th>
            <th>Word/Message Ratio</th>
          </thead>
          <tbody>
            @foreach (Stats::all() as $userstat)
              <tr>
                <td><a href="{{ URL::to('stats/user/' . $userstat->username) }}">{{ $userstat->username }}</a></td>
                <td>{{ $userstat->wordcount }}</td>
                <td>{{ $userstat->msgcount }}</td>
                <td>{{ $userstat->ratio }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="col-md-5">
        <canvas id="ratiograph" height="350px"></canvas>
      </div>

    </div>
  </div>
@stop