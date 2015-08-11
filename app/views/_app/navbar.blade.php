<nav class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Show/Hide Navbar</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">{{ Config::get('app.logger_appname') }}</a>
    </div>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('') }}">Home</a></li>
        <li><a href="{{ URL::to('stats') }}">Stats</a></li>
        <li><a href="{{ URL::to('logs') }}">Logs</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
      </ul>
    </div>
  </div>
</nav>