@extends('Login.layout.main')

@push('title')
    Register
@endpush

@section('contents')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="login-div">
        <h1>Register</h1>
        <form method='post' action={{ url('/register') }}>
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" />
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" />
            </div>
            <button type="submit" class="btn btn-primary">Register <i class="fa-solid fa-address-card"></i></button>
            <span>Already Have an Account?</span>
            <a href="{{ url('/login') }}">Login</a>
        </form>
    </div>
@endsection
