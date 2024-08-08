<div class="sidebar-footer hidden-small d-flex justify-content-center">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </a>
  </div>
