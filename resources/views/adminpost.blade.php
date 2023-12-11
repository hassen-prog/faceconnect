<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

@extends('layouts.admin')

@section('content')
    <div class="main-content bg-white">
        <div class="middle-sidebar-bottom">
            <div class="mx-auto pe-0" style="width:94%;">
                <div class="row w-150">
                    <h1>Posts</h1>
                    <table class="table table-hover w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Description</th>
                                <th scope="col">Publication Date</th>
                                <th scope="col">publisher Name</th>
                                <th scope="col">publisher Email</th>
                                <th scope="col">Likes</th>
                                <th scope="col">Comments</th>
                                <th scope="col">Image</th>
                                <th scope="col">Actions</th>
                                 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <th scope="row">{{ $post->id }}</th>
                                    <td>{{ $post->description }}</td>
                                    <td>{{ $post->date_de_publication }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $post->nbLike }}</td>
                                    <td>{{ $post->nbComment }}</td>

                                    <td>
                                        @if ($post->image)
                                            <a href="{{ asset('images/' . $post->image) }}" data-lightbox="image-{{ $post->id }}">
                                                <img src="{{ asset('images/' . $post->image) }}" alt="Post Image" class="img-thumbnail" width="100">
                                            </a>
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.deletepost', $post->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
