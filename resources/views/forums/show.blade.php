@extends('layouts.app')

@section('content')
<div class="main-content">
    
<div class="card d-block mt-3 border-0 shadow-xss bg-white p-3 mb-3">
    <a href="{{ route('forums.index') }}" style="margin-left:1rem" ><i class="fa-solid fa-arrow-left" ></i> Back</a>

    <a href={{route('forums.edit', $forum->id)}} class="p-2 text-center ms-3 menu-icon chat-active-btn float-right" style="z-index: 1000"><i
        class="fa-solid fa-gear fa-1xl" ></i></a>
    @if ($forum->image != null)
    <div
    class="card-body position-relative bg-image-center d-flex align-items-center justify-content-center" 
    >     
      <img src="{{ asset('images/forums/' . $forum->image) }}" style="max-width: 100%;" alt="forum"/>
    </div>
    @endif
  <div class="px-5">
    <h2 class="fw-700 font-lg mt-3 mb-2">{{$forum->title}}   
    </h2>
        <span
        class="font-xsssss fw-700 ps-3 pe-3 lh-32 text-uppercase rounded-3 ls-2 bg-primary-gradiant d-inline-block  ">{{$forum->short_description}}</span>
    <p class="font-xsss fw-500  lh-30 pe-5 mt-3 me-5">{{$forum->body}}</p>
    <div class="d-flex justify-content-between ">
        <p class="review-link font-xssss fw-600 text-grey-500 lh-3 mb-0">
            {{$comments->count()}} comments</p>
            <div class="d-flex align-items-center">
            @if ($liked && $liked->count() > 0)
                <form method="POST" action="{{ route('forumLikes.destroy', $liked->id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="forum_id" value="{{ $forum->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id}}">
                    <button type="submit" class="btn btn-danger float-right d-flex" style="margin-left:50px; margin-top: 10px;" name="dislike-forum" id="dislike-forum">
                        <i class="fa-solid fa-thumbs-down"></i> {{$fl->count()}}
                    </button>
                </form>
            @else
                <form method="POST" action="{{ route('forumLikes.store') }}">
                    @csrf
                    <input type="hidden" name="forum_id" value="{{ $forum->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id}}">
                    <button type="submit" class="btn btn-primary float-right d-flex" style="margin-left:50px; margin-top: 10px;" name="like-forum" id="like-forum">
                        <i class="fa-solid fa-thumbs-up"></i> {{$fl->count()}}
                    </button>
                </form>
            @endif
            

      
            
            <a href="#reply" class="fw-600 text-uppercase font-xssss float-right  mt-0   text-center ls-3  ">Reply</a>
            </div>
      </div>
  </div>
    <div class="clearfix"></div>

        <div class="clearfix"></div>
 
    <div class="clearfix"></div>



</div>

 @foreach ($comments as $index => $value)
 

 <div class="card w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3 d-flex" >

    <div class="card-body p-0 mt-3 position-relative">
        <form method="POST" action="{{ route('commentss.update', $value->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if (auth()->check() && auth()->user()->id == $value->user_id)
            <form action="{{ route('commentss.destroy', $value->id) }}"
                method="POST">
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-danger float-right" style="margin-left:5px; margin-top: 10px; " name="delete-comment" id="delete-{{$value->id}}">
                <i class="fa-solid fa-trash"></i>        </button>
            </form>
            <button type="button" class="btn btn-primary float-right edit-comment" style="margin-left:50px; margin-top: 10px; width:10%" name="{{$value->id}}" id="edit-{{$value->id}}">Edit</button>
        <button type="submit" class="btn btn-primary float-right" style="margin-left:50px; margin-top: 10px; width:10%; display: none" name="{{$value->id}}" id="submit-{{$value->id}}">Save</button>
          
            <input type="number" name="user_id" style="display: none" value="1">
            <input type="number" name="forum_id" style="display: none" value={{$forum->id}}>
            @endif
        <figure class="avatar position-absolute ms-2 mt-1 top-5">@if ($value->user->profile)
            <img src="{{ asset('images/' . $value->user->profile->profile_picture) }}" alt="user"
                class="w40 mt--1 " style="border-radius: 100%" />
        @else
            <img src="{{ asset('images/user.png') }}" alt="user" class="w40 mt--1 me-2"
                style="border-radius: 100%" />
        @endif
        </figure>
        <p style="margin-left:50px" id="{{$value->id}}">   @if ($value->user)
            <strong>{{ $value->user->name }}</strong>:
        @endif
        {{$value->body}}</p>
        <input type="text" name="body" class="form-control" style="display: none;margin-left:50px; width: 80%;" id="input-{{$value->id}}" value="{{$value->body}} ">
        <p class="review-link font-xssss fw-600 text-grey-500 float-right lh-3 mb-0">{{$value->created_at}}</p>
    </form>

    </div>
 
</div>
    @endforeach
<div class="card w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3">
<form id="reply"  method="POST" action={{route('commentss.store')}}>
    @csrf
    <input type="number" name="user_id" style="display: none" value="{{ auth()->user()->id }}">
    <input type="number" name="forum_id" style="display: none" value={{$forum->id}}>
    <div class="d-flex align-items-center position-relative">
        <figure class="avatar position-absolute ms-2 mt-1 top-5"><img src="{{ asset('images/'.auth()->user()->profile->profile_picture) }}"
                                                                          alt="icon"
                                                                          class="shadow-sm rounded-circle w30"/>
        </figure>
        <textarea name="body"
        class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg"
        cols="30" rows="10" placeholder="What's on your mind?"></textarea>
    
    <button style="border:none;background:none"><i style="font-size:24px; color:#0d6efd" class="fa m-1" role="button">&#xf1d9;</i></button>
    </div>
</form>
<form class="chat-form d-flex align-items-center">
   
      

</form>
 
</div>

@endsection