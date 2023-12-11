@extends('layouts.admin')
@section('content')
    <div class="main-content bg-white ">
        <div class="middle-sidebar-bottom ">
            <div class="mx-auto pe-0" style="width:94%; ">
                <div class="row w-100">
                    <div class="col-xl-12">
                        <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                            <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900 d-flex align-items-center">Recycle Station
                                <form action="{{ route('recycle-stations.index') }}" method="GET" class="pt-0 pb-0 ms-auto">
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
                                                <a href="{{ route('recycle-stations.index') }}"
                                                    class="btn btn-secondary mb-0 text-white">Clear</a>
                                            @endif
                                        </div>
                                        <a class="btn btn-primary mx-2" href="{{ route('recycle-stations.create') }}">Add
                                            Recycle Station
                                        </a>
                                    </div>

                                </form>

                            </h2>

                        </div>
                    </div>
                    <table class="table table-hover w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Latitude</th>
                                <th scope="col">Longitude</th>
                                <th scope="col">Contact Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stations as $station)
                                <tr>

                                    <th>
                                        <div><img src="{{ asset('images/recycle-stations/' . $station->image_path) }}"
                                                alt="avater" class="shadow-sm mt-2 w40 " /></div>
                                    </th>
                                    <td>{{ $station->name }}
                                    </td>
                                    <td>{{ $station->address }}</td>
                                    <td>{{ $station->latitude }}</td>
                                    <td>{{ $station->longitude }}</td>
                                    <td>{{ $station->contact_email }}</td>
                                    <td>{{ $station->contact_phone }}</td>
                                    <td>
                                        <div class="d-flex justify-content-between" style="min-width: 100px">
                                            <a href="{{ route('recycle-stations.edit', $station->id) }}"
                                                class="text-white">
                                                <button class="btn  btn-success mb-1">
                                                    <i class="fa-solid fa-pen-to-square "></i>
                                                </button>
                                            </a>

                                            <button class="btn  btn-danger mb-1 " id="delete-event" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $station->id }}">
                                                <i class=" fa-solid fa-trash"></i>
                                            </button>
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModal{{ $station->id }}" tabindex="-1"
                                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Confirm
                                                                Deletion
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this station?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <form
                                                                action="{{ route('recycle-stations.destroy', $station->id) }}"
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
@endsection
