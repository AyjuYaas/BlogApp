@extends('layouts.main')
@push('title')
    {{ $blog->title }}
@endpush

@section('contents')
    <div class="card border-light mb-3" style="width: 95vw;">
        <div class="card-body">
            <h5 class="card-title">{{ $blog->title }}</h5>
            <p class="card-text" style="white-space: pre-wrap; margin-bottom: 50px">{{ $blog->body }}</p>
            <a class="no-underline-button" href="{{ route('blog.edit', ['id' => $blog->blog_id]) }}">
                <button type="button" class="btn btn-dark">Edit</button>
            </a>
            <a class="no-underline" href="{{ route('blog.delete', ['id' => $blog->blog_id]) }}">
                <button type="button" class="btn btn-danger">Delete</button>
            </a>
        </div>
    </div>
@endsection
