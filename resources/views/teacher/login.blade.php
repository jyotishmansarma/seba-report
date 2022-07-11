@extends('login_layout.master')

@section('main-content')

    <form method="POST" action="{{ route('teacher.auth') }}">
        @csrf
        <div class="row justify-content-md-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">

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
                    <!--end error msg-->
                        <a href="#" class="login-logo" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width: 22%;">
                            <div class="form-group">
                                <img src="{{ asset('asset/img/logo/seba.png') }}" alt="CoolAdmin" width="72"
                                     height="72">
                            </div>

                        </a>
                        <h5 style="text-align: center;"><b>SEBA REPORTING PORTAL</b><br/>
                            {{--  <span style="color: #0a3060;font-weight: bold"> H.S. Final Year Exam 2022</span>  --}}

                        </h5>

                        <div class="form-group">
                            <input type="text" class="form-control" name="code" id="old"
                                   placeholder="Enter School Code"
                                   minlength="7" maxlength="7"
                                  
                                   required/>
                            <br>
                            <span id="school_name" style="color: green"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="login_pin" class="form-control" placeholder="Login Pin"
                                 oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  minlength="4" maxlength="4" required/>
                            <br>
                            {{--  <span style="color: #0a58ca">Use Password or OTP sent to mobile to login</span>  --}}
                        </div>
                        <div class="actions">

                            <button type="submit" class="btn btn-info">Login</button>
                        </div>
                        {{--  <a href="{{ route('so.forgot-password') }}">Forgot password?</a>  --}}
                        <br>
                        {{--  <br>
                        <a href="{{ asset('pdf/manual.pdf') }}" style="color: #cb08cb;font-weight: bold">DOWNLOAD MANUAL</a><br><br>

                        <span style="color: green;font-weight: bold">Call 9957428585/8638100894 for any issues</span>  --}}
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('custom-scripts')

    {{--  <script>


        $(document).ready(function () {
            $('#old').keyup(function (e) {

                e.preventDefault();


                var x = $(this).val();

                if (x.length === 10) {
                    $.ajax({

                        type: 'POST',


                        url: "{{ route('so.name') }}",

                        data: {mobile: x, _token: "{{ csrf_token() }}"},

                        success: function (data) {

                            var m = JSON.parse(data);
                            if (m.status === "success") {

                                $("#school_name").html(m.name);
                                $("#school_name").css('color', 'green');

                            } else {

                                $("#school_name").html("");
                                $("#school_name").css('color', 'red');
                            }
                        }
                    });
                }
            });
        });

    </script>  --}}

@endsection
