<aside class="sidebar sidebar-base" id="first-tour" data-toggle="main-sidebar" data-sidebar="responsive">
    <div class="sidebar-header d-flex align-items-center justify-content-start position-relative">
        <div class="logo pull-left">
            <a href="/" class="img-responsive">
                <img src="{{ asset('admin_asset/images/LOGO-removebg-preview.png') }}" 
                     alt="Hospital Logo" 
                     title="Omnisana Hospital" 
                     style="width: 120px; height: auto;">
            </a>
        </div>

        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg class="icon-20 icon-arrow" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.5 19L8.5 12L15.5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>

    <div class="sidebar-body pt-0 pb-3 data-scrollbar">
        <div class="sidebar-list">
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">

                <!-- Main Section -->
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#">
                        <span class="default-icon">Main Pages</span>
                        <i class="sidenav-mini-icon">-</i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/">
                        <i class="icon"><i class="ph-duotone ph-house"></i></i>
                        <span class="item-name">Home Page</span>
                    </a>
                </li>

                <!-- Admin Section -->
                <li class="nav-item static-item mt-3">
                    <a class="nav-link static-item disabled" href="#">
                        <span class="default-icon">Admin</span>
                        <i class="sidenav-mini-icon">-</i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="icon"><i class="ph-duotone ph-gauge"></i></i>
                        <span class="item-name">Dashboard</span>
                    </a>
                </li>
                   <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('user.list') }}">
                                <i class="icon" data-bs-toggle="tooltip" title="User List" data-bs-placement="right">
                                    <i class="ph-duotone ph-list"></i>
                                </i>
                                <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="User List" data-bs-placement="right">UL</i>
                                <span class="item-name">Users</span>
                            </a>
                        </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.posts.create') }}">
                        <i class="icon"><i class="ph-duotone ph-plus-circle"></i></i>
                        <span class="item-name">Add Blog Post</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.posts.index') }}">
                        <i class="icon"><i class="ph-duotone ph-newspaper"></i></i>
                        <span class="item-name">Blog Posts</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.topics.index') }}">
                        <i class="icon"><i class="ph-duotone ph-list"></i></i>
                        <span class="item-name">Blog Topics</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.topics.create') }}">
                        <i class="icon"><i class="ph-duotone ph-note-pencil"></i></i>
                        <span class="item-name">Add Topics</span>
                    </a>
                </li>

                <!-- Doctors & Hospital Management -->
                <li class="nav-item static-item mt-3">
                    <a class="nav-link static-item disabled" href="#">
                        <span class="default-icon">Hospital</span>
                        <i class="sidenav-mini-icon">-</i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">
                        <i class="icon"><i class="ph-duotone ph-stethoscope"></i></i>
                        <span class="item-name">Doctors List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('create') }}">
                        <i class="icon"><i class="ph-duotone ph-user-plus"></i></i>
                        <span class="item-name">Add Doctor</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('departments.index') }}">
                        <i class="icon"><i class="ph-duotone ph-buildings"></i></i>
                        <span class="item-name">Departments List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('departments.create') }}">
                        <i class="icon"><i class="ph-duotone ph-plus-square"></i></i>
                        <span class="item-name">Add Department</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.specialities.index') }}">
                        <i class="icon"><i class="ph-duotone ph-clipboard-text"></i></i>
                        <span class="item-name">Specialities List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.specialities.create') }}">
                        <i class="icon"><i class="ph-duotone ph-plus-square"></i></i>
                        <span class="item-name">Add Speciality</span>
                    </a>
                </li>

                <!-- Others -->
                <li class="nav-item static-item mt-3">
                    <a class="nav-link static-item disabled" href="#">
                        <span class="default-icon">Others</span>
                        <i class="sidenav-mini-icon">-</i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contacts.index') }}">
                        <i class="icon"><i class="ph-duotone ph-address-book"></i></i>
                        <span class="item-name">Contact List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contacts.create') }}">
                        <i class="icon"><i class="ph-duotone ph-plus-circle"></i></i>
                        <span class="item-name">Add Contact</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about.index') }}">
                        <i class="icon"><i class="ph-duotone ph-info"></i></i>
                        <span class="item-name">About List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about.create') }}">
                        <i class="icon"><i class="ph-duotone ph-plus-square"></i></i>
                        <span class="item-name">Add About</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.appointments.index') }}">
                        <i class="ph-duotone ph-calendar-check"></i>
                        <span class="item-name">Appointments</span>
                    </a>
                </li>

            </ul>
        </div>

        <!-- Footer -->
        <div class="logo pull-left mt-3">
            <a href="/" class="img-responsive">
                <img src="{{ asset('admin_asset/images/LOGO-removebg-preview.png') }}" 
                     alt="Hospital Icon" 
                     style="width: 120px; height: auto;">
            </a>
            <button class="btn w-100 btn-primary mt-4">Support Our Hospital</button>
        </div>
     </div>
</aside>

@push('styles')
<style>
    /* Sidebar Mobile Adjustments */
    @media (max-width: 767px) {
        .sidebar {
            width: 220px !important;
        }

        .sidebar-header .logo img,
        .sidebar-body .logo img {
            width: 90px !important;
        }

        .sidebar-toggle i svg {
            width: 16px !important;
            height: 16px !important;
        }

        .navbar-nav .nav-link {
            padding: 8px 12px !important;
            font-size: 14px !important;
        }

        .navbar-nav .nav-link i {
            font-size: 18px !important;
            margin-right: 8px !important;
        }

        .navbar-nav .static-item .default-icon {
            font-size: 13px !important;
        }

        .sidebar-body .btn {
            padding: 8px 10px !important;
            font-size: 14px !important;
        }
    }
</style>
@endpush
