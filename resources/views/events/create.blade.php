@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
    <div class="main-content bg-white">
        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left pe-0">
                <div class="row">
                    <div class="col-xl-12 cart-wrapper mb-4">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div
                                    class="card p-md-5 p-4 bg-primary rounded-3 shadow-xss bg-pattern border-0 overflow-hidden">
                                    <div class="bg-pattern-div"></div>
                                    <h2 class="display2-size display2-md-size fw-700 text-white mb-0 mt-0"> Add Event

                                    </h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card bg-greyblue border-0 p-4 mb-5">
                                    <p class="mb-0 mont-font font-xss text-uppercase fw-600 text-grey-500"><i
                                            class="fa fa-exclamation-circle"></i> Make sure to put the right location </p>
                                </div>
                            </div>

                            <div class="col-xl-8 col-lg-7 mx-auto">
                                <div class="page-title">

                                    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data"
                                        id="event-form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <div class="form-gorup">
                                                    <label for="title" class="mont-font fw-600 font-xs">
                                                        Title</label>
                                                    <input type="text" name="title" id="title" class="form-control"
                                                        placeholder="Event Name" value="{{ old('title') }}">
                                                    @error('title')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="form-group my-2">
                                                    <label for="category">Event Category</label>
                                                    <select name="category" id="category" class="form-select"
                                                        aria-label="Default select example" value="{{ old('category') }}">
                                                        <option selected>Is it in Person or Virtual</option>
                                                        <option value="Person">In Person</option>
                                                        <option value="Virtual">Virtual</option>
                                                    </select>
                                                </div>
                                                @error('category')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <div class="form-gorup">
                                                    <label for="start_date" class="mont-font fw-600 font-xss">Start
                                                        Date</label>
                                                    <input type="datetime-local" name="start_date" id="start_date"
                                                        class="form-control" value="{{ old('start_date') }}">
                                                    @error('start_date')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <div class="form-gorup">
                                                    <label for="end_date" class="mont-font fw-600 font-xss">End
                                                        Date</label>
                                                    <input type="datetime-local" name="end_date" id="end_date"
                                                        class="form-control" value="{{ old('end_date') }}">
                                                    @error('end_date')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-gorup">
                                                    <div class="form-floating">
                                                        <textarea class="form-control" name="description" id="description" placeholder="What are the details?"
                                                            style="height: 100px">{{ old('description') }}</textarea>
                                                        <label for="floatingTextarea2">Details</label>
                                                    </div>
                                                    @error('description')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mb-3">
                                                <div class="form-gorup">
                                                    <label for="title" class="mont-font fw-600 font-xss">Event
                                                        Objective</label>
                                                    <input type="text" name="objective" id="objective"
                                                        class="form-control" placeholder="Event Objective"
                                                        value="{{ old('objective') }}">
                                                </div>
                                                @error('objective')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <div class="form-gorup">
                                                    <label for="max_participants" class="mont-font fw-600 font-xss">Max
                                                        Participants</label>
                                                    <input type="number" name="max_participants" id="max_participants"
                                                        class="form-control" value="{{ old('max_participants') }}">
                                                </div>
                                                @error('max_participants')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mb-3">

                                                <label for="image" class="mont-font fw-600 font-xss">Image</label>
                                                <div class="form-group">
                                                    <input type="file" name="image_path" id="image_path"
                                                        class="form-control-file" value="{{ old('image') }}">
                                                </div>
                                                @error('image')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                            </div>


                                        </div>
                                        <div id="amenities-section">
                                            <label for="amenities" class="mont-font fw-600 font-xss">Amenities</label>
                                            <div class="form-group amenity-input d-flex justify-content-between my-2">
                                                <input type="text" class="form-control" name="amenities[]"
                                                    style="width:85%" placeholder="Amenity 1"
                                                    value="{{ old('amenities[]') }}">
                                                <button type="button" class="btn btn-success add-amenity"
                                                    style="width:10%" id="add-amenity">+</button>
                                            </div>
                                        </div>
                                        <div class="mx-auto d-flex justify-content-center mt-4">
                                            <button class="btn btn-primary p-3 mx-auto" style="font-size: 1.6rem ">Save
                                                Event</button>
                                        </div>
                                    </form>


                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
