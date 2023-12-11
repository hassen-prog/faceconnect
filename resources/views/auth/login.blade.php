@extends('layouts.auth')

@section('content')
    <div class="row ">
        <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat login_image_background "></div>
        <div class="col-xl-6 vh-100 align-items-center d-flex  rounded-3 overflow-hidden">
            <div class="card shadow-none border-0 ms-auto me-auto login-card">
                <div class="card-body rounded-0 text-left">
                    <h2 class="fw-700 display1-size display2-md-size mb-3">Login into <br />your account
                    </h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group icon-input mb-3">
                            <i class="font-sm ti-email text-grey-500 pe-0"></i>
                            {{-- <i class="fa-regular fa-envelope text-grey-500 pe-0"></i> --}}
                            <input type="text" name="email"
                                class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600"
                                placeholder="Your Email Address" value="{{ old('email') }}" autofocus />
                            @error('email')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group icon-input mb-1">
                            <input type="Password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3"
                                name="password" placeholder="Password" autocomplete="current-password" />
                            <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            @error('password')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror

                            {{-- <i class="fa-regular fa-lock fa-2xl"></i> --}}
                        </div>
                        <div class="form-check text-left mb-3">
                            <input type="checkbox" class="form-check-input mt-2" id="exampleCheck5"
                                {{ old('remember') ? 'checked' : '' }} name="remember" id="remember" />
                            <label class="form-check-label font-xsss text-grey-500">Remember me</label>
                            @if (Route::has('password.request'))
                                <a href="/forgot" class="fw-600 font-xsss text-grey-700 mt-1 float-right"
                                    href="{{ route('password.request') }}">Forgot
                                    your Password?</a>
                        </div>
                        @endif
                        <div class="col-sm-12 p-0 text-left">
                            <div class="form-group mb-1"><button
                                    class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Login</button>
                            </div>
                            <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Dont have account <a href="/register"
                                    class="fw-700 ms-1">Register</a></h6>
                        </div>
                    </form>


                    
                </div>
            </div>
        </div>

    </div>
@endsection
