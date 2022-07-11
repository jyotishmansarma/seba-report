
<!-- Header start -->
<header class="header">
    <div class="container-fluid">
        @php
            $p_status = Auth::guard('school')->user()->first_password_status;
            $bank_status = Auth::guard('school')->user()->bank_field_status;
            if($p_status==null || $bank_status==null)
            {
                $menu=false;
            }
            else
            {
                $menu=true;
            }
        @endphp
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                <a @if($menu==true) href="{{route('so.home')}}" @else href="#" @endif  class="logo">SEBA</a>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">

                <!-- Header actions start -->
                <ul class="header-actions">


                    <li class="dropdown">
                        <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                            {{-- <span class="user-name">{{auth()->user()->name}}</span> --}}
                            <span class="avatar"><img src="{{asset('asset/img/logo/avatar.png')}}" style="border-radius: 20px"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                            <div class="header-profile-actions">

                                <a href="{{ route('so.logout') }}" ><i class="icon-log-out1"></i> Sign Out</a>
                            </div>

                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
                <!-- Header actions end -->

            </div>
        </div>
        <!-- Row end -->

    </div>
</header>
<!-- Header end -->
