@extends('layouts.admin')

@section('content')
<div class="container main-content">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @foreach ($posts as $post)
    <div class="card d-flex w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
        <div class="card-body p-0 d-flex">
            <figure class="avatar me-3">
                <img src="{{ asset('images/' . $post->profile->profile_picture) }}" alt="avater" class="round_img_i shadow-sm rounded-circle w45" />
            </figure>
            <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{$post->profile->name}}
                <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $post->created_at->diffForHumans() }}</span>
            </h4>
            <div class="ms-auto pointer">
                <i class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i>
            </div>
        </div>
        <div class="card-body p-0 me-lg-5">
            <p class="fw-500 text-grey-500 lh-26 font-xssss w-100 mb-2">{{ $post->description }}
                <a href="/defaultvideo" class="fw-600 text-primary ms-2"></a>
            </p>
        </div>
        <div class="card-body d-block p-0 mb-3">
            <div class="row ps-2 pe-2">
                @if ($post->image)
                    <div class="col-sm-12 p-1">
                        <img src="{{ asset('images/' . $post->image) }}" alt="avater" class="rounded-3 w-100" alt="post" />
                    </div>
                @endif
            </div>
        </div>
        <div class="card-body d-flex p-0">
            <div class="emoji-bttn pointer d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2"
                onClick={toggleActive}>
                <i class="fa-solid fa-thumbs-up text-white bg-primary-gradiant me-1 btn-round-xs font-xss"></i>
                <i class="fa-solid fa-heart text-white bg-red-gradiant me-2 btn-round-xs font-xss"></i>
                Like
            </div>
            <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss">
                <i class="fa-solid fa-message-circle text-dark text-grey-900 btn-round-sm font-lg"></i>
                <span class="d-none-xss"> Comment</span>
            </a>
        </div>
    </div>
    @endforeach
</div>
</div>
</div>
@endsection
