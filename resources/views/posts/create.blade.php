@extends('layouts.app')

@section('content')
<div class="container pt-10">
    <div class="col-md-6 mx-auto">
        <h2>Create Post</h2>

        <form action="{{ route('comments.storee') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="comment" name="comment" required>
            </div>
            {{-- <div class="form-group mt-4">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" disabled>
            </div>
            <div class="form-group mt-4 ">
                <label for="video">Video</label>
                <input type="file" class="form-control-file" id="video" name="video" accept="video/*" disabled>
            </div> --}}
            <button type="submit" class="btn btn-primary mt-3">Create</button>
        </form>
        







        {{-- <form action="{{ route('comments.store') }}" method="POST" >
            @csrf

            <div class="form-group">
                <textarea name="comment" class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="What's on your mind?" required></textarea>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="comment" name="comment" required>
            </div> --

            <div class="form-group text-end my-2">
                <button type="submit" class="btn btn-primary">Comment</button>
            </div>
        </form> --}}

    </div>
</div>
@endsection
