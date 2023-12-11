@extends('layouts.app')

@section('content')
<div class="container pt-10 ">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <!-- Left Sidebar Content Goes Here -->
        </div>
        <div class="col-md-9">
            <h2 class="mb-4">Latest Posts</h2>
            <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->description }}</h2>
                            <p class="card-text">Date of Publication: {{ $post->date_de_publication }}</p>
                            <p class="card-text">Likes: {{ $post->nbLike }}</p>
                            <p class="card-text">Comments: {{ $post->nbComment }}</p>
                            <div class="d-flex justify-conetent-end ">
                                
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary ">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mx-3 ">Delete</button>
                                    <a href="{{ route('posts.show', ['id' => $post->id]) }}">View Details</a>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
