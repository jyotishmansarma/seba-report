@extends('login_layout.master')

@section('main-content')

<form method="POST" action="{{ route('school.auth') }}">
    @csrf
    <div class="row justify-content-md-center">
        <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">

            <div class="login-screen">

                <div class="login-box">
                    <!--error msg-->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <center>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('asset/img/logo/seba.png') }}" alt="CoolAdmin" width="72" height="72">
                        </div>
                        <div class="col-md-6">
                            <img src="{{asset('asset/img/eduaid-logo.png')}}" alt="CoolAdmin" width="72" height="72">
                        </div>
                    </div>
                    </center>
                        <h5 style="text-align: center;"><b>SEBA Login System</b><br />
                    <hr>
                    <!--end error msg-->
                    <a href="#" class="login-logo" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width: 22%;">
                        {{-- <div class="form-group">
                            <img src="{{ asset('asset/img/logo/seba.png') }}" alt="CoolAdmin" width="72" height="72">
                        </div> --}}

                    </a>
                
                        {{-- <span style="color: #0a3060;font-weight: bold"> H.S. Final Year Exam 2022</span>  --}}

                    </h5>
                    <div class="form-group">
                        <center>
                               <a href="{{route('teacher.login')}}" class="btn btn-info">Teacher Login</a> <a href="{{route('school.login')}}" class="btn btn-info">Principal Login</a>
                        </center>
                        
                    </div>

                       
                        {{-- <div class="actions"> --}}

                    </a>
                    {{-- <h5 style="text-align: center;"><b>SEBA REPORTING PORTAL</b><br />
                        {{-- <span style="color: #0a3060;font-weight: bold"> H.S. Final Year Exam 2022</span>  --}}

                    {{-- </h5> --}} 

                    {{-- <div class="form-group">
                        <input type="text" class="form-control" name="code" id="code" placeholder="Enter School Code" minlength="6" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required />
                        <br>
                        <span id="otp_message" style="color: green;"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" name="login_pin" class="form-control" placeholder="Login Pin" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required />
                        <br>
                        {{-- <span style="color: #0a58ca">Use Password or OTP sent to mobile to login</span>  --}}
                    {{-- </div> --}} 
                    {{-- <div class="actions">

                        <button type="submit" class="btn btn-info">Login</button>
                    </div> --}}
                    {{-- <a href="{{ route('so.forgot-password') }}">Forgot password?</a> --}}
                    <br>
                    {{-- <br>
                        <a href="{{ asset('pdf/manual.pdf') }}" style="color: #cb08cb;font-weight: bold">DOWNLOAD MANUAL</a><br><br>

                    <span style="color: green;font-weight: bold">Call 9957428585/8638100894 for any issues</span> --}}
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('custom-scripts')

<script>
    $(document).ready(function() {



        $('#code').keyup(function(e) {

            e.preventDefault();


            if ($(this).val().length >= 6 ) {


                $.ajax({
                    type: 'POST',
                    url: "{{ route('schoolnameajax') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",


                        "code": $(this).val(),


                    },
                    dataType: 'json',
                    success: function(data) {


                        $("#otp_message").html(data.message);
                        if (data.status === "success") {


                            $("#otp_message").css("color", "green");

                        } else {

                            $("#otp_message").css("color", "red");


                        }


                    },

                    error: function(data) {

                    }
                });

            }


        });

    });
</script>

@endsection