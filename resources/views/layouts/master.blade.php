<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>فروشگاه من {{ Route::currentRouteName() }}</title>

  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/shop-homepage.css" rel="stylesheet">
</head>
<body>
  <!-- Nav bar -->
  @include('layouts.header ')
  <br><br>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        @yield('main')
        <br><br><br><br>
      </div>
      <div class="col-lg-3">
        @section('sidebar')
            @include('layouts.sidebar')
        @show
      </div>
    </div>
  </div>
 
  <!-- Footer -->
  @include('layouts.footer')

  <!-- Bootstrap core JavaScript -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
