@extends('layouts.admin') <!-- Assuming you have a layout file -->

@section('content')
    <div class="container main-content " style="width: 60%">
        <h1 class="mb-4 text-center">Create Event</h1>

        <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data" id="event-form">
            @csrf

            <div class="form-group my-2">
                <label for="title"> Name</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Event Name"
                    value="{{ old('title') }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="form-group my-2">
                <label for="title"> Objective</label>
                <input type="text" name="objective" id="objective" class="form-control" placeholder="Event Objective"
                    value="{{ old('objective') }}">
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

            <div class="form-group my-2">
                <label for="description"> Description</label>
                <div class="form-floating">
                    <textarea class="form-control" name="description" id="description" placeholder="What are the details?"
                        style="height: 100px">{{ old('description') }}</textarea>
                    <label for="floatingTextarea2">Details</label>
                </div>
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="form-group d-flex justify-content-between my-2">
                <div style="width: 45%">

                    <label for="start_date">Start Date</label>
                    <input type="datetime-local" name="start_date" id="start_date" class="form-control"
                        value="{{ old('start_date') }}">
                    @error('start_date')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div style="width: 45%">

                    <label for="end_date">End Date</label>
                    <input type="datetime-local" name="end_date" id="end_date" class="form-control"
                        value="{{ old('end_date') }}">
                    @error('end_date')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>



            <div class="form-group my-2">
                <label for="max_participants">Max Participants</label>
                <input type="number" name="max_participants" id="max_participants" class="form-control"
                    value="{{ old('max_participants') }}">
            </div>
            @error('max_participants')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="image">Image</label>
            <div class="form-group">
                <input type="file" name="image_path" id="image_path" class="form-control-file"
                    value="{{ old('image') }}">
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

            <div>

                <button type="submit" class="btn btn-primary mt-2 ">Create Event</button>
            </div>
        </form>
    </div>
@endsection
