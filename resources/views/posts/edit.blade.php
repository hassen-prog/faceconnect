@extends('layouts.app')

@section('content')
<div class="container main-content">
    <div class="col-md-10 mx-4 my-2">
        <h2>Edit Post Description </h2>

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="description"></label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $post->description }}" >
                @error('description')
                 <span class="text-danger">{{ $message }}</span>
               @enderror
            </div>
            <div class="col-sm-12 p-1 my-3">
                <img src="{{ asset('images/' . $post->image) }}" alt="avater" class="rounded-3 w-100" alt="post" />
            </div>
            <button type="submit" class="btn btn-primary my-3">Update</button>
        </form>
    </div>
</div>
@endsection
