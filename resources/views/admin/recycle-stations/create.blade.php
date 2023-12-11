@extends('layouts.app')

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
                                    <h2 class="display2-size display2-md-size fw-700 text-white mb-0 mt-0"> Add Recycle
                                        Station
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('recycle-stations.store') }}" enctype="multipart/form-data"
                            id="event-form">
                            @csrf

                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="card bg-greyblue border-0 p-4 mb-5">
                                        <p class="mb-0 mont-font font-xssss text-uppercase fw-600 text-grey-500"><i
                                                class="fa fa-exclamation-circle"></i> Make sure to put the right location
                                            from
                                            google maps </p>
                                    </div>

                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div class="page-title">
                                        <h4 class="mont-font fw-600 font-md mb-lg-5 mb-4">Main Info</h4>
                                        <div>
                                            <div class="row">
                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">
                                                            Name</label>
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ old('name') }}" />
                                                    </div>
                                                    @error('name')
                                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Address</label>
                                                        <input type="text" name="address" class="form-control"
                                                            value="{{ old('address') }}" />
                                                    </div>
                                                    @error('address')
                                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Latitude</label>
                                                        <input type="text" name="latitude" class="form-control"
                                                            value="{{ old('latitude') }}" />
                                                    </div>
                                                    @error('latitude')
                                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Longitude</label>
                                                        <input type="text" name="longitude" class="form-control"
                                                            value="{{ old('longitude') }}" />
                                                    </div>
                                                    @error('longitude')
                                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Description</label>
                                                        <input type="text" name="description" class="form-control"
                                                            value="{{ old('description') }}" />
                                                    </div>
                                                    @error('description')
                                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-12 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Website</label>
                                                        <input type="text" name="website" class="form-control"
                                                            value="{{ old('website') }}" />
                                                    </div>
                                                    @error('website')
                                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mx-auto d-flex justify-content-center mt-4">
                                                <button class="btn btn-primary p-3 mx-auto" style="font-size: 2rem ">Save
                                                    Station</button>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-xl-5 offset-xl-1 col-lg-6">
                                    <div class="order-details">
                                        <h4 class="mont-font fw-600 font-md mb-5">More Details</h4>
                                        <div
                                            class="table-content table-responsive mb-5 card border-0 bg-greyblue p-lg-5 p-4">
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-gorup">
                                                    <label class="mont-font fw-600 font-xssss">Contact Phone</label>
                                                    <input type="number" name="contact_phone" class="form-control"
                                                        value="{{ old('contact_phone') }}" />
                                                </div>
                                                @error('contact_phone')
                                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-gorup">
                                                    <label class="mont-font fw-600 font-xssss">Contact Email</label>
                                                    <input type="email" name="contact_email" class="form-control"
                                                        value="{{ old('contact_email') }}" />
                                                </div>
                                                @error('contact_email')
                                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-gorup">
                                                    <label class="mont-font fw-600 font-xssss">Operating Hours</label>
                                                    <input type="text" name="operating_hours" class="form-control"
                                                        placeholder="Mon-Fri: 8 AM - 6 PM, Sat: 9 AM - 2 PM"
                                                        value="{{ old('operating_hours') }}" />
                                                </div>
                                                @error('operating_hours')
                                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-gorup">
                                                    <label class="mont-font fw-600 font-xssss">Accepted Materials</label>
                                                    <input type="text" name="accepted_materials" class="form-control"
                                                        placeholder="Plastic, Aluminum, Paper"
                                                        value="{{ old('accepted_materials') }}" />
                                                </div>
                                                @error('accepted_materials')
                                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
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

                                        <div class="clearfix"></div>




                                    </div>
                                </div>
                        </form>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
