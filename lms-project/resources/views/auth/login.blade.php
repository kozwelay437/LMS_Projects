@extends('layouts.logreg') {{-- optional, if you have a layout file --}}
@section('title', 'POS Admin Dashboard')

@section('content')
@if(session('login_required'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
  icon: 'warning',
  title: 'Login Required',
  text: 'Please login first to access this section.',
  confirmButtonText: 'OK',
  confirmButtonColor: '#1a3a6b'
});
</script>
@endif

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-8 offset-2">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>

                                {{-- Laravel Login Form --}}
                                <form class="user" method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group">
        <input 
            type="email" 
            class="form-control form-control-user @error('email') is-invalid @enderror"
            id="email" 
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
            id="password" 
            name="password" 
            required
            placeholder="Password">
        @error('password')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
    </div>

    {{-- Forgot Password Link --}}
    <div class="text-right mb-3">
        <a class="small" href="{{ route('resetPassword') }}">Forgot Password?</a>
    </div>

    <button type="submit" class="btn btn-primary btn-user btn-block">
        Login
    </button>
    <hr>

    {{-- Social login links (optional) --}}
    <a href="{{ route('login.google') }}" class="btn btn-google btn-user btn-block">
        <i class="fab fa-google fa-fw"></i> Login with Google
    </a>
</form>

                                <hr>

                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
