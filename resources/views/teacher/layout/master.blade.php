<!doctype html>
<html lang="en">

@include('teacher.layout.head')
@yield('custom-style')
<body>




<!-- *************
    ************ Header section start *************
************* -->
@include('teacher.layout.header')



<!-- *************
    ************ Header section end *************
************* -->


<div class="container-fluid p-0">



    @include('teacher.layout.nav')


    <!-- *************
        ************ Main container start *************
    ************* -->
        <div class="main-container">


            <!-- Page header start -->
            <div class="page-header" style="height:500px">
                <ol class="breadcrumb" >
                    <li class="breadcrumb-item active">
                    
                    </li>
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

        <footer class="main-footer">© SEBA
            <br>
            Powerder by <img src="{{asset('asset/img/eduaidpng.png')}}" width="5%"/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Developed by <img src="{{asset('asset/img/siqes-white.png')}}" width="5%"/>
        </footer>

</div>

@include('teacher.layout.script')
@yield('custom-script')

</body>

</html>
