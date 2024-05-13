@extends('Login.layout.main')

@push('title')
    Welcome
@endpush

@section('contents')
    @if (session()->has('success'))
        <div class="p-3 mb-2 bg-success-subtle text-success-emphasis" style="width: max-content; margin: 2rem auto -5rem;">
            {{ session()->get('success') }}
        </div>
    @elseif (session()->has('failure'))
        <div class="p-3 mb-2 bg-danger-subtle text-danger-emphasis" style="width: max-content; margin: 2rem auto -5rem;">
            {{ session()->get('failure') }}
        </div>
    @endif
    <div class="login-div">
        <img src="./images/blog-icon.png" alt="">
        <h1>Your Own Personal Blog</h1>
        <div class="login-buttons">
            <a href="{{ url('/login') }}"><button type="button" class="btn btn-primary">Login <i
                        class="fa-solid fa-right-to-bracket"></i></button></a>
            <a href="{{ url('/register') }}"><button type="button" class="btn btn-dark">Register <i
                        class="fa-solid fa-address-card"></i></button></a>
        </div>
    </div>
@endsection
