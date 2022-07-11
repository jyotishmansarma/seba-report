@extends('login_layout.master')

@section('main-content')

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row justify-content-md-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">

                <div class="login-screen">

                    <div class="login-box">
                        <!--error msg-->
                        @if (Session::get('error'))
                            <div class="alert alert-warning" role="alert">
                                {{ Session::get('error') }}<button type="button" class="close"
                                    data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        @endif
                        <!--end error msg-->
                        <a href="#" class="login-logo" style="display: block;
                                                                margin-left: auto;
                                                                margin-right: auto;
                                                                width: 22%;">
                            <div class="form-group">
                                <img src="{{ asset('asset/img/logo/ahsec_logo.png') }}" alt="CoolAdmin" width="72"
                                    height="72">
                            </div>

                        </a>
                        @if (Request::is('admin/*'))
                            <h5 style="text-align: center;"><b>AHSEC ADMIN REPORTING PORTAL</b><br /></h5>
                        @else
                            <h5 style="text-align: center;"><b>Welcome to sos report view pannel</b><br /></h5>
                        @endif
                            <div class="form-group">
                                <input type="text" class="form-control" name="user_name" placeholder="Enter User name" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" />
                            </div>
                            <div class="actions">
                                {{-- <a href="forgot-pwd.html">Recover password</a> --}}
                                <button type="submit" class="btn btn-info">Login</button>
                            </div>
                            <hr>

                            {{-- <div class="m-0">
                        <span class="additional-link">No account? <a href="signup.html" class="btn btn-secondary">Signup</a></span>
                    </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
