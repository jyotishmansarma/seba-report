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
<div class="row">
    <div class="col-md-3">
        <img src="{{ asset('asset/img/logo/seba.png') }}" alt="CoolAdmin" width="100" height="100">
    </div>
    <div class="col-md-6">
        <div class="row justify-content-center gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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
                <br><br>
                <form action="{{ route('teacher.teacher_details') }}" method="post">
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
                                        <input type="Text" class="form-control" name="code" id="code" value="{{Auth::guard('school')->user()->code}}" placeholder="Enter School code" readonly>

                                    </div>
                                </div>
                            </div>



                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="bankName" class="col-form-label">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Name">

                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="bankName" class="col-form-label">Mobile</label>
                                        <input type="text" class="form-control" name="mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" minlength="10" maxlength="10" placeholder="Enter Mobile">
                                        <br>
                                        <button class="btn btn-primary btm-sm" disabled>Send OTP</button>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="bankName" class="col-form-label">Enter OTP</label>
                                        <input type="text" class="form-control" name="otp" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="Enter OTP" minlength="4" maxlength="6">

                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="bankName" class="col-form-label">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter Email">

                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="bankName" class="col-form-label">Subject</label>
                                        <select class="form-control" id="examShift" name="subject" required="">
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
                                {{-- <div class="form-group">
                                <div class="col-xl-12">
                                    <button type="reset" id="reset" class="btn btn-danger float-right" onclick="e()">
                                        Reset
                                    </button>

                                </div>
                            </div> --}}

                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <img src="{{asset('asset/img/eduaid-logo.png')}}" alt="CoolAdmin" width="100" height="100" style="float: right;"/>
    </div>
</div>



@endsection

@section('custom-script')

@endsection