@extends('layouts.admin')
@section('content')
    <div class="container main-content">
        <h1>Edit Forum</h1>

        <form method="POST" action="{{ route('admin.forums.update', $forum->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use PUT method for updates -->

            <div class="form-group">
                <label for="title">Forum Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $forum->title }}" required>
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="short_description">Forum Short Description</label>
                <input type="text" name="short_description" id="short_description" class="form-control" value="{{ $forum->short_description }}"
                placeholder="Short description" required>
                @error('short_description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="body">Forum Body</label>
                <textarea name="body" id="body" class="form-control" required>{{ $forum->body }}</textarea>
                @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            
            </div>
        

  

            <label for="image">Image</label>
            <div class="file-upload mt-1 mb-2">

                <div class="file-select">
                    <div class="file-select-button" id="fileName">Choose File</div>
                    <div class="file-select-name" id="noFile">
                        @if ($forum->image )
                            {{ $forum->image }}
                        @else
                            No file chosen...
                        @endif
                    </div>
                    <input type="file" name="image" id="image"  accept="image/*">
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Forum</button>
        </form>
    </div>
    <div>





    </div>
@endsection
