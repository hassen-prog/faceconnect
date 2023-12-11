@extends('layouts.admin')
@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <div class="main-content bg-white ">
        <div class="middle-sidebar-bottom ">
            <div class="mx-auto pe-0" style="width:94%; ">
                <div class="row w-100">
                    <div class="col-xl-12">
                        <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                            <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900 d-flex align-items-center">Objectives
                                <form action="{{ route('admin.events.index') }}" method="GET" class="pt-0 pb-0 ms-auto">
                                    <div class="d-flex justify-content-center align-items-center">

                                        <div class="search-form-2 me-2 ">
                                            <i class="fa-solid fa-search font-xss"></i>

                                            <input type="text" name="search" id="search-input"
                                                value="{{ request('search') }}"
                                                class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0"
                                                placeholder="Search here." />

                                        </div>
                                        <a href="/" class="btn-round-md ms-2 bg-greylight theme-dark-bg rounded-3"><i
                                                class="fa-solid fa-filter font-xss text-grey-500"></i></a>

                                        <div class="me-2">

                                            @if (request('search'))
                                                <a href="{{ route('objectifs.index') }}"
                                                    class="btn btn-secondary mb-0 text-white">Clear</a>
                                            @endif
                                        </div>
                                        <form action="{{ route('objectifs.create') }}" method="GET">
                                        <a class="btn btn-primary mx-2" href="
                                        {{route('objectifs.create')}}">Create Objective As
                                            Admin</a>
                                        </form>
                                    </div>

                                </form>

                            </h2>

                        </div>
                    </div>
                    <table class="table table-hover w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Objective Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Dons</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($objectifs as $objectif)
                                <tr>
                                    <td>{{ $objectif->id }}</td>
                                    <td>{{ $objectif->name }}</td>
                                    <td >{{ $objectif->description }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($objectif->dons as $don)
                                                <li> {{ $don->user->name }} donated {{ $don->amount }} TD</li>
                                                @if (!$loop->last)
                                                    <hr class="donation-separator">
                                                @endif
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between" style="min-width: 100px">
                                            {{-- <a href="{{ route('objectifs.edit', $objectif->id) }}" class="text-white">
                                                <button class="btn btn-success mb-1">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                            </a> --}}
                                            <button class="btn btn-danger mb-1" id="delete-objectif" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $objectif->id }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                            <!-- Delete Modal for Objectif -->
                                            <div class="modal fade" id="deleteModal{{ $objectif->id }}" tabindex="-1"
                                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this objectif?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <form action="{{ route('objectifs.destroy', $objectif->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
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
                    
                    <div class="w-100">
                        <div class="mx-auto" style="width:fit-content">
                            {{ $objectifs->links() }}
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
