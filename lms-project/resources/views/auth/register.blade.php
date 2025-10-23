@extends('layouts.logreg')

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
                        {{-- Alert Messages --}}
@if ($errors->any())
    <div class="alert alert-danger border-left-danger">
        <h6 class="fw-bold mb-2">⚠️ Please fix the following errors:</h6>
        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger border-left-danger">
        <strong>❌ Error:</strong> {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success border-left-success">
        <strong>✅ Success!</strong> {{ session('success') }}
    </div>
@endif


                        <form class="user" method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- Name & Role --}}
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="name"
                                           placeholder="Full Name" value="{{ old('name') }}">
                                </div>

                                <div class="col-sm-6">
                                    <select name="role" class="form-control form-control-user">
                                        <option value="">-- Select Role --</option>
                                        <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                                        <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Email & Phone --}}
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="email" class="form-control form-control-user" name="email"
                                           placeholder="Email Address" value="{{ old('email') }}">
                                </div>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" name="phone"
                                           placeholder="Phone Number" value="{{ old('phone') }}">
                                </div>
                            </div>

                            {{-- Common Address --}}
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="address"
                                       placeholder="Address" value="{{ old('address') }}">
                            </div>

                            {{-- Teacher Fields --}}
                            <div class="teacher-fields" style="display: none;">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                               name="department" placeholder="Department"
                                               value="{{ old('department') }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                               name="designation" placeholder="Designation"
                                               value="{{ old('designation') }}">
                                    </div>
                                </div>
                            </div>

                            {{-- Student Fields --}}
<div class="student-fields" style="display: none;">
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user"
                   name="roll_no" placeholder="Roll No"
                   value="{{ old('roll_no') }}">
        </div>

        <div class="col-sm-4">
            <select name="year" class="form-control form-control-user">
                <option value="">-- Select Year --</option>
                <option value="First Year" {{ old('year') == 'First Year' ? 'selected' : '' }}>First Year</option>
                <option value="Second Year" {{ old('year') == 'Second Year' ? 'selected' : '' }}>Second Year</option>
                <option value="Third Year" {{ old('year') == 'Third Year' ? 'selected' : '' }}>Third Year</option>
            </select>
        </div>

        <div class="col-sm-4">
            <input type="text" class="form-control form-control-user"
                   name="major" placeholder="Major (e.g. IT)"
                   value="{{ old('major') }}">
        </div>
    </div>
</div>


                            {{-- Password --}}
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

{{-- JS for Role Toggle --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roleSelect = document.querySelector('select[name="role"]');
        const teacherFields = document.querySelector('.teacher-fields');
        const studentFields = document.querySelector('.student-fields');

        function toggleFields() {
            if (roleSelect.value === 'teacher') {
                teacherFields.style.display = 'block';
                studentFields.style.display = 'none';
            } else if (roleSelect.value === 'student') {
                teacherFields.style.display = 'none';
                studentFields.style.display = 'block';
            } else {
                teacherFields.style.display = 'none';
                studentFields.style.display = 'none';
            }
        }

        roleSelect.addEventListener('change', toggleFields);
        toggleFields();
    });
</script>

@endsection
