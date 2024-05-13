@extends('Blog.layout.main')
@push('title')
    {{ $title }}
@endpush
@push('create-active')
    {{ $active }}
@endpush

@push('name')
    {{ strtok(Auth::user()->name, ' ') . "'s" }}
@endpush

@section('contents')
    <form method="post" action="{{ $url }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input name ="title" type="text" class="form-control" id="title" aria-describedby="emailHelp"
                value="{{ $blog->title }}" />

            <span class="text-danger">
                @error('title')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Content</label>
            <textarea name="content" id="form-control" class="form-control" cols="30" rows="10">{{ $blog->content }}</textarea>

            <span class="text-danger">
                @error('content')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <button type="submit" class="btn btn-dark">{{ $button }} </button>
    </form>
@endsection
