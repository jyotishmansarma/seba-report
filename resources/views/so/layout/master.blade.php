<!doctype html>
<html lang="en">

@include('so.layout.head')
@yield('custom-style')
<body>




<!-- *************
    ************ Header section start *************
************* -->
@include('so.layout.header')



<!-- *************
    ************ Header section end *************
************* -->


<div class="container-fluid p-0">



    @include('so.layout.nav')


    <!-- *************
        ************ Main container start *************
    ************* -->
        <div class="main-container">


            <!-- Page header start -->
            <div class="page-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <!-- Page header end -->


            <!-- Content wrapper start -->
            <div class="content-wrapper">

                <!-- Row start -->

            @yield('main-content')


            <!-- Row end -->

            </div>
            <!-- Content wrapper end -->


        </div>
        <!-- *************
            ************ Main container end *************
        ************* -->

        <footer class="main-footer">© AHSEC</footer>

</div>

@include('so.layout.script')
@yield('custom-script')

</body>

</html>
