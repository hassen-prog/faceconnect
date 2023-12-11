<div class="nav-header bg-white shadow-xs border-0">
    <div class="nav-top">
        <a href="/"><img src="{{ asset('images/logofaceconnect.svg') }}" alt="user" class="w40 logosize position-absolute left-0" />
        </a>
        <a href="/defaultmessage" class="mob-menu ms-auto me-2 chat-active-btn"><i
                class="feather-message-circle text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
        <a href="/defaultvideo" class="mob-menu me-2"><i
                class="feather-video text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
        <span onClick={toggleActive} class="me-2 menu-search-icon mob-menu"><i
                class="feather-search text-grey-900 font-sm btn-round-md bg-greylight"></i></span>
        <button onClick={toggleOpen} class="nav-menu me-0 ms-2 "></button>
    </div>

    <!-- <form action="#" class="float-left header-search ms-3">
        <div class="form-group mb-0 icon-input">
            <i class="feather-search font-sm text-grey-400"></i>
            <input type="text" placeholder="Start typing to search.."
                class="bg-grey border-0 lh-32 pt-2 pb-2 ps-5 pe-3 font-xssss fw-500 rounded-xl w350 theme-dark-bg" />
        </div>
    </form> -->
    <a activeclass="active" href="/home" class="p-2 text-center ms-3 menu-icon center-menu-icon"><i
            class="fa-solid fa-house fa-xl bg-greylight btn-round-lg theme-dark-bg text-grey-500 stylehome"></i></a>
    <!-- <a activeclass="active" href="/defaultstorie" class="p-2 text-center ms-0 menu-icon center-menu-icon"><i
            class="fa-solid fa-bolt fa-xl bg-greylight btn-round-lg theme-dark-bg text-grey-500"></i></a> -->
    <!-- <a activeclass="active" href="/defaultvideo" class="p-2 text-center ms-0 menu-icon center-menu-icon"><i
            class="fa-solid fa-video fa-xl bg-greylight btn-round-lg theme-dark-bg text-grey-500"></i></a> -->
    <a activeclass="active" href="{{ route('user') }}" class="p-2 text-center ms-0 menu-icon center-menu-icon"><i
            class="fa-regular fa-user fa-xl bg-greylight btn-round-lg theme-dark-bg text-grey-500 stylehome2"></i></a>
    <!-- <a activeclass="active" href="/shop2" class="p-2 text-center ms-0 menu-icon center-menu-icon">
        <i class="fa-solid fa-box-archive fa-xl bg-greylight btn-round-lg theme-dark-bg text-grey-500"></i>
    </a> -->





    <!-- Authentication Links -->
    @guest
        <ul class="ms-auto d-flex  ">
            @if (Route::has('login'))
                <li class="nav-item m-2">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item m-2">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        </ul>
    @else
        <ul class="nav ms-auto align-items-center">
            
            <li class="nav-item "><a href="/chat" class="p-2 text-center ms-3 menu-icon chat-active-btn"><i
                        class="fa-regular fa-message fa-2xl"></i></a></li>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <span href="/defaultsettings" class="p-0 ms-3 menu-icon">
                        @if (auth()->user()->profile && auth()->user()->profile->profile_picture)
                            <img src="{{ asset('images/' . auth()->user()->profile->profile_picture) }}" alt="user"
                                class="round_img_m w40 mt--1" style="border-radius: 100%" />
                        @else
                            <img src="{{ asset('images/user.png') }}" alt="user" class="round_img_m w40 mt--1"
                                style="border-radius: 100%" />
                        @endif
                    </span>

                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/user">
                        Profile
                    </a>
                    <a class="dropdown-item">
                        Settings
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    @endguest


    <!-- <nav class="navigation scroll-bar ">
        <div class="container ps-0 pe-0">
            <div class="nav-content">
                <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2">
                    <div class="nav-caption fw-600 font-xssss text-grey-500"><span>New </span>Feeds</div>
                    <ul class="mb-1 top-content">
                        <li class="logo d-none d-xl-block d-lg-block"></li>
                        <li><a href="/home" class="nav-content-bttn open-font"><i
                                    class="fa-solid fa-newspaper fa-2xl btn-round-md bg-blue-gradiant me-3"></i><span>Newsfeed</span></a>
                        </li>
                        

                        <li><a href="/chat" class="nav-content-bttn open-font"><i
                            class="fa-solid fa-inbox fa-2xl btn-round-md bg-gold-gradiant me-3"></i><span>Chat</span></a>

                        <li><a href="/user" class="nav-content-bttn open-font">
                                <i class="fa-solid fa-user-check fa-2xl btn-round-md bg-secondary me-3"></i>
                                <span>Profile

                        </li>
                    </ul>
                </div>

               
            </div>
        </div>
    </nav> -->

    <div class="app-header-search ">
        <form class="search-form">
            <div class="form-group searchbox mb-0 border-0 p-1">
                <input type="text" class="form-control border-0" placeholder="Search..." />
                <i class="input-icon">
                    <ion-icon name="search-outline" role="img" class="md hydrated"
                        aria-label="search outline"></ion-icon>
                </i>
                <span class="ms-1 mt-1 d-inline-block close searchbox-close">
                    <i class="ti-close font-xs" onClick={toggleActive}></i>
                </span>
            </div>
        </form>
    </div>

</div>
