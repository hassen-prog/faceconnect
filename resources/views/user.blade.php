
@extends('layouts.app')

@section('content')
<div class="main-content right-chat-active ">
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left pe-0">
            <div class="row">
                <div class="col-xl-12 mb-3">
                    <div class="card w-100 border-0 p-0 bg-white shadow-xss rounded-xxl">
                        <div class="card-body h250 p-0 rounded-xxl overflow-hidden m-3">
                            <img class ="couverture" src="{{ asset('images/u-bg.png') }}" alt="image"></div>
                        <div class="card-body p-0 position-relative">
                            <figure class="avatar position-absolute w100 z-index-1" style="top:-40px; left: 30px;">
                            <img
                                    src="{{ asset('images/' . $profile->profile_picture) }}" alt="image"
                                    class="float-right round_img_i p-1 bg-white rounded-circle w-100"/></figure>
                                    <h4 class="fw-700 font-sm mt-2 mb-lg-5 mb-4 pl-15">{{$profile->name}}<span
                                        class="fw-500 font-xssss text-grey-500 mt-1 mb-3 d-block">{{$user->email}}</span></h4>
                                    <div
                                        class="d-flex align-items-center justify-content-center position-absolute-md right-15 top-0 me-2">
                                        <a href="{{ route('profile.create') }}"
                                           class="d-none d-lg-block bg-success p-3 z-index-1 rounded-3 text-white font-xsssss text-uppercase fw-700 ls-3"> Update Infos
                                            </a>
                                        <a href="/defaultemailbox"
                                           class="d-none d-lg-block bg-greylight btn-round-lg ms-2 rounded-3 text-grey-700"><i
                                            class="fa-solid fa-mail font-md"></i></a>
                                        <a href="/home" id="dropdownMenu4"
                                           class="d-none d-lg-block bg-greylight btn-round-lg ms-2 rounded-3 text-grey-700"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                            class="ti-more font-md tetx-dark"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg"
                                             aria-labelledby="dropdownMenu4">

                                            <div class="card-body p-0 d-flex">
                                                <i class="fa-solid fa-bookmark text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-0">Save Link <span
                                                    class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Add this to your saved items</span>
                                                </h4>
                                            </div>
                                            <div class="card-body p-0 d-flex mt-2">
                                                <i class="fa-solid fa-alert-circle text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-0">Hide Post <span
                                                    class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span>
                                                </h4>
                                            </div>
                                            <div class="card-body p-0 d-flex mt-2">
                                                <i class="fa-solid fa-alert-octagon text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-0">Hide all from Group <span
                                                    class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span>
                                                </h4>
                                            </div>
                                            <div class="card-body p-0 d-flex mt-2">
                                                <i class="fa-solid fa-lock text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-600 mb-0 text-grey-900 font-xssss mt-0 me-0">Unfollow Group <span
                                                    class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="card-body d-block w-100 shadow-none mb-0 p-0 border-top-xs">
                                    <ul class="nav nav-tabs h55 d-flex product-info-tab border-bottom-0 ps-4" id="pills-tab"
                                        role="tablist">
                                        <li class="active list-inline-item me-5"><a
                                            class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block active"
                                            href="#navtabs1" data-toggle="tab">About</a></li>
                                        <li class="list-inline-item me-5"><a
                                            class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#navtabs2"
                                            data-toggle="tab">Membership</a></li>
                                        <li class="list-inline-item me-5"><a
                                            class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#navtabs3"
                                            data-toggle="tab">Discussion</a></li>
                                        <li class="list-inline-item me-5"><a
                                            class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#navtabs4"
                                            data-toggle="tab">Video</a></li>
                                        <li class="list-inline-item me-5"><a
                                            class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#navtabs3"
                                            data-toggle="tab">Group</a></li>
                                        <li class="list-inline-item me-5"><a
                                            class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#navtabs1"
                                            data-toggle="tab">Events</a></li>
                                        <li class="list-inline-item me-5"><a
                                            class="fw-700 me-sm-5 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block"
                                            href="#navtabs7" data-toggle="tab">Media</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                <div class="col-xl-4 col-xxl-3 col-lg-4 pe-0">
                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 mt-3">
                        <div class="card-body p-3 border-0">
                            <div class="row">
                                <div class="col-3">
                                    <div class="chart-container w50 h50">
                                        <div class="chart position-relative" data-percent="78" data-bar-color="#a7d212">
                                            <span class="percent fw-700 font-xsss" data-after="%">78</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 ps-1">
                                    <h4 class="font-xsss d-block fw-700 mt-2 mb-0">Advanced Python Sass <span
                                            class="float-right mt-2 font-xsssss text-grey-500">87%</span></h4>
                                    <p class="font-xssss fw-600 text-grey-500 lh-26 mb-0">Designer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                        <div class="card-body d-block p-4">
                            <h4 class="fw-700 mb-3 font-xsss text-grey-900">About</h4>
                            <p class="fw-500 text-grey-500 lh-24 font-xssss mb-0">Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat
                                non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus
                            </p>
                        </div>
                        <div class="card-body border-top-xs d-flex">
                            <i class="fa-solid fa-lock text-grey-500 me-3 font-lg"></i>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-0">Private <span
                                    class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">What's up, how
                                    are you?</span></h4>
                        </div>

                        <div class="card-body d-flex pt-0">
                            <i class="fa-solid fa-eye text-grey-500 me-3 font-lg"></i>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-0">Visble <span
                                    class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">Anyone can find
                                    you</span></h4>
                        </div>
                        <div class="card-body d-flex pt-0">
                            <i class="fa-solid fa-map-pin text-grey-500 me-3 font-lg"></i>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-1">Flodia, Austia </h4>
                        </div>
                        <div class="card-body d-flex pt-0">
                            <i class="fa-solid fa-users text-grey-500 me-3 font-lg"></i>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-1">Genarel Group</h4>
                        </div>
                    </div>
                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                        <div class="card-body d-flex align-items-center  p-4">
                            <h4 class="fw-700 mb-0 font-xssss text-grey-900">Photos</h4>
                            <a href="#" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                        </div>
                        <div class="card-body d-block pt-0 pb-2">
                            <div class="row">
                                <div class="col-6 mb-2 pe-1"><a href="images/e-2.jpg" data-lightbox="roadtrip"><img
                                            src="{{ asset('images/e-2.jpg') }}"
                                            alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                <div class="col-6 mb-2 ps-1"><a href="images/e-3.jpg" data-lightbox="roadtrip"><img
                                            src="{{ asset('images/e-3.jpg') }}"
                                            alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                <div class="col-6 mb-2 pe-1"><a href="images/e-4.jpg" data-lightbox="roadtrip"><img
                                            src="{{ asset('images/e-4.jpg') }}"
                                            alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                <div class="col-6 mb-2 ps-1"><a href="images/e-5.jpg" data-lightbox="roadtrip"><img
                                            src="{{ asset('images/e-5.jpg') }}"
                                            alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                <div class="col-6 mb-2 pe-1"><a href="images/e-2.jpg" data-lightbox="roadtrip"><img
                                            src="{{ asset('images/e-2.jpg') }}"
                                            alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                <div class="col-6 mb-2 ps-1"><a href="images/e-1.jpg" data-lightbox="roadtrip"><img
                                            src="{{ asset('images/e-1.jpg') }}"
                                            alt="image" class="img-fluid rounded-3 w-100"></a></div>
                            </div>
                        </div>
                        <div class="card-body d-block w-100 pt-0">
                            <a href="#"
                                class="p-2 lh-28 w-100 d-block bg-grey text-grey-800 text-center font-xssss fw-700 rounded-xl"><i
                                    class="fa-solid fa-external-link font-xss me-2"></i> More</a>
                        </div>
                    </div>

                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                        <div class="card-body d-flex align-items-center  p-4">
                            <h4 class="fw-700 mb-0 font-xssss text-grey-900">Event</h4>
                            <a href="#" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                        </div>
                        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                            <div class="bg-success me-2 p-3 rounded-xxl">
                                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span
                                        class="ls-1 d-block font-xsss text-white fw-600">FEB</span>22</h4>
                            </div>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2">Meeting with clients <span
                                    class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave,
                                    floor 24 new work, NY 10010</span> </h4>
                        </div>

                        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                            <div class="bg-warning me-2 p-3 rounded-xxl">
                                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span
                                        class="ls-1 d-block font-xsss text-white fw-600">APR</span>30</h4>
                            </div>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2">Developer Programe <span
                                    class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave,
                                    floor 24 new work, NY 10010</span> </h4>
                        </div>

                        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                            <div class="bg-primary me-2 p-3 rounded-xxl">
                                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span
                                        class="ls-1 d-block font-xsss text-white fw-600">APR</span>23</h4>
                            </div>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2">Aniversary Event <span
                                    class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave,
                                    floor 24 new work, NY 10010</span> </h4>
                        </div>

                    </div>
                </div>
              
                <div class="col-xl-8 col-xxl-9 col-lg-8">
                    <div class="card w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3">
                        <div class="card-body p-0 mt-3 position-relative">
                            <figure class="avatar position-absolute ms-2 mt-1 top-5">
                                <img src="{{ asset('images/' . $profile->profile_picture) }}" alt="image" class="round_img_s shadow-sm rounded-circle w30">
                            </figure>
                            <form id="create-post-form" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <textarea name="description" class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="What's on your mind?" ></textarea>
                                </div>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                               @enderror
                                <div class="card-body d-flex p-0 mt-0">
                                    <a href="#photo" class="create-post-link d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4">
                                        <i class="font-md text-success fa-solid fa-image me-2"></i>
                                        <span class="d-none-xs">Photo/Video</span>
                                    </a>
                                </div>
                                <div class="form-group d-flex">
                                    <label for="image" class="mr-2"></label>
                                    <div class="col">
                                        <input type="file" name="image" class="form-control" id="image" accept="image/*"  style="width: 300px;">
                                    </div>
                                    <div class="col-2 mb-5">
                                        <button type="submit" class="btn btn-primary mt-3">Create</button>
                                    </div>
                                </div>
                                
                                
                                
                                
                            </form>
                            @foreach($posts as $post)
                        @if ($post->profile->name === auth()->user()->name)

                        <div class="card d-flex w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                            <div class="card-body p-0 d-flex">
                                <figure class="avatar me-3">
                                    <img src="{{ asset('images/' . $post->profile->profile_picture) }}" alt="avater" class="round_img_s shadow-sm rounded-circle w45" />
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
                                    2.8K Like
                                </div>
                                <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss">
                                    <i class="fa-solid fa-message-circle text-dark text-grey-900 btn-round-sm font-lg"></i>
                                    <span class="d-none-xss">Comment</span>
                                </a>

                                <a href="{{ route('posts.edit', $post->id) }}" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss">
                                    <i class="fa-solid fa-message-circle text-dark text-grey-900 btn-round-sm font-lg"></i>
                                    <span class="d-none-xss" data-post-id="{{ $post->id }}" >Update</span>
                                </a>
                               
                                
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mx-3 ">Delete</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>

                        @endif
                        @endforeach
                        </div>
                   
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

                    






                    <script>
                        const createPostLink = document.querySelector('.create-post-link');
                        const createPostForm = document.querySelector('#create-post-form');
                    
                        createPostLink.addEventListener('click', (event) => {
                            event.preventDefault(); // Prevent the link from navigating
                            createPostForm.submit(); // Submit the form
                        });
                    </script>
                    
                    
                    

@endsection