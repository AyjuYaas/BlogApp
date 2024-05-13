@extends('layouts.main')
@push('title')
    Blog
@endpush

@push('home-active')
    active
@endpush

@section('contents')
    @foreach ($blogs as $blog)
        <x-blog-post title="{{ $blog->title }}" body="{{ $blog->body }} " id="{{ $blog->blog_id }}" />
    @endforeach
@endsection
