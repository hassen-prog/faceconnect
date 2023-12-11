@extends('layouts.admin')

@section('content')
    <div class="container main-content" style="width: 60%">
        <h1 class="mb-4 text-center">Edit Event</h1>

        <form method="POST" action="{{ route('events.update', $event->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title"> Name</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group my-2">
                <label for="title"> Objective</label>
                <input type="text" name="objective" id="objective" class="form-control" placeholder="Event Objective"
                    value={{ $event->objective }}>
            </div>

            @error('objective')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group my-2">
                <label for="category"> Category</label>
                <select name="category" id="category" class="form-select" aria-label="Default select example"
                    value="{{ old('category') }}">
                    <option selected>Is it in Person or Virtual</option>
                    <option value="Person">In Person</option>
                    <option value="Virtual">Virtual</option>
                </select>

            </div>
            @error('category')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="description"> Description</label>
                <textarea name="description" id="description" class="form-control">{{ $event->description }}</textarea>
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror



            <div class="form-group d-flex justify-content-between my-2">
                <div style="width: 45%">

                    <label for="start_date">Start Date</label>
                    <input type="datetime-local" name="start_date" id="start_date" class="form-control"
                        value={{ \Carbon\Carbon::parse($event->start_date)->format('Y-m-d\TH:i') }}>

                    @error('start_date')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div style="width: 45%">

                    <label for="end_date">End Date</label>
                    <input type="datetime-local" name="end_date" id="end_date" class="form-control"
                        value={{ \Carbon\Carbon::parse($event->end_date)->format('Y-m-d\TH:i') }}>
                    @error('end_date')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            @error('end_date')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="max_participants">Max Participants</label>
                <input type="number" name="max_participants" id="max_participants" class="form-control"
                    value="{{ $event->max_participants }}">
            </div>
            @error('max_participants')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="image mt-2 mb-2">Image</label>
            <div class="form-group mt-2 mb-2 ">
                <input type="file" name="image_path" id="image_path" class="form-control-file"
                    value="{{ $event->image_path }}">
            </div>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div id="amenities-section">
                <label for="amenities">Amenities</label>
                <div class="form-group amenity-input d-flex justify-content-between my-2">
                    <input type="text" class="form-control" name="amenities[]" style="width:85%" placeholder="Amenity 1"
                        value="{{ old('amenities[]') }}">
                    <button type="button" class="btn btn-success add-amenity" style="width:10%" id="add-amenity">+</button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
    </div>
@endsection
