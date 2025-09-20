<div class="main_header">
    <section id="top-nav">
        <div class="container">
            <div class="top">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="left">
                            <ul class="list-unstyled m-b-0">
                                <li>
                                    @if($contactInfo)
                                        <a href="mailto:{{ $contactInfo->email }}" class="btn btn-link">
                                            <i class="zmdi zmdi-email m-r-5"></i>{{ $contactInfo->email }}
                                        </a>
                                        @if (!empty($contactInfo->phone))
                                            <a href="tel:{{ $contactInfo->phone }}" class="btn btn-link">
                                                <i class="zmdi zmdi-phone m-r-5"></i>{{ $contactInfo->phone }}
                                            </a>
                                        @endif

                                        @if (!empty($contactInfo->phone_two))
                                            <a href="tel:{{ $contactInfo->phone_two }}" class="btn btn-link">
                                                <i class="zmdi zmdi-phone m-r-5"></i>{{ $contactInfo->phone_two }}
                                            </a>
                                        @endif
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-5">
                        <div class="text-right d-none d-md-block">
                            <ul class="list-unstyled m-b-0">
                                <li>
                                    @if(Auth::check())
                                        @if(Auth::user()->role_as == 1)
                                            <a href="{{ route('admin.dashboard')}}" class="btn btn-link">Dashboard</a>
                                            <a href="{{ route('logout')}}" class="btn btn-link"
                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                               Logout
                                            </a>
                                            <form action="{{ route('logout')}}" method="post" style="display:none;" id="logout-form">
                                                @csrf
                                            </form>
                                        @elseif(Auth::user()->role_as == 0)
                                            <a href="{{ route('logout')}}" class="btn btn-link"
                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                               Logout
                                            </a>
                                            <form action="{{ route('logout')}}" method="post" style="display:none;" id="logout-form">
                                                @csrf
                                            </form>
                                        @endif
                                    @else
                                        <a href="{{ route('login')}}" class="btn btn-link">Sign in</a>
                                        <a href="{{ route('sign-up')}}" class="btn btn-link">Sign up</a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <header id="header">
        <div class="container">
            <div class="head">
                <div class="row">
                    <div class="col-lg-5 col-sm-5">
                        <div class="left">
                            <a href="/" class="navbar-brand">
                                <img src="{{ asset('assets/images/Omnisana_Hospital_Logo_Design-removebg-preview.png') }}" 
                                     alt="logo" 
                                     class="site-logo" 
                                     style="width: 160px; height: auto;">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-sm-7">
                        <div class="text-right d-none d-md-block">
                           @if($contactInfo)
                                <p class="col-white m-b-0 p-t-5">
                                    <i class="zmdi zmdi-time"></i> {{ $contactInfo->working_days }} | {{ $contactInfo->weekend_days }}
                                </p>
                                <p class="col-white m-b-0">
                                    <i class="zmdi zmdi-pin"></i> {{ $contactInfo->address }}
                                </p>
                                @if (!empty($contactInfo->address_two))
                                    <p class="col-white m-b-0">
                                        <i class="zmdi zmdi-pin"></i> {{ $contactInfo->address_two }}
                                    </p>
                                @endif
                           @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="navbar" data-aos="fade-down" class="mt-8">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('services') }}">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('departments') }}">Departments</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('doctor') }}">Doctors</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('blogs') }}">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact Us</a></li>

                        {{-- Mobile Auth Links --}}
                        @if(Auth::check())
                            @if(Auth::user()->role_as == 1)
                                <li class="nav-item d-md-none"><a class="nav-link" href="{{ route('admin.dashboard')}}">Dashboard</a></li>
                                <li class="nav-item d-md-none">
                                    <a class="nav-link" href="{{ route('logout')}}"
                                       onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();">Logout</a>
                                    <form action="{{ route('logout')}}" method="post" id="mobile-logout-form" style="display:none;">
                                        @csrf
                                    </form>
                                </li>
                            @elseif(Auth::user()->role_as == 0)
                                <li class="nav-item d-md-none">
                                    <a class="nav-link" href="{{ route('logout')}}"
                                       onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();">Logout</a>
                                    <form action="{{ route('logout')}}" method="post" id="mobile-logout-form" style="display:none;">
                                        @csrf
                                    </form>
                                </li>
                            @endif
                        @else
                            <li class="nav-item d-md-none"><a class="nav-link" href="{{ route('login')}}">Sign in</a></li>
                            <li class="nav-item d-md-none"><a class="nav-link" href="{{ route('sign-up')}}">Sign up</a></li>
                        @endif

                        {{-- Mobile Search --}}
                        <li class="nav-item d-lg-none mt-2">
                            <form class="form-inline w-100" action="{{ route('doctors.search') }}" method="GET">
                                <input class="form-control mb-2" 
                                       type="search" 
                                       name="search" 
                                       value="{{ request('search') }}"
                                       placeholder="Search doctors, department, or speciality">
                                <button class="btn btn-primary btn-block" type="submit">Search</button>
                            </form>
                        </li>
                    </ul>

                    {{-- Desktop Search --}}
                    <form class="form-inline my-2 my-lg-0 d-none d-lg-flex"
                          action="{{ route('doctors.search') }}" method="GET">
                        <input class="form-control mr-sm-2" 
                               type="search" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Search doctors, department, or speciality">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</div>
