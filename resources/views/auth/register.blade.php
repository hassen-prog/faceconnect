@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat login_image_background "></div>
        <div class="col-xl-6 vh-100 align-items-center d-flex  rounded-3 overflow-hidden">
            <div class="card shadow-none border-0 ms-auto me-auto login-card">
                <div class="card-body rounded-0 text-left">
                    <h2 class="fw-700 display1-size display2-md-size mb-3">Create
                        <br />your account
                    </h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group icon-input mb-3">
                            <i class="font-sm ti-email text-grey-500 pe-0"></i>
                            {{-- <i class="fa-regular fa-envelope text-grey-500 pe-0"></i> --}}
                            <input type="text" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600"
                                id="name" name="name" value="{{ old('name') }}" placeholder="Your Name " />
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group icon-input mb-3">
                            <i class="font-sm ti-email text-grey-500 pe-0"></i>
                            {{-- <i class="fa-regular fa-envelope text-grey-500 pe-0"></i> --}}
                            <input type="text" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600"
                                placeholder="Your Email Address" name="email" value="{{ old('email') }}" />
                            @error('email')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group icon-input mb-3">
                            <input type="Password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3"
                                placeholder="Password" name="password" value="{{ old('password') }}" />
                            <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            @error('password')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                            {{-- <i class="fa-regular fa-lock fa-2xl"></i> --}}
                        </div>
                        <div class="form-group icon-input mb-3">
                            <input type="Password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3"
                                placeholder="Confirm Password" name="password_confirmation"
                                value="{{ old('confirm_password') }}" />
                            <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            @error('password_confirmation')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                            {{-- <i class="fa-regular fa-lock fa-2xl"></i> --}}
                        </div>
                        <div class="col-sm-12 p-0 text-left mt-4">
                            <div class="form-group mb-1">
                                <button href="/register"
                                    class="form-control text-center style2-input text-white fw-600 bg-black d-lg-block border-0 p-0">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="col-sm-12 p-0 text-left">

                        <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Already have account <a href="/login"
                                class="fw-700 ms-1">Login</a></h6>
                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection
