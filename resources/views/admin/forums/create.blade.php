@extends('layouts.admin')
@section('content')
    <div class="container main-content">
        <h1>Edit Forum</h1>

        <form method="POST" action="{{ route('admin.forums.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="number" name="user_id" style="display: none" value="{{ auth()->user()->id }}">

            <div class="form-group">
                <label for="title">Forum Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Title"  value="{{ old('title') }}" >
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="short_description">Forum Short Description</label>
                <input type="text" name="short_description" id="short_description" class="form-control" value="{{ old('short_description') }}"  placeholder="Short description" >
                @error('short_description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="body">Forum Body</label>
                <textarea name="body" id="body" class="form-control" value="{{ old('body') }}"  placeholder="what's on your mind?" ></textarea>
                @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <label for="image">Image</label>
            <div class="file-upload mt-1 mb-2">

                <div class="file-select">
                    <div class="file-select-button" id="fileName">Choose File</div>
                    <div class="file-select-name" id="noFile">
                     
                            No file chosen...
                        
                    </div>
                    <input type="file" name="image" id="image" value="{{ old('image') }}"  accept="image/*">
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        
            <button type="submit" class="btn btn-primary">Create Forum</button>
        </form>
    </div>
    <div>





    </div>
@endsection
