@extends('teacher.layout.master')

@section('custom-style')
    <style type="text/css">
        .form-control-label {
            font-weight: bold;
        }


        #msg {
            display: none;
            background: #f1f1f1;
            color: #000;
            position: relative;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        #msg p {

            font-size: 14px;
        }

        #msg2 {
            display: none;
            background: #f1f1f1;
            color: #000;
            position: relative;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        #msg2 p {

            font-size: 14px;
        }

        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            padding-right: 20px;
            content: "✔";
        }

        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            padding-right: 20px;
            content: "✖";
        }
    </style>
@endsection

@section('main-content')
    <div class="row justify-content-center gutters">
        <div class="col-xl-6 col-lg-6 col-md-4 col-sm-12 col-12">
            @if (Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- <marquee style="color:red"><i class="icon-warning"></i><b>Login Pin</b>
            </marquee> --}}
            <br><br>
            <form action="{{ route('school.firstChangePassword') }}" method="post">
                @csrf
                <div class="card m-0">

                    <div class="card-header" style="background-color:#f1f6fb;">
                        <div class="card-title">Login Pin.</div>

                    </div>

                    <div class="card-body">
                        <div class="row">
                    <div class="col-lg-12 col-12 col-sm-10 offset-lg-2 offset-sm-1">
                        <h4 class="m-0">Your Login Pin Is : {{$login_pin}}</h4>
                        <h6> </h6>
                    </div>
                </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('custom-script')

@endsection

