@extends('layouts.main')
@push('title')
    {{ $title }}
@endpush
@push('create-active')
    {{ $active }}
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
            <label for="body" class="form-label">Body</label>
            <textarea name="body" id="form-control" class="form-control" cols="30" rows="10">{{ $blog->body }}</textarea>

            <span class="text-danger">
                @error('body')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <button type="submit" class="btn btn-dark">{{ $button }}</button>
    </form>
@endsection
