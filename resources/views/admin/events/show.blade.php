@extends('layouts.admin')
@section('content')
    <div class="main-content bg-white right-chat-active">

        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left">
                <div class="row">
                    <div class="col-xl-12 col-xxl-12 col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div
                                    class="card p-md-5 p-4 bg-primary rounded-3 shadow-xss bg-pattern border-0 overflow-hidden">
                                    <div class="bg-pattern-div"></div>
                                    <h2 class="display2-size display2-md-size fw-700 text-white mb-0 mt-0">
                                        {{ $event->title }}

                                        <span class="fw-600 ls-3 text-grey-200 font-xsssss mt-2 d-block">
                                            <span class="fw-700 text-grey-500 font-xssss ">Organized By :</span>
                                            {{ $event->organizer->name }}</span>
                                    </h2>
                                </div>
                            </div>


                            <div class="col-lg-12 mt-3">
                                <div class="tabs">
                                    <div class="tab-header d-flex nav nav-pills ">
                                        <div class="tab nav-item nav-link cursor-pointer " id="questions-tab">
                                            Questions</div>
                                        <div class="tab nav-item nav-link cursor-pointer " id="responses-tab">
                                            Responses</div>
                                        <div class="tab nav-item nav-link cursor-pointer " id="reviews-tab">Reviews
                                        </div>
                                    </div>
                                    <div class="tab-content" id="questions-content">
                                        <h1>Questions</h1>
                                        <table class="table table-hover w-100">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Content</th>
                                                    <th scope="col">Asked At</th>
                                                    <th scope="col">User</th>

                                                    <th scope="col">Delete </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($event->eventQuestions as $question)
                                                    <tr>
                                                        <th>
                                                            <div>{{ $question->id }}</div>
                                                        </th>
                                                        <td>{{ $question->content }}</td>
                                                        <td>{{ $question->created_at }}</td>
                                                        <td>{{ $question->user->name }}</td>

                                                        <td>
                                                            <div class="d-flex justify-content-between"
                                                                style="min-width: 100px">


                                                                <button class="btn  btn-danger mb-1 " id="delete-event"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal{{ $question->id }}">
                                                                    <i class=" fa-solid fa-trash"></i>
                                                                </button>
                                                                <!-- Delete Modal -->
                                                                <div class="modal fade" id="deleteModal{{ $question->id }}"
                                                                    tabindex="-1" aria-labelledby="deleteModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="deleteModalLabel">Confirm Deletion
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Are you sure you want to delete this
                                                                                question?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                                <form
                                                                                    action="{{ route('questions.destroy', $question->id) }}"
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
                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-content" id="responses-content">
                                        <h1>Responses</h1>
                                        <!-- Content for the Responses tab -->
                                        <table class="table table-hover w-100">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">User</th>
                                                    <th scope="col">Response</th>
                                                    <th scope="col">Question</th>
                                                    <th scope="col">Created_At</th>
                                                    <th scope="col">Approved</th>

                                                    <th scope="col">Delete </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($event->eventQuestions as $question)
                                                    @foreach ($question->responses as $response)
                                                        <tr>
                                                            <th>
                                                                <div>{{ $response->id }}</div>
                                                            </th>
                                                            <td>{{ $response->user->name }}</td>
                                                            <td>{{ $response->content }}</td>
                                                            <td>{{ $question->content }}</td>
                                                            <td>{{ $response->created_at }}</td>
                                                            <td>
                                                                @if ($response->is_approved)
                                                                    <i title="Approved"
                                                                        class="fa-solid fa-check-circle text-success"></i>
                                                                @else
                                                                    <i title="Approved"
                                                                        class="fa-solid fa-times-circle text-danger"></i>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                <div class="d-flex justify-content-between"
                                                                    style="min-width: 100px">


                                                                    <button class="btn  btn-danger mb-1 "
                                                                        id="delete-response" data-bs-toggle="modal"
                                                                        data-bs-target="#deleteModal{{ $response->id }}">
                                                                        <i class=" fa-solid fa-trash"></i>
                                                                    </button>
                                                                    <!-- Delete Modal -->
                                                                    <div class="modal fade"
                                                                        id="deleteModal{{ $response->id }}" tabindex="-1"
                                                                        aria-labelledby="deleteModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="deleteModalLabel">Confirm
                                                                                        Deletion
                                                                                    </h5>
                                                                                    <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    Are you sure you want to delete this
                                                                                    response ?
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
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
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-content" id="reviews-content">
                                        <h1>Reviews</h1>
                                        <!-- Content for the Reviews tab -->
                                        <table class="table table-hover w-100">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">User</th>
                                                    <th scope="col">Comment</th>
                                                    <th scope="col">Created_at</th>

                                                    <th scope="col">Delete </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($event->reviews as $review)
                                                    <tr>
                                                        <th>
                                                            <div>{{ $review->id }}</div>
                                                        </th>
                                                        <td>{{ $review->user->name }}</td>
                                                        <td>{{ $review->comment }}</td>
                                                        <td>{{ $review->created_at }}</td>

                                                        <td>
                                                            <div class="d-flex justify-content-between"
                                                                style="min-width: 100px">


                                                                <button class="btn  btn-danger mb-1 " id="delete-event"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal{{ $review->id }}">
                                                                    <i class=" fa-solid fa-trash"></i>
                                                                </button>
                                                                <!-- Delete Modal -->
                                                                <div class="modal fade"
                                                                    id="deleteModal{{ $review->id }}" tabindex="-1"
                                                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="deleteModalLabel">Confirm Deletion
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Are you sure you want to delete this
                                                                                question?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
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
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>







                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
