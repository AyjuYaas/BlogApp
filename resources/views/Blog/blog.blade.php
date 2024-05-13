@extends('Blog.layout.main')

@push('home-active')
    active
@endpush

@push('name')
    {{ strtok(Auth::user()->name, ' ') . "'s" }}
@endpush

@section('contents')
    @foreach ($blogs as $blog)
        <x-individual-blog title="{{ $blog->title }}" body="{{ $blog->content }}" id="{{ $blog->blog_id }}" />
    @endforeach
@endsection
