@extends('layouts.app')

@section('content')
<section id="hero">
    <div class="inner-banner" style="background-image:url({{ asset('assets/images/banner-department.jpg') }})">
        <div class="container">
            <h3 class="title">Omnisana Hospital<br><big><strong>Our Departments</strong></big></h3>
        </div>
    </div>
</section>

<section class="main-section">
    <div class="department-list">
        <div class="container">
            <div class="row">
                @foreach($departments as $department)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="department-box box-img-cnt text-center" data-aos="fade-up" data-aos-duration="3000">
                            <div class="box-img">
                                @if($department->image)
                                    <img src="{{ asset('storage/'.$department->image) }}" alt="{{ $department->name }}" class="department-img">
                                @else
                                    <img src="{{ asset('assets/images/default-department.jpg') }}" alt="{{ $department->name }}" class="department-img">
                                @endif
                            </div>
                            <div class="box-cnt">
                              <a href="{{ route('departments.details', $department->slug) }}">
    {{ $department->name }}
</a>

                                <p>{{ Str::limit($department->description, 100, '...') }}</p>
                                <a class="btn btn-primary btn-simple btn-round" href="{{ route('departments.details', $department->slug) }}">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $departments->links() }}
            </div>
        </div>
    </div>
</section>

<!-- ✅ Unified image sizing like doctors/team -->
<style>
    .department-box .box-img {
        width: 100%;
        height: 380px; /* Default height */
        overflow: hidden;
        border-radius: 10px;
        margin-bottom: 15px;
    }

    .department-box .box-img img.department-img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* crop nicely */
        border-radius: 10px;
    }

    /* Tablet (≤768px) */
    @media (max-width: 768px) {
        .department-box .box-img {
            height: 400px;
        }
    }

    /* Mobile (≤576px) */
    @media (max-width: 576px) {
        .department-box .box-img {
            height: 420px;
        }
    }
</style>
@endsection
