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
                                    <h2 class="display2-size display2-md-size fw-700 text-white mb-0 mt-0"> Edit Recycle
                                        Station
                                    </h2>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card bg-greyblue border-0 p-4 mb-5">
                                        <p class="mb-0 mont-font font-xssss text-uppercase fw-600 text-grey-500"><i
                                                class="fa fa-exclamation-circle"></i> Make sure to put the right location
                                        </p>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 mx-auto">
                                    <div class="page-title">

                                        <form method="POST" action="{{ route('recycle-stations.update', $station->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">
                                                            Name</label>
                                                        <input type="text" name="name" id="name"
                                                            class="form-control" value="{{ $station->name }}" />
                                                    </div>
                                                    @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Address</label>
                                                        <input type="text" name="address" class="form-control"
                                                            value="{{ $station->address }}" />
                                                    </div>
                                                    @error('address')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Latitude</label>
                                                        <input type="text" name="latitude" class="form-control"
                                                            value="{{ $station->latitude }}" />
                                                    </div>
                                                    @error('latitude')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Longitude</label>
                                                        <input type="text" name="longitude" class="form-control"
                                                            value="{{ $station->longitude }}" />
                                                    </div>
                                                    @error('longitude')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Description</label>
                                                        <textarea type="text" name="description" class="form-control">{{ $station->description }}</textarea>
                                                    </div>
                                                    @error('description')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-12 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Website</label>
                                                        <input type="text" name="website"
                                                            value="{{ $station->website }}" class="form-control">
                                                    </div>
                                                    @error('website')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Phone</label>
                                                        <input type="text" name="contact_phone" class="form-control"
                                                            value="{{ $station->contact_phone }}" />
                                                    </div>
                                                    @error('contact_phone')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Email</label>
                                                        <input type="text" name="contact_email" class="form-control"
                                                            value="{{ $station->contact_email }}" />
                                                    </div>
                                                    @error('contact_email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Operating Hours:</label>
                                                        <input type="text" name="operating_hours" class="form-control"
                                                            value="{{ $station->operating_hours }}" />
                                                    </div>
                                                    @error('operating_hours')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>




                                            </div>

                                            <div class="mx-auto d-flex justify-content-center mt-4">
                                                <button class="btn btn-primary p-3 mx-auto" style="font-size: 1.3rem ">Edit
                                                    Station</button>
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
