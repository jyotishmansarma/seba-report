@extends('so.layout.master')

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
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
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
            <marquee style="color:red"><i class="icon-warning"></i><b>Please update your password to continue</b>
            </marquee>
            <br><br>
            <form action="{{ route('so.firstChangePassword') }}" method="post">
                @csrf
                <div class="card m-0">

                    <div class="card-header" style="background-color:#f1f6fb;">
                        <div class="card-title">Update Teacher Deatils.</div>

                    </div>

                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="centre" class="col-form-label"> School Code</label>
                                    <input type="number" class="form-control" name="code" id="code"
                                           value="" placeholder="Enter School code" readonly>

                                </div>
                            </div>
                        </div>


                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <div id="msg">
                                        <h6> Password must contain the following:</h6>
                                        <p id="length" class="invalid"> Minimum 5 Character.</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="bankName" class="col-form-label">Name</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                           placeholder="Enter Confirm password">

                                </div>
                            </div>
                        </div>
                         <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="bankName" class="col-form-label">Mobile</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                           placeholder="Enter Confirm password">

                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="bankName" class="col-form-label">Email</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                           placeholder="Enter Confirm password">

                                </div>
                            </div>
                        </div>
                         <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="bankName" class="col-form-label">Subject</label>
                                    <select class="form-control" id="examShift" name="examShift" required="">
                                        <option value="0">--Select One--</option>
                                        <option value="1">English </option>
                                        <option value="2">Maths </option>
                                        <option value="2">Science </option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="row gutters ">
                            <div class="form-group">
                                <div class="col-xl-12">

                                    <button type="submit" id="submit" class="btn btn-primary float-right">
                                        Save
                                    </button>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xl-12">
                                    <button type="reset" id="reset" class="btn btn-danger float-right" onclick="e()">
                                        Reset
                                    </button>

                                </div>
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

