<!-- Navigation start -->
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
<nav class="navbar navbar-expand-lg custom-navbar">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#royalHospitalsNavbar"
            aria-controls="royalHospitalsNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <i></i>
            <i></i>
            <i></i>
        </span>
    </button>
    <div class="collapse navbar-collapse" id="royalHospitalsNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="@if (Route::current()->getName()=='so.home') active-page @endif nav-link "
                   @if($menu==true) href="{{route('so.home')}}" @else href="#" @endif>
                    <i class="icon-devices_other nav-icon"></i>
                    Dashboard
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link "
                  >
                    <i class="icon-home nav-icon"></i>
                    Teacher details
                </a>
            </li>
            {{-- <li class="nav-item">
                @php $soID= Crypt::encrypt(Auth::guard('so')->user()->id); @endphp
                <a class="nav-link " href="{{ route('so.getAppointment', $soID) }}" target="_blank">
                    <i class="icon-book nav-icon"></i>
                    Download Appointment Letter
                </a>
            </li>  --}}

        </ul>
    </div>
</nav>
<!-- Navigation end -->
