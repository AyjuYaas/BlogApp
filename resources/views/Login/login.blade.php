@extends('Login.layout.main')

@push('title')
    Login
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
        <h1>Login</h1>
        <form method='post' action={{ url('/login') }}>
            @csrf
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" />
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" />
            </div>
            <button type="submit" class="btn btn-primary">Login <i class="fa-solid fa-right-to-bracket"></i></button>
            <span>No Account?</span>
            <a href="{{ url('/register') }}">Register</a>
        </form>
    </div>
@endsection
