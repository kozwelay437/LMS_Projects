@extends('layouts.logreg')

@section('title', 'Reset Password - POS Admin')

@section('content')
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-8 offset-2">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                        </div>

                        <form class="user" method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <input 
                                    type="email" 
                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autofocus
                                    placeholder="Enter Email Address...">
                                @error('email')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input 
                                    type="password" 
                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                    name="password" 
                                    required
                                    placeholder="New Password">
                                @error('password')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input 
                                    type="password" 
                                    class="form-control form-control-user"
                                    name="password_confirmation" 
                                    required
                                    placeholder="Confirm New Password">
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Reset Password
                            </button>
                        </form>

                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
