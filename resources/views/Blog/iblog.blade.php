@extends('Blog.layout.main')
@push('title')
    {{ $blog->title }}
@endpush
@push('name')
    {{ strtok(Auth::user()->name, ' ') . "'s" }}
@endpush
@section('contents')
    <div class="card border-light mb-3" style="width: 95vw;">
        <div class="card-body">
            <h5 class="card-title">{{ $blog->title }}</h5>
            <p class="card-text" style="white-space: pre-wrap; margin-bottom: 50px">{{ $blog->content }}</p>

            <p class="text-sm-end" style="font-size: 0.9rem; color: #778da9">{{ $blog->updated_at }}</p>
            <a class="no-underline-button" href="{{ route('edit-blog', ['id' => $blog->blog_id]) }}">

                <button type="button" class="btn btn-dark">Edit <i class="fa-solid fa-pen-to-square"></i></button>
            </a>
            <a class="no-underline" href="{{ route('delete-blog', ['id' => $blog->blog_id]) }}">

                <button type="button" class="btn btn-danger">Delete <i class="fa-solid fa-trash"></i></button>
            </a>
        </div>
    </div>
@endsection
