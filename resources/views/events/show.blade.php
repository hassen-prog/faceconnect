@extends('layouts.app')
@section('content')
    <div class="main-content right-chat-active">
        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left pe-0">
                <div class="row">
                    <div class="col-xl-12 col-xxl-12 col-lg-12">
                        <div>

                            <img src="{{ asset('images/events/'.$event->image_path) }}" alt="event" class="w-100 rounded-3"
                                style="max-height: 400px" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-xxl-9 col-lg-8">

                        <div class="card d-block mt-3 border-0 shadow-xss bg-white p-lg-4 p-4">
                            <div class="d-flex justify-content-end">
                                @if (auth()->check() && auth()->user()->id === $event->organizer_id)
                                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-success   m-1"><i
                                            class="fa-solid fa-pen-to-square "></i></a>
                                @endif

                            </div>

                            <h2 class="fw-700 font-lg mt-3 mb-2">{{ $event->title }}</h2>
                            <p class="font-xsss fw-500 text-grey-500 lh-30 pe-5 mt-3 me-5">{{ $event->objective }}</p>

                            <div class="clearfix"></div>


                            <div class="d-flex">

                                @if (now() > $event->end_date)
                                    <button
                                        class=" border-0 text-white fw-600 text-uppercase font-xssss float-left rounded-3 d-inline-block mt-0 p-2 lh-34 text-center ls-3 w200"
                                        style="background-color: grey" disabled>Participation Closed
                                    </button>
                                @elseif(auth()->user()->id == $event->organizer_id)
                                    <button
                                        class="bg-secondary border-0 text-white fw-600 text-uppercase font-xssss float-left rounded-3 d-inline-block mt-0 p-2 lh-34 text-center ls-3 w200"
                                        disabled>Your Event
                                    </button>
                                @elseif($event->max_participants == $event->participants_count)
                                    <button
                                        class="bg-danger border-0 text-white fw-600 text-uppercase font-xssss float-left rounded-3 d-inline-block mt-0 p-2 lh-34 text-center ls-3 w200"
                                        disabled>Event Full
                                    </button>
                                @else
                                    @if (auth()->check())
                                        @if ($event->participants->contains(auth()->user()))
                                            <!-- User is a participant, show "Participated" button -->
                                            <button class="btn btn-success" disabled>Participated</button>
                                        @else
                                            <!-- User is not a participant, show "Participate" button -->
                                            <form action="{{ route('events.participate', $event->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" href="/defaulthoteldetails"
                                                    class="bg-primary border-0 text-white fw-600 text-uppercase font-xssss float-left rounded-3 d-inline-block mt-0 p-2 lh-34 text-center ls-3 w200">PARTICIPATE
                                                </button>
                                            </form>
                                        @endif
                                    @else
                                        <!-- User is not authenticated, show a message or login prompt -->
                                        <p>Please log in to participate in this event.</p>
                                    @endif

                                @endif
                                <a href="/defaulthoteldetails"
                                    class="btn-round-lg ms-2 d-inline-block rounded-3 bg-greylight"><i
                                        class="fa-solid fa-share font-sm text-grey-700"></i></a>
                                @if (auth()->user()->id == $event->organizer_id)
                                    <a href="/defaulthoteldetails"
                                        class="btn-round-lg ms-2 d-inline-block rounded-3 bg-warning"><i
                                            class="fa-solid fa-bookmark font-sm text-white"></i> </a>
                                @endif


                            </div>
                        </div>

                        <div class="card d-block border-0 rounded-3 overflow-hidden p-4 shadow-xss mt-4 alert-success">
                            <h2 class="fw-700 font-sm mb-3 mt-1 ps-1 text-success mb-4">Ameneties</h2>
                            @if ($event->amenities->count() > 0)
                                <ul>
                                    @foreach ($event->amenities as $amenity)
                                        <h4 class="font-xssss fw-500 text-grey-600 mb-3 pl-35 position-relative lh-24">
                                            <i
                                                class="fa-solid fa-check font-xssss btn-round-xs bg-success text-white position-absolute left-0 top-5"></i>{{ $amenity->name }}
                                        </h4>
                                    @endforeach
                                </ul>
                            @else
                                <p>No amenities listed.</p>
                            @endif



                        </div>

                        <div class="card d-block border-0 rounded-3 overflow-hidden p-4 shadow-xss mt-4">
                            <h2 class="fw-700 font-sm mb-3 mt-1 ps-1 mb-3">Description</h2>
                            <p class="font-xssss fw-500 lh-28 text-grey-600 mb-0 ps-2">{{ $event->description }}
                            </p>
                        </div>
                        @if (auth()->user()->id != $event->organizer_id)
                            <div class="card d-block border-0 rounded-3 overflow-hidden p-4 shadow-xss mt-4">
                                <h2 class="fw-700 font-sm mb-3 mt-1 ps-1 mb-3">Organizer</h2>
                                <div class="  cursor-pointer" style="width: 40%; margin-left:auto;margin-right:auto">
                                    <div class="image-flip">
                                        <div class="mainflip flip-0">
                                            <div class="frontside">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <p><img class=" img-fluid"
                                                                src="{{ asset('images/' . $event->organizer->profile->profile_picture) }}"
                                                                alt="card image"></p>

                                                        <h4 class="card-title">{{ $event->organizer->name }}</h4>

                                                        <p class="mt-3 d-inline-block font-xssss fw-600 text-grey-500 me-2">
                                                            <i
                                                                class="btn-round-sm bg-greylight fa-solid fa-phone text-grey-500 me-1"></i>
                                                            27 434 026
                                                        </p>
                                                        <p class="mt-3 d-inline-block font-xssss fw-600 text-grey-500 me-2">
                                                            <i
                                                                class="btn-round-sm bg-greylight fa-solid fa-envelope text-grey-500 me-1"></i>
                                                            {{ $event->organizer->email }}
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="backside" style="width: 100%">
                                                <div class="card" style="width: 100%">
                                                    <div class="card-body text-center mt-4">
                                                        <h4 class="card-title">Best Events</h4>
                                                        <div class="mb-3 mt-5">

                                                            @foreach ($event->organizer->organizedEvents as $event_organizer)
                                                                @if ($loop->index < 3)
                                                                    <p class="card-text">
                                                                        <a
                                                                            href="{{ route('events.show', $event_organizer->id) }}">{{ $event_organizer->title }}</a>
                                                                    </p>
                                                                @else
                                                                @break
                                                            @endif
                                                        @endforeach
                                                    </div>

                                                    <ul class="list-inline mt-2">
                                                        <li class="list-inline-item">
                                                            <a class="social-icon text-xs-center SM" target="_blank"
                                                                href="https://www.fiverr.com/share/qb8D02">
                                                                <i class="fa fa-facebook"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a class="social-icon text-xs-center SM" target="_blank"
                                                                href="https://www.fiverr.com/share/qb8D02">
                                                                <i class="fa fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a class="social-icon text-xs-center SM" target="_blank"
                                                                href="https://www.fiverr.com/share/qb8D02">
                                                                <i class="fa fa-skype"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a class="social-icon text-xs-center SM" target="_blank"
                                                                href="https://www.fiverr.com/share/qb8D02">
                                                                <i class="fa fa-google"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <a href="https://www.fiverr.com/share/qb8D02"
                                                        class="btn btn-primary-card btn-sm mt-5">See Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif






                    {{-- <div class="card d-block border-0 rounded-3 overflow-hidden p-4 shadow-xss mt-4">
                            <h2 class="fw-700 font-sm mb-3 mt-1 ps-1 mb-3">Gallery</h2>
                            <div class="row ps-3 pe-3">

                            </div>
                        </div> --}}
                </div>

                <div class="col-xl-4 col-xxl-3 col-lg-4 ps-0">

                    <div
                        class="card w-100 border-0 mt-3 mb-4 p-lg-4 p-3 shadow-xss position-relative rounded-3 bg-white">
                        <div>
                            <h3 class="text-center mb-5">Reviews</h3>
                            @if (now() > $event->end_date)
                                @foreach ($event->reviews as $review)
                                    <div class="col-12 border-bottom mb-3">
                                        <div class="row">
                                            <div class="col-2 text-left me-1">
                                                <figure class="avatar float-left mb-0"><img
                                                        src="{{ asset('images/' . $review->user->profile->profile_picture) }}"
                                                        alt="avater" class="float-right shadow-none w40 me-2"
                                                        style="border-radius:100%" />
                                                </figure>
                                            </div>
                                            <div class="col-8 ps-2 me">
                                                <div class="content">
                                                    <h6 class="author-name font-xssss fw-600 mb-0 text-grey-800">
                                                        {{ $review->user->name }}</h6>
                                                    <h6 class="d-block font-xsssss fw-500 text-grey-500 mt-2 mb-0">
                                                        {{ $review->created_at->format('F d \a\t H:i A') }}</h6>
                                                    <p class="comment-text lh-24 fw-500 font-xssss text-grey-900 mt-2">
                                                        {{ $review->comment }}</p>
                                                </div>
                                            </div>
                                            <div class="col-1 ">
                                                @if (auth()->check() && auth()->user()->id === $review->user_id)
                                                    <i class="fa-solid fa-trash text-danger cursor-pointer"id="delete-event"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $review->id }}"></i>

                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="deleteModal{{ $review->id }}"
                                                        tabindex="-1" aria-labelledby="deleteModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel">
                                                                        Confirm Deletion
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete your review?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>
                                                                    <form
                                                                        action="{{ route('event.reviews.destroy', ['reviewId' => $review->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach



                                <div class="row">
                                    <form method="POST" action="{{ route('event.reviews.store', $event) }}">
                                        @csrf
                                        <div class="form-group">
                                            <textarea id="comment" placeholder="Share with us your review" name="comment" class="form-control"
                                                style="height: 100px" rows="3"></textarea>
                                        </div>
                                        @error('comment')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <button
                                            class="d-block w-100 p-2 lh-32 text-center bg-greylight fw-600 font-xssss text-grey-900 rounded-3 border-0">Add
                                            a Review</button>
                                    </form>
                                </div>
                            @else
                                <p class="text-center">Reviews will be available after the event is completed.</p>
                            @endif
                        </div>
                    </div>

                    <div class="card w-100 border-0 mt-4 mb-4 p-4 shadow-xss position-relative rounded-3 bg-white">
                        <h2 class="fw-700 font-sm mb-4 mt-1 ps-1 mb-3">Ask a Question</h2>
                        <form method="POST" action="{{ route('questions.store', ['eventId' => $event->id]) }}">
                            @csrf
                            <div class="row">


                                <div class="col-12">
                                    <div class="form-group mb-3 md-mb-2">
                                        <textarea class="w-100 h125 style2-textarea p-3 form-control" name="content" id="content"
                                            placeholder="Question ?"></textarea>
                                    </div>
                                    @error('content')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <button type="submit"
                                        class="bg-secondary border-0 text-white fw-600 text-uppercase font-xssss float-left rounded-3 d-block mt-0 w-100 p-2 lh-34 text-center ls-3 ">
                                        Ask</button>
                                </div>
                            </div>


                        </form>
                    </div>
                    @if (auth()->check() && auth()->user()->id === $event->organizer_id)
                        <div class="card w-100 border-0 mt-4 mb-4 p-4 shadow-xss position-relative rounded-3 bg-white">
                            <h2 class="fw-700 font-sm mb-4 mt-1 ps-1 mb-3">Delete Event</h2>

                            <button class="btn btn-sm btn-danger p-3 m-1 w-100" id="delete-event"
                                data-bs-toggle="modal" data-bs-target="#deleteModal{{ $event->id }}">
                                <span class="font-600 mr-3">Delete Event</span> <i class="fa-solid fa-trash"></i>
                            </button>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $event->id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this event?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                @if (auth()->check() && auth()->user()->id === $event->organizer_id)
                    <div>
                        <h2 class="fw-700 font-sm mb-4 mt-1 ps-2 mb-3">List Participants</h2>
                        <div class="d-flex">
                            @if ($event->participants->isEmpty())
                                <p>No Participants Yet </p>
                            @else
                                @foreach ($event->participants as $participant)
                                    <div key={index} class="col-md-3 col-sm-4 pe-2 ps-2 mt-4">
                                        <div class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
                                            <div class="card-body d-block w-100 ps-3 pe-3 pb-4 text-center">
                                                <figure
                                                    class="overflow-hidden avatar ms-auto me-auto mb-0 position-relative w65 z-index-1">
                                                    @if ($participant->user->profile)
                                                        <img src="{{ asset('images/' . $participant->profile->profile_picture) }}"
                                                            alt="user" class="w40 mt--1 me-2"
                                                            style="border-radius: 100%" />
                                                    @else
                                                        <img src="{{ asset('images/user.png') }}" alt="user"
                                                            class="w40 mt--1 me-2" style="border-radius: 100%" />
                                                    @endif

                                                </figure>
                                                <div class="clearfix w-100"></div>
                                                <h4 class="fw-700 font-xsss mt-3 mb-0">{{ $participant->name }} </h4>
                                                <p class="fw-500 font-xssss text-grey-500 mt-0 mb-3">
                                                    {{ $participant->email }}
                                                </p>
                                                <a href="/defaultmember"
                                                    class="mt-0 btn pt-2 pb-2 ps-3 pe-3 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-success font-xsssss fw-700 ls-lg text-white">CONTACT
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                @endif
                <div class="card d-block border-0 rounded-3 overflow-hidden p-4 shadow-xss mt-4">
                    <h2 class="fw-700 font-sm mb-3 mt-1 ps-1 mb-3">Q&A</h2>
                    @foreach ($event->eventQuestions as $question)
                        <div class="card my-1">
                            <div class="card-body">
                                <div class="message-user d-flex  justify-content-between bg-primary text-white p-3">
                                    <div class="d-flex justifyl-content-center align-items-center">

                                        <figure class="avatar">
                                            @if ($question->user->profile)
                                                <img src="{{ asset('images/' . $question->user->profile->profile_picture) }}"
                                                    alt="user" class="w40 mt--1 me-2"
                                                    style="border-radius: 100%" />
                                            @else
                                                <img src="{{ asset('images/user.png') }}" alt="user"
                                                    class="w40 mt--1 me-2" style="border-radius: 100%" />
                                            @endif

                                        </figure>
                                        <div>
                                            <h5 class="mb-1">{{ $question->user->name }} <div>

                                                </div>
                                            </h5>
                                            <div class="time text-grey-500">01:35 PM</div>
                                        </div>
                                    </div>
                                    @if (auth()->check() &&
                                            (auth()->user()->id === $question->user_id || auth()->user()->id === $question->event->organizer_id))
                                        <button class="btn" id="delete-question" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $question->id }}"> <i
                                                class="fa-solid fa-square-minus fa-2xl text-danger cursor-pointer"></i>
                                        </button>
                                    @endif

                                </div>
                                <p class="card-text pt-3 pb-3  border mb-0"
                                    style="padding-left: 10px;font-size:1.5rem;font-weight:600">
                                    {{ $question->content }}</p>
                                <div class="modal fade" id="deleteModal{{ $question->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete your question?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('questions.destroy', $question->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="border-left: 1px solid #dee2e6">
                                    @foreach ($question->responses as $response)
                                        <div class="message-user d-flex pt-3 justify-content-between "
                                            style="margin-left: 25px;border-bottom: 1px solid #dee2e6">

                                            <div style="">
                                                <div class="d-flex">
                                                    <div class="d-flex  ">


                                                        <figure class="avatar">
                                                            @if ($response->user->profile)
                                                                <img src="{{ asset('images/' . $response->user->profile->profile_picture) }}"
                                                                    alt="user" class="w40 mt--1 me-2"
                                                                    style="border-radius: 100%" />
                                                            @else
                                                                <img src="{{ asset('images/user.png') }}"
                                                                    alt="user" class="w40 mt--1 me-2"
                                                                    style="border-radius: 100%" />
                                                            @endif

                                                        </figure>
                                                        <div>

                                                            <h5 style="font-weight: 500" class="mb-0">
                                                                {{ $response->user->name }}
                                                                @if ($response->is_approved)
                                                                    <i title="Approved"
                                                                        class="fa-solid fa-check-circle text-success"></i>
                                                                @endif
                                                            </h5>
                                                            <div class="time">{{ $response->created_at }}
                                                            </div>
                                                        </div>



                                                    </div>


                                                </div>
                                                <div class="my-3">

                                                    <span class="card-text  "
                                                        style="font-weight: 300;margin-left:1rem;font-size:1.3rem">-
                                                        {{ $response->content }}</span>
                                                </div>
                                                @error('content')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="p-3">

                                                <div class="dropdown">
                                                    @if (auth()->check() && (auth()->user()->id === $response->user_id || auth()->user()->id === $event->organizer_id))
                                                        <button class="btn btn-link" type="button"
                                                            id="response-options-button-{{ $response->id }}"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa-solid fa-ellipsis-vertical fa-xl"></i>
                                                        </button>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="response-options-button-{{ $response->id }}">
                                                            @if (auth()->check() && auth()->user()->id === $event->organizer_id)
                                                                <li style="border-bottom:1px solid #dee2e6;">

                                                                    @if ($response->is_approved)
                                                                        <a class="dropdown-item" href="#"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#approveModal-{{ $response->id }}">Unapprove</a>
                                                                    @else
                                                                        <a class="dropdown-item" href="#"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#approveModal-{{ $response->id }}">Approve</a>
                                                                    @endif



                                                                </li>
                                                            @endif
                                                            <li><a class="dropdown-item" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal-{{ $response->id }}">Delete</a>
                                                            </li>
                                                            <!-- Add more options as needed -->
                                                        </ul>
                                                    @endif
                                                </div>

                                                <div class="modal fade" id="approveModal-{{ $response->id }}"
                                                    tabindex="-1" aria-labelledby="approveModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="approveModalLabel">
                                                                    @if ($response->is_approved)
                                                                        Confirm Unapprove
                                                                    @else
                                                                        Confirm Approve
                                                                    @endif
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @if ($response->is_approved)
                                                                    Are you sure you want to unapprove this
                                                                    response?
                                                                @else
                                                                    Are you sure you want to approve this
                                                                    response?
                                                                @endif

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <form
                                                                    action="{{ route('responses.approve', $response) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-success">
                                                                        @if ($response->is_approved)
                                                                            Unapprove
                                                                        @else
                                                                            Approve
                                                                        @endif
                                                                    </button>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="deleteModal-{{ $response->id }}"
                                                    tabindex="-1" aria-labelledby="deleteModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel">
                                                                    Confirm Deletion
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete your response?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <form
                                                                    action="{{ route('responses.destroy', [$event, $question, $response]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div>

                                    <form method="POST" action="{{ route('responses.store', [$event, $question]) }}"
                                        class="d-flex align-items-end justify-content-between mt-3"
                                        style="margin-left: 25px">
                                        @csrf

                                        <textarea class=" h100 style2-textarea p-3 form-control" style="width: 80%" name="response_content"
                                            id="response_content" placeholder="Respond to that question ?"></textarea>

                                        <button class="btn btn-primary" style="width: 18%" data-toggle="collapse"
                                            data-target="#responses-{{ $question->id }}">
                                            Respond
                                        </button>
                                    </form>
                                    @error('response_content')
                                        <div class="alert alert-danger mt-2 "
                                            style="width: 90%;margin-right:auto;margin-left:auto">{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    @endforeach

                    </p>
                </div>

            </div>

        </div>
    </div>
@endsection
