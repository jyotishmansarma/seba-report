<!doctype html>
<html lang="en">

@include('login_layout.head')

<body class="authentication">

<!-- Container start -->
<div class="container">
    @yield('main-content')


</div>
<script>
    // $('.toast').toast('show');
</script>
<script src="{{asset('asset/js/jquery.min.js')}}"></script>
<script src="{{asset('asset/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('asset/js/moment.js')}}"></script>

@yield("custom-scripts")
</body>

</html>
