@extends('layouts.app') // Use your layout file if you have one

@section('content')
    <div class="col-md-6 mx-auto pt-10 ">
        <h1>Post Details</h1>

        <div class="card d-flex w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
            <div class="card-body p-0 d-flex">
                <figure class="avatar me-3">
                    <img src="{{ asset('images/' . $post->profile->profile_picture) }}" alt="avater" class="shadow-sm rounded-circle w45" />
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
        </div>
        <div class="comments">
            <h2>Comments  : </h2>
            @foreach ($comments as $comment)
            @php
            $profile = \App\Models\Profile::find($comment->profile_id); 
        @endphp
                <div class="comment">
                    <div class="card-body p-0 d-flex">
                    <figure class="avatar me-3">
                        <img src="{{ asset('images/' . $profile->profile_picture) }}" alt="avater" class="shadow-sm rounded-circle w50" />
                    </figure>
                    <h1 class="fw-700 text-grey-850 font-xss mt-1">{{ $profile->name }}
                        <span class="d-block font-xssss fw-500 mt-1  lh-3 text-grey-600">{{ $comment->created_at->diffForHumans() }}</span>
                    </h1>          
                </div>
                    <h3 class="fw-500 text-grey-650 lh-26 font-s w-600 mb-2 mx-6">{{ $comment->comment }}</h3>
                </div>
                @if ($profile->name === auth()->user()->name)

                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-flex" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger " style = "margin-left: 650px;">Delete</button>
                </form>
                @endif

                <hr class="my-3">
            @endforeach
        </div>


        <!-- Add a New Comment -->

            <form action="{{ route('comments.storee', $post->id)}}" method="POST" >
                @csrf

                <div class="form-group">
                    <textarea name="comment" id="comment" class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="What's on your mind?" ></textarea>
                    @error('comment')
                    <span class="text-danger mx-2">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group text-end my-2">
                    <button type="submit" class="btn btn-primary">Comment</button>
                </div>
            </form>

       
    </div>

    
@endsection


