@extends('layouts.logreg')

@section('title', 'Forgot Password - POS Admin')

@section('content')
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-8 offset-2">
                    <div class="p-5">
                        <div class="text-center">
                            {{-- Optional Success Message --}}
                        @if(session('status'))
                            <div class="alert alert-success mt-3">
                                {{ session('status') }}
                            </div>
                        @endif
                            <h1 class="h4 text-gray-900 mb-4">Forgot Your Password?</h1>
                            <p class="mb-4">Enter your email address below and we'll send you a password reset link.</p>
                        </div>

                        {{-- Forgot Password Form --}}
                        <form class="user" method="POST" action="{{ route('password.email') }}">
                            @csrf

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

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Send Password Reset Link
                            </button>
                        </form>

                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Remembered your password? Login!</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('register') }}">Create an Account!</a>
                        </div>

                        

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
