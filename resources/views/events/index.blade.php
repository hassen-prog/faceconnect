@extends('layouts.app')
@section('content')
    <div class="main-content right-chat-active">
        <div class="middle-sidebar-bottom ">
            <div class="middle-sidebar-left pe-0">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="col-xl-12">
                            <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                                <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900 d-flex align-items-center">Events
                                    <form action="{{ route('events.index') }}" method="GET" class="pt-0 pb-0 ms-auto">
                                        <div class="d-flex justify-content-center align-items-center">

                                            <div class="search-form-2 me-2 ">
                                                <i class="fa-solid fa-search font-xss"></i>

                                                <input type="text" name="search" id="search-input"
                                                    value="{{ request('search') }}"
                                                    class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0"
                                                    placeholder="Search here." />

                                            </div>
                                            <a href="/"
                                                class="btn-round-md ms-2 bg-greylight theme-dark-bg rounded-3"><i
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

                            </div>
                        </div>
                    </div>
                    <div class="row   ">
                        <div class="d-flex justify-content-end my-2">
                            <a class="btn btn-primary" href="events/create">Create Event</a>

                        </div>
                        @foreach ($formattedEvents as $event)
                            <div class="col-lg-4 col-md-6 pe-2 ps-2">
                                <div
                                    class="card p-3 bg-white w-100 hover-card border-0 shadow-xss rounded-xxl border-0 mb-3 overflow-hidden ">

                                    <div class="card-image w-100">
                                        <img src="{{ asset('images/events/' . $event->image_path) }}" alt="event"
                                            class=" rounded-3" style="height: 250px;width:100%;object-fit:contain" />
                                    </div>
                                    <div class="card-body d-flex ps-0 pe-0 pb-0">
                                        <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg">
                                            <h4 class="fw-700 font-lg ls-3 text-grey-900 mb-0 text-center"><span
                                                    class="ls-3 d-block font-xsss text-grey-500 fw-500">{{ $event->month }}</span>{{ $event->day_of_month }}
                                            </h4>
                                        </div>
                                        <h2 class="fw-700 lh-3 font-xss"><a
                                                href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a>
                                            <span class="d-flex font-xssss fw-500 mt-2 lh-3 text-grey-500"> <i
                                                    class="fa-solid fa-location-pin me-1"></i>Paris </span>
                                        </h2>
                                    </div>
                                    <div class="mt-4">
                                        <h2 class="fw-700 lh-3 font-xs">{{ $event->description }}

                                        </h2>
                                    </div>
                                    <div class="card-body d-flex justify-content-between align-items-center p-0 mt-4">
                                        <div class="d-flex   ">
                                            <div class="text-center" style="width:45%">
                                                <h4 class="fw-700 font-sm">
                                                    {{ $event->participants_count }}<span
                                                        class="font-xsssss fw-500 mt-1 text-grey-500 d-block">Particpants
                                                    </span>
                                                </h4>

                                            </div>
                                            <div class="text-center" style="width:45%">
                                                <h4 class="fw-700 font-sm">
                                                    {{ $event->max_participants - $event->participants_count }}<span
                                                        class="font-xsssss fw-500 mt-1 text-grey-500 d-block">Available
                                                        Places</span>
                                                </h4>

                                            </div>


                                        </div>
                                        <div>
                                            @if (now() > $event->end_date)
                                                <a href="{{ route('events.show', $event->id) }}"
                                                    style="background-color: grey;font-size:0.5rem"
                                                    class=" fw-600 ps-3 pe-3 lh-32 float-right  text-uppercase rounded-3 ls-2  d-inline-block text-white ">Participation
                                                    Closed</a>
                                            @elseif($event->max_participants == $event->participants_count)
                                                <a href="{{ route('events.show', $event->id) }}" style="font-size:0.5rem"
                                                    class="font-xsssss fw-700 ps-3 pe-3 lh-32 float-right  text-uppercase rounded-3 ls-2 bg-danger d-inline-block text-white ">Event
                                                    Full</a>
                                            @else
                                                <a href="{{ route('events.show', $event->id) }}"
                                                    class="font-xsssss fw-700 ps-3 pe-3 lh-32 float-right  text-uppercase rounded-3 ls-2 bg-primary d-inline-block text-white ">APPLY</a>
                                            @endif
                                        </div>


                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
