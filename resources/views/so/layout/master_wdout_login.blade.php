<!doctype html>
<html lang="en">

@include('so.layout.head')
@yield('custom-style')
<body>




<!-- *************
    ************ Header section end *************
************* -->


<div class="container-fluid p-0">


        <div class="main-container">

            <!-- Content wrapper start -->
            <div class="content-wrapper">

                <!-- Row start -->

            @yield('main-content')


            <!-- Row end -->

            </div>
            <!-- Content wrapper end -->


        </div>


</div>

@include('so.layout.script')
@yield('custom-script')

</body>

</html>
