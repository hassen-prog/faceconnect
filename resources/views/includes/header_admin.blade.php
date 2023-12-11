<div class="nav-header bg-white shadow-xs border-0">
    <div class="nav-top">
        <a href="/admin"><img src="{{ asset('images/logofaceconnect.svg') }}" alt="user" class="w40 logosize position-absolute left-1" />
        </a>

    </div>








    <ul class="nav ms-auto align-items-center">



        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                <span class="p-0 ms-3 menu-icon">Admin</span>
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

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

    <nav class="navigation scroll-bar ">
        <div class="container ps-0 pe-0">
            <div class="nav-content">
                <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2"
                    style="height:82vh">
                    <div class="nav-caption fw-600 font-xssss text-grey-500"><span>Tables</div>
                    <ul class="mb-1 top-content">
                        <li class="logo d-none d-xl-block d-lg-block"></li>
                        <!-- <li><a href="/home" class="nav-content-bttn open-font"><i
                                    class="fa-solid fa-user fa-2xl btn-round-md bg-blue-gradiant me-3"></i><span>Users</span></a>
                        </li> -->


                        <li><a href="/admin/profiles" class="nav-content-bttn open-font stylehome">
                            <i class="fa-solid fa-user-check fa-2xl btn-round-md bg-secondary me-3 "></i>
                            <span>Profiles
                            </span></a>
                    </li>
                    <li><a href="/admin/posts" class="nav-content-bttn open-font">
                        <i class="fa-solid fa-newspaper fa-2xl btn-round-md bg-secondary me-3"></i>
                        <span>Posts
                        </span></a>
                </li>
                

                    </ul>
                </div>
                <i class="fa-solid fa-user-check">‌</i>

            </div>
        </div>
    </nav>

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
