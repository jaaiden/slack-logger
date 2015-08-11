@extends('_app.master')
@section('content')
  <div class="container-fluid">
    <div class="row-fluid">

      <div class="col-md-8">
        <h3 class="page-header">{{ Config::get('app.logger_appname') }} Logs</h3>
        
      </div>

      <div class="col-md-4">
      </div>

    </div>
  </div>
@stop