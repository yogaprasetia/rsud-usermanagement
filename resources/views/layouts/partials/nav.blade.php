<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light justify-content-between">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        @guest
        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
        @else
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <a href="/" class="nav-link">Home</a>
        </li>
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ Auth::user()->name }}</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="{{ route('profile.edit') }}" class="dropdown-item">Edit Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </li>
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          @if (auth()->user()->unreadNotifications->count())
          <span class="badge badge-danger navbar-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                  @forelse ($user1->notifications as $notification)
                  <p class="text-sm">{{ $notification->data['notes'] }}</p>
                  @empty
                  <p class="text-sm">Messages not found</p>
                  @endforelse
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a class="text-success" href="{{ route('markRead') }}" class="dropdown-item dropdown-footer">Read All Messages</a>
          <div class="dropdown-divider"></div>
          <a class="text-danger" href="{{ route('delete') }}" class="dropdown-item dropdown-footer">Delete All Messages</a>
        </div>
    </ul>
    </ul>
    <ul class="navbar-nav mr-3">
        <li class="nav-item d-none d-sm-inline-block">
            <span class="font-weight-bold">@yield('title')</span>
        </li>
        @endguest
    </ul>
</nav>
<!-- /.navbar -->