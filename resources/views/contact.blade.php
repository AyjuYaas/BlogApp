@extends('layouts.main')
@push('title')
    Contact
@endpush
@push('contact-active')
    active
@endpush

@section('contents')
    <h1 style="text-align: center; margin-top: 20px">You can Find Me At:</h1>
    <div class="contact">
        <a href="mailto:sayujya57@gmail.com" target="_blank" class="no-underline-button">
            <i class="fa-solid fa-envelope-open-text fa-4x"></i>
        </a>
        <a href="https://www.instagram.com/sayuzya._/" target="_blank" class="no-underline-button">
            <i class="fa-brands fa-instagram fa-4x"></i>
        </a>
        <a href="https://github.com/AyjuYaas" target="_blank" class="no-underline-button">
            <i class="fa-brands fa-github fa-4x"></i>
        </a>
    </div>
@endsection
