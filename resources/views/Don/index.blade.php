@extends('layouts.app')
@section('content')
<div class="main-content ">
    <div class="middle-sidebar-bottom ">
        <div class="middle-sidebar-left pe-0">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                        <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900 d-flex align-items-center">objectifs
                            <form action="{{ route('objectifs.index') }}" method="GET" class="pt-0 pb-0 ms-auto">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="search-form-2 me-2 ">
                                        <i class="fa-solid fa-search font-xss"></i>
                                        <input type="text" name="search" id="search-input" value="{{ request('search') }}"
                                            class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0"
                                            placeholder="Search objectifs." />
                                    </div>
                                    @if (request('search'))
                                    <a href="{{ route('objectifs.index') }}"
                                        class="btn btn-secondary mb-0 text-white">Clear</a>
                                    @endif
                                </div>
                            </form>
                        </h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($objectifs as $objectif)
                    <div class="col-lg-4 col-md-6 pe-2 ps-2">
                        <div
                            class="card p-3 bg-white w-100 hover-card border-0 shadow-xss rounded-xxl border-0 mb-3 overflow-hidden ">
                            <div class="card-image w-100">
                                <img src="{{ asset('.\images\téléchargement.jpeg' . $objectif->image_path) }}" alt="objectif"
                                    class=" rounded-3" style="height: 250px;width:100%;object-fit:contain" />
                            </div>
                            <div class="card-body d-flex ps-0 pe-0 pb-0">
                                <h2 class="fw-700 lh-3 font-xss"><a
                                        href="{{ route('objectifs.show', $objectif->id) }}">{{ $objectif->name }}</a>
                                </h2>
                            </div>
                            <div class="mt-4">
                                <h2 class="fw-700 lh-3 font-xs">{{ $objectif->description }}</h2>
                            </div>
                            <div class="card-body d-flex justify-content-between align-items-center p-0 mt-4">
                                <div>
                                    <a href="{{ route('dons.donate', ['objectifId'=>$objectif->id]) }}"
                                        class="font-xsssss fw-700 ps-3 pe-3 lh-32 float-right text-uppercase rounded-3 ls-2 bg-primary d-inline-block text-white ">DONATE</a>
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
