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

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card bg-greyblue border-0 p-4 mb-5">
                                    <p class="mb-0 mont-font font-xssss text-uppercase fw-600 text-grey-500"><i
                                            class="fa fa-exclamation-circle"></i> Make sure to put the right location </p>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6">
                                <div class="page-title">
                                    <h4 class="mont-font fw-600 font-md mb-lg-5 mb-4">Main Info</h4>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <div class="form-gorup">
                                                    <label class="mont-font fw-600 font-xssss">
                                                        Name</label>
                                                    <input type="text" name="comment-name" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <div class="form-gorup">
                                                    <label class="mont-font fw-600 font-xssss">Address</label>
                                                    <input type="text" name="comment-name" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <div class="form-gorup">
                                                    <label class="mont-font fw-600 font-xssss">Latitude</label>
                                                    <input type="text" name="comment-name" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <div class="form-gorup">
                                                    <label class="mont-font fw-600 font-xssss">Longitude</label>
                                                    <input type="text" name="comment-name" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-gorup">
                                                    <label class="mont-font fw-600 font-xssss">Description</label>
                                                    <input type="text" name="comment-name" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mb-3">
                                                <div class="form-gorup">
                                                    <label class="mont-font fw-600 font-xssss">Website</label>
                                                    <input type="text" name="comment-name" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-gorup">
                                                    <label class="mont-font fw-600 font-xssss">Operating Hours:</label>
                                                    <input type="text" name="comment-name" class="form-control" />
                                                </div>
                                            </div>




                                        </div>
                                    </form>


                                </div>
                            </div>
                            <div class="col-xl-5 offset-xl-1 col-lg-6">
                                <div class="order-details">
                                    <h4 class="mont-font fw-600 font-md mb-5">Other Details</h4>
                                    <div class="table-content table-responsive mb-5 card border-0 bg-greyblue p-lg-5 p-4">
                                        <table class="table order-table order-table-2 mb-0">


                                        </table>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="card shadow-none border-0">
                                        <a href="/checkout"
                                            class="w-100 p-3 mt-3 font-xsss text-center text-white bg-current rounded-3 text-uppercase fw-600 ls-3">Place
                                            Order</a>
                                    </div>


                                </div>
                            </div>
                            <div class="mx-auto d-flex justify-content-center mt-4">
                                <button class="btn btn-primary p-3 mx-auto" style="font-size: 2rem ">Save Station</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container main-content background-div" style="width: 60%">
        <h1 class="mb-4 text-center">Create Recycle Station</h1>

        <div class="">


            <form method="post" action="{{ route('recycle.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3 ">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group mt-3">
                    <label for="address">Address:</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>
                <div class="form-group d-flex justify-content-between my-2">
                    <div style="width: 45%">

                        <label for="latitude">Latitude:</label>
                        <input type="number" name="latitude" id="latitude" class="form-control" required>
                        @error('start_date')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div style="width: 45%">

                        <label for="longitude">Longitude:</label>
                        <input type="number" name="longitude" id="longitude" class="form-control" required>

                    </div>
                </div>


                <div class="form-group mt-3">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" class="form-control" required></textarea>
                </div>
                <div class="form-group mt-3">
                    <label for="contact_email">Contact Email:</label>
                    <input type="email" name="contact_email" id="contact_email" class="form-control" required>
                </div>
                <div class="form-group mt-3">
                    <label for="contact_phone">Contact Phone:</label>
                    <input type="text" name="contact_phone" id="contact_phone" class="form-control" required>
                </div>
                <div class="form-group mt-3">
                    <label for="website">Website:</label>
                    <input type="text" name="website" id="website" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="operating_hours">Operating Hours:</label>
                    <input type="text" name="operating_hours" id="operating_hours" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="accepted_materials">Accepted Materials:</label>
                    <input type="text" name="accepted_materials" id="accepted_materials" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="services">Services:</label>
                    <input type="text" name="services" id="services" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="accessibility">Accessibility:</label>
                    <input type="text" name="accessibility" id="accessibility" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="rating">Rating:</label>
                    <input type="number" name="rating" id="rating" class="form-control" step="0.1" min="0"
                        max="5">
                </div>
                <div class="form-group mt-3">
                    <label for="image_path">Upload an Image:</label>
                    <input type="file" name="image_path" id="image_path" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary mt-5">Create Station</button>
            </form>
        </div>
    </div> --}}
@endsection
