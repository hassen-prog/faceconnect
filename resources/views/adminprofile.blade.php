<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

@extends('layouts.admin')

@section('content')
    <div class="main-content bg-white">
        <div class="middle-sidebar-bottom">
            <div class="mx-auto pe-0" style="width:94%;">
                <div class="row w-150">
                    <h1>Profiles</h1>
                    <table class="table table-hover w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"> Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Country</th>
                                <th scope="col">Address</th>
                                <th scope="col">Town</th>
                                <th scope="col">Postcode</th>
                                <th scope="col">Description</th>
                                <th scope="col">Profile Picture</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profiles as $profile)
                            @php
                $user = \App\Models\User::find($profile->user_id); // Replace with your actual User model namespace
            @endphp

                                <tr>
                                    <th scope="row">
                                {{ $profile->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $profile->phone }}</td>
                                    <td>{{ $profile->country }}</td>
                                    <td>{{ $profile->address }}</td>
                                    <td>{{ $profile->town }}</td>
                                    <td>{{ $profile->postcode }}</td>
                                    <td>{{ $profile->description }}</td>
                                    <td>
                                        @if ($profile->profile_picture)
                                            <a href="{{ asset('images/' . $profile->profile_picture) }}" data-lightbox="image-{{ $profile->id }}">
                                                <img src="{{ asset('images/' . $profile->profile_picture) }}" alt="Profile Picture" class="img-thumbnail" width="100">
                                            </a>
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                   
                                    <td>
                                        <a href="{{ route('admin.profile.posts', $profile->id) }}" class="btn btn-primary">
                                            View Posts
                                        </a>
                                        <form action="{{ route('admin.deleteprofile', $profile->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this profile?')">Delete</button>
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
