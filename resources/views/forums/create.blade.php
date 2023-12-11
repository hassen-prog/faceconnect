@extends('layouts.app')

@section('content')
<div class="main-content">
    <a href="{{ route('forums.index') }}" style="margin-left:1rem" ><i class="fa-solid fa-arrow-left" ></i> Back</a>
    <form method="POST" action={{route('forums.store')}} enctype="multipart/form-data">
        @csrf
        
<div class="card w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3">
<input type="text" name="title" class="form-control mb-3" placeholder="Title">
@error('title')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<input type="text" name="short_description" class="form-control mb-3" placeholder="Short Description">
@error('short_description')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<input type="number" name="user_id" style="display: none" value="{{ auth()->user()->id }}">
    <div class="card-body p-0 mt-3 position-relative">
    
        <textarea name="body"
                  class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss fw-500 border-light-md theme-dark-bg"
                  cols="30" rows="10" placeholder="What's on your mind?"></textarea>
                  @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
    </div>
    <div class="card-body d-flex p-0 mt-0">
    
        <label for="image"
           class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4 btn btn-success mx-auto mb-2"><i
            class="font-md text-success feather-image me-2"></i><span
            class="d-none-xs text-white">Photo/Video</span></label>
       
                <input type="file" name="image" id="image" class="form-control-file" style="display: none" accept="image/*" required>
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        </div>
<button class="btn btn-secondary mx-auto">Submit</button>
    </form>
</div>
@endsection