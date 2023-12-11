@extends('layouts.app')
<link href='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css' rel='stylesheet' />

@section('content')
    <div class="main-content ">
        <div class="middle-sidebar-bottom">
            <div class="mx-auto pe-0" style="width:90%;maxWidth: 100%">
                <div class="row">
                    <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900 d-flex align-items-center mb-5">Recycle Stations
                        <form action="{{ route('recycle.index') }}" method="GET" class="pt-0 pb-0 ms-auto">
                            <div class="d-flex justify-content-center align-items-center">

                                <div class="search-form-2 me-2 ">
                                    <i class="fa-solid fa-search font-xss"></i>

                                    <input type="text" name="search" id="search-input" value="{{ request('search') }}"
                                        class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0"
                                        placeholder="Search here." />

                                </div>
                                <a href="/" class="btn-round-md ms-2 bg-greylight theme-dark-bg rounded-3"><i
                                        class="fa-solid fa-filter font-xss text-grey-500"></i></a>

                                <div class="me-2">

                                    @if (request('search'))
                                        <a href="{{ route('events.index') }}"
                                            class="btn btn-secondary mb-0 text-white">Clear</a>
                                    @endif
                                </div>

                            </div>

                        </form>

                    </h2>
                    <div class="col-xl-5 chat-left scroll-bar">

                        <div class="row ps-2 pe-2">
                            @if ($stations->isEmpty())
                                <p>No recycle stations found.</p>
                            @else
                                @foreach ($stations as $station)
                                    <div key={index} class="col-lg-6 col-md-6 col-sm-6 mb-3 pe-2 ps-2">
                                        <div
                                            class="card w-100 p-0 hover-card shadow-xss border-0 rounded-3 overflow-hidden me-1">
                                            <span
                                                class="font-xsssss fw-700 ps-3 pe-3 lh-32 text-uppercase rounded-3 ls-2 bg-primary-gradiant d-inline-block text-white position-absolute mt-3 ms-3 z-index-1">Featured</span>
                                            <div class="card-image w-100 mb-3">
                                                <a class="position-relative d-block"><img
                                                        src="{{ asset('images/recycle-stations/' . $station->image_path) }}"
                                                        alt="hotel" class="w-100" style="height: 200px" /></a>
                                            </div>
                                            <div class="card-body pt-0">
                                                <i
                                                    class="feather-bookmark font-md text-grey-500 position-absolute right-0 me-3"></i>
                                                <h4 class="fw-700 font-xss mt-0 lh-28 mb-0"><span
                                                        class="text-dark text-grey-900" data-marker="marker">
                                                        {{ $station->name }}</span></h4>
                                                <h6 class="font-xsssss text-grey-500 fw-600 mt-0 mb-2">
                                                    {{ $station->address }}
                                                </h6>
                                                <div class="star d-block w-100 text-left mt-0">
                                                    <img src="{{ asset('images/star.png') }}" alt="star"
                                                        class="w15 me-1 float-left" />
                                                    <img src="{{ asset('images/star.png') }}" alt="star"
                                                        class="w15 me-1 float-left" />
                                                    <img src="{{ asset('images/star.png') }}" alt="star"
                                                        class="w15 me-1 float-left" />
                                                    <img src="{{ asset('images/star.png') }}" alt="star"
                                                        class="w15 me-1 float-left" />
                                                    <img src="{{ asset('images/star-disable.png') }}" alt="star"
                                                        class="w15 me-1 float-left me-2" />
                                                </div>
                                                <div class="mt-4 w-100"></div>
                                                <h5 class="mt-3 d-inline-block font-xssss fw-600 text-grey-500 me-2"><i
                                                        class="btn-round-sm bg-greylight fa-solid fa-phone text-grey-500 me-1"></i>
                                                    {{ $station->contact_phone }}</h5>
                                                <a href="{{ $station->website }}"
                                                    class="mt-3 d-inline-block font-xssss fw-600 text-grey-500 me-2">
                                                    {{ $station->website }}</a>
                                                <h5 class="mt-3 font-xssss fw-600 text-grey-800">
                                                    Accepted Materials
                                                </h5>

                                                <p>{{ $station->accepted_materials }}</p>
                                                <div class="clearfix"></div>
                                                @if ($station->status == 'active')
                                                    <div class="text-center">

                                                        <span class="font-lg fw-700 mt-0 pe-3 ls-2 lh-32  text-success ">
                                                            Opened
                                                        </span>
                                                    </div>
                                                @else
                                                    <div class="text-center">
                                                        <span
                                                            class="font-lg fw-700 mt-0 pe-3 ls-2 lh-32 d-inline-block text-danger ">
                                                            Closed
                                                        </span>
                                                    </div>
                                                @endif
                                                <div class="text-center">

                                                    <p class="mt-3 d-inline-block font-xssss fw-600 text-grey-500 me-2">
                                                        {{ $station->operating_hours }}</p>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>


                    </div>


                    <div class="col-xl-7 ps-0 d-none d-xl-block">
                        <x-mapbox id="mapId" style="width: 700px; height: 84vh; margin-top: 13rem" :zoom="10"
                            :navigationControls="true" :center="['long' => 10.1815, 'lat' => 36.8065]" :markers="$markers" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<script src='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.js'></script>
<script>
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('click', (e) => {
            const markerId = e.currentTarget.getAttribute('data-marker');
            const marker = map.getSource(markerId);

            if (marker) {
                // Change the marker's behavior, e.g., bounce, change color, show details
                // Here's an example of changing marker color to red:
                map.setPaintProperty(markerId, 'circle-color', 'red');
                // You can also zoom to the marker or open a popup for details
                // For bouncing, you might need a CSS animation for the marker
            }
        });
    });
</script>
