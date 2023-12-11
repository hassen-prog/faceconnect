@extends('layouts.app')
    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
@section('content')
<div class="main-content right-chat-active">
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left pe-0">
            <div class="row">
                <div class="col-xl-12">
                    <div class="col-xl-12">
                        <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                            <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900 d-flex align-items-center">Forums
                                <form action="{{ route('forums.index') }}" method="GET" class="pt-0 pb-0 ms-auto">
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
                                                <a class="btn-round-md ms-2 bg-greylight theme-dark-bg rounded-3" href="/forums/create"><i  class="fa-solid fa-plus font-xss "></i></a>
                                        <div class="me-2">

                                            @if (request('search'))
                                                <a href="{{ route('forums.index') }}"
                                                    class="btn btn-secondary mb-0 text-white">Clear</a>
                                            @endif
                                        </div>

                                    </div>

                                </form>

                            </h2>

                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-xl-12">
 


                    <div class="row ps-2 pe-1">
                        @foreach ($forums as $index => $value)

                        <div key={{$index}} class="col-lg-6 col-md-12 pe-2 ps-2">
                            <div class="card p-3 bg-white w-100 hover-card border-0 shadow-xss rounded-xxl border-0 mb-3 overflow-hidden ">
                                <div class="row">
                                    @if ($value->image != null)
                                    <div class="col-md-6 d-flex align-items-center">
                                        <div class="card-image w-100" style="display:flex; justify-content: center; align-items:center; overflow:hidden;">
                                            <img src="{{ asset('images/forums/' . $value->image) }}" alt="forum"  style="height: 15rem" />
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-md-6">
                                        <div class="card-body d-flex ps-0 pe-0 pb-0">
                                            <div class=" w-100 p-3 rounded-xxl theme-dark-bg">
                                                <h4 class="fw-700 font-lg ls-3 text-grey-900 mb-0">{{$value->title}}
                                                    <span class="ls-3 mt-2 d-block font-xsss text-grey-700 fw-500">{{$value->short_description}}</span>
                                                </h4>
                                                <p class="ls-3 mt-2 font-xsss text-grey-500 fw-500" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                                    {{$value->body}}
                                                  </p>
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            @if (auth()->check() && auth()->user()->id == $value->user_id)
                                            <button id="delete-forum" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $value->id }}" class="font-xssss fw-700 ps-3 pe-3 lh-32 float-left mt-4 text-uppercase rounded-3 ls-2 bg-danger d-inline-block text-white me-1" style="border: none">Delete</button>
                                            @endif
                                            <a href="/forums/{{$value->id}}" class="font-xsssss fw-700 ps-3 pe-3 lh-32 float-right mt-4 text-uppercase rounded-3 ls-2 bg-success d-inline-block text-white me-1">Read more...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deleteModal{{ $value->id }}" tabindex="-1"
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
                                        Are you sure you want to delete this forum?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('forums.destroy', $value->id) }}"
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
                        @endforeach
                        <div class="w-100 mt-2">
                            <div class="mx-auto" style="width:fit-content">
                                {{$forums->links()}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
