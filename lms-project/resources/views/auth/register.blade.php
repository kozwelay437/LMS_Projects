@extends('layouts.app')

@section('title', 'Register - POS Admin')

@section('content')
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-8 offset-2">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>

                        <form class="user" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="name"
                                           placeholder="Enter Name..." value="{{ old('name') }}">
                                </div>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" name="date_of_birth"
                                           placeholder="Enter Date of Birth..." value="{{ old('date_of_birth') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="gender"
                                           placeholder="Enter Gender..." value="{{ old('gender') }}">
                                </div>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" name="phone"
                                           placeholder="Phone Number..." value="{{ old('phone') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="email"
                                       placeholder="Email Address" value="{{ old('email') }}">
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user"
                                           name="password" placeholder="Password">
                                </div>

                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                           name="password_confirmation" placeholder="Repeat Password">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        </form>

                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
