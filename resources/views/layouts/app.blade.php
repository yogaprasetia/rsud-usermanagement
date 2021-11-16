<!DOCTYPE html>
<html>

<head>
  @include('layouts.partials.head')
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    @include('layouts.partials.nav')
    @include('layouts.partials.sidebar')

    <div class="content-wrapper">
      <section class="content mt-4">
        @yield('content')
      </section>
    </div>

    @include('layouts.partials.footer')
  </div>

  @include('layouts.partials.scripts')
</body>

</html>