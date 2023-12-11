@extends('layouts.admin') <!-- Assuming you have a layout file -->

@section('content')
    <div class="container main-content " style="width: 60%">
        <h1 class="mb-4 text-center">Create Objectif</h1>

        <form method="POST" action="{{ route('objectifs.store') }}" enctype="multipart/form-data" id="objectif-form">
            @csrf

            <div class="form-group my-2">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Objectif Name"
                    value="{{ old('name') }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group my-2">
                <label for="description">Description</label>
                <div class="form-floating">
                    <textarea class="form-control" name="description" id="description" placeholder="Describe the objective"
                        style="height: 100px">{{ old('description') }}</textarea>
                    <label for="description">Details</label>
                </div>
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="image">Image</label>
            <div class="form-group">
                <input type="file" name="image" id="image" class="form-control-file"
                    value="{{ old('image') }}">
            </div>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div>
                <button type="submit" class="btn btn-primary mt-2 ">Create Objectif</button>
            </div>
        </form>
    </div>
@endsection
