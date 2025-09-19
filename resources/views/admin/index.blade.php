@extends('layouts.admin')

@section('content')

<div class="content-inner container-fluid pb-0" id="page_layout">
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">

                {{-- Total Users --}}
                <div class="col-md-6 col-lg-4 iq-counter">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle p-1 bg-primary d-flex align-items-center justify-content-center"
                                     style="width:66px; height:66px; font-size: 22px;">
                                    <i class="ph ph-user text-white"></i>
                                </div>
                                <div class="text-left ms-3 mt-3">
                                    <h2><span class="counter">{{ $totalUsers }}</span></h2>
                                    <h5>Registered Users</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Doctors --}}
                <div class="col-md-6 col-lg-4 iq-counter">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle p-1 bg-success d-flex align-items-center justify-content-center"
                                     style="width:66px; height:66px; font-size: 22px;">
                                    <i class="ph ph-stethoscope text-white"></i>
                                </div>
                                <div class="text-left ms-3 mt-3">
                                    <h2><span class="counter">{{ $totalDoctors }}</span></h2>
                                    <h5>Doctors</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Blog Posts --}}
                <div class="col-md-6 col-lg-4 iq-counter">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle p-1 bg-info d-flex align-items-center justify-content-center"
                                     style="width:66px; height:66px; font-size: 22px;">
                                    <i class="ph ph-newspaper text-white"></i>
                                </div>
                                <div class="text-left ms-3 mt-3">
                                    <h2><span class="counter">{{ $totalBlogs }}</span></h2>
                                    <h5>Total Blog Posts</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Recent Doctors --}}
                <div class="col-sm-12 mt-4">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-header">
                            <h4 class="card-title">Recent Doctors</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0 table-borderless table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Specialization</th>
                                        <th>Email</th>
                                        <th>Joined</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($doctorFrontend as $doctor)
                                        <tr>
                                            <td>{{ $doctor->name }}</td>
                                            <td>
                                                @forelse($doctor->specialities as $speciality)
                                                    <span class="badge bg-info">{{ $speciality->name }}</span>
                                                @empty
                                                    <span class="text-muted">N/A</span>
                                                @endforelse
                                            </td>
                                            <td>{{ $doctor->email ?? 'N/A' }}</td>
                                            <td>{{ $doctor->created_at->format('Y-m-d') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No doctors found.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                <div class="mt-2">
                                    {{ $doctorFrontend->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Recent Blogs --}}
                <div class="col-sm-12 mt-4">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-header">
                            <h4 class="card-title">Recent Blog Posts</h4>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                @forelse($blogFrontend as $blog)
                                    <a href="{{ route('blog.posts.index') }}" class="list-group-item list-group-item-action">
                                        <h5 class="mb-1">{{ $blog->title }}</h5>
                                        <p class="mb-1">{{ Str::limit($blog->content, 100) }}</p>
                                        <small>By {{ $blog->admin->name ?? 'Admin' }} on {{ $blog->created_at->format('Y-m-d') }}</small>
                                    </a>
                                @empty
                                    <p class="text-center">No blog posts available.</p>
                                @endforelse
                            </div>
                            <div class="mt-2">
                                {{ $blogFrontend->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- end row -->
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    /* Mobile adjustments */
    @media (max-width: 767px) {
        .iq-counter .card-body {
            padding: 12px !important;
        }

        .iq-counter h2 {
            font-size: 20px !important;
        }

        .iq-counter h5 {
            font-size: 14px !important;
        }

        .iq-counter .rounded-circle {
            width: 50px !important;
            height: 50px !important;
            font-size: 18px !important;
        }

        .card .card-header h4 {
            font-size: 16px !important;
        }

        .table th, 
        .table td {
            font-size: 13px !important;
            padding: 6px !important;
        }

        .list-group-item h5 {
            font-size: 15px !important;
        }

        .list-group-item p {
            font-size: 13px !important;
        }

        /* reduce space between stacked cards on mobile */
        .col-sm-12.mt-4 {
            margin-top: 1rem !important;
        }
    }
</style>
@endpush
