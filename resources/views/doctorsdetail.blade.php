@extends('layouts.app')

@section('content')
<section id="hero">
    <div class="inner-banner" style="background-image: url('{{ asset('assets/images/banner-doctors-detail.jpg') }}')">
        <div class="container">
            <h3 class="title">{{ $doctor->department->name ?? 'Specialist' }} <br><big><strong>Dr. {{ $doctor->name }}</strong></big></h3>
        </div>
    </div>
</section>

<!-- Content Area -->
<section class="main-section">

    <!-- Doctor Profile Section -->
    <div class="about-us-section doctor-detail-cnt">
        <div class="container">
            <div class="row">
                <div class="section-title col-12 clearfix">
                    <div class="float-left">
                        <h2><span>Dr. </span>{{ $doctor->name }}</h2>
                        <!-- <p>{{ $doctor->description ?? 'No description available.' }}</p> -->
                    </div>
                    <div class="float-right">
                        <a href="/" class="btn btn-primary btn-round">Make Appointment</a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-md-4 col-sm-6 p-r-0">
                    <div class="box-img box-shadow">
                        <img src="{{ $doctor->image ? asset('storage/' . $doctor->image) : asset('assets/images/doctor-detail.png') }}" alt="{{ $doctor->name }}">
                        <span class="section-line"></span>
                    </div>

                  <!-- Working Hours -->
                   <div class="opening-hours">
    <h6><i class="zmdi zmdi-time"></i> Working Hours</h6>
    <ul class="list-unstyled">
        @php
            $hours = is_array($doctor->working_hours) 
                        ? $doctor->working_hours 
                        : json_decode($doctor->working_hours, true) ?? [];
        @endphp

        @if(!empty($hours))
            @foreach($hours as $day => $time)
                <li>
                    <label><i class="zmdi zmdi-chevron-right"></i> {{ $day }}</label>
                    <span>{{ $time }}</span>
                </li>
            @endforeach
        @else
            <li>Not available</li>
        @endif
    </ul>
</div>


                </div>

                <div class="col-md-7 col-sm-6">
                    <div class="page-text">
                        <!-- <div class="doctor-detail-map m-b-10">
                            <img src="{{ asset('assets/images/doctor-detail-map.png') }}" alt="Map">
                        </div>
                        <div class="doctor-cnt"> -->
                          <p class="ul-title" style="font-size: 14px; font-weight: bold; margin-bottom: 12px;">
                                <span>Location</span><br>
                                {{ $doctor->location }}
                            </p>
                            <p>{{ $doctor->bio ?? 'No biography available.' }}</p>
                              <p>{{ $doctor->email  }}</p>
                              <p>{{ $doctor->phone  }}</p>

                          <p class="ul-title" style="font-size: 16px; font-weight: bold; margin-bottom: 12px;">
    <span>Specialities</span>
</p>
<ul class="list-unstyled">
    @foreach($doctor->specialities as $speciality)
        <li style="margin-bottom: 6px; font-size: 12px;">
            <span style="font-weight: bold; margin-right: 6px;">&gt;</span> {{ $speciality->name }}
        </li>
    @endforeach
</ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Doctors Section -->
<div class="our-team doctors-team">
    <div class="container">
        <!-- Section Title -->
        <div class="row justify-content-between">
            <div class="section-title left col-lg-4" data-aos="fade-up">
                <h2><span>Related </span>Doctors</h2>
                <p>Meet other experienced specialists connected to this department.</p>
            </div>
            <div class="section-title right col-lg-8" data-aos="fade-up">
                <p><span class="color-212121">Omnisana Hospital</span> provides compassionate care with experienced specialists who combine medical excellence with patient-centered service.</p>
            </div>
        </div>

        <!-- Doctors Grid -->
        <div class="row">
            @foreach($relatedDoctors as $relDoctor)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-box text-center" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="3000">
                        <div class="doctor-pic">
                            <img src="{{ $relDoctor->image ? asset('storage/' . $relDoctor->image) : asset('assets/images/doctor-detail.png') }}" 
                                 alt="{{ $relDoctor->name }}" 
                                 class="doctor-img">
                        </div>
                        <div class="doctor-info">
                            <h4>{{ $relDoctor->name }} 
                                <span>{{ $relDoctor->department->name ?? 'Specialist' }}</span>
                            </h4>
                            
                            <!-- Working Hours -->
                            <ul class="list-unstyled">
                                @php
                                    $relHours = is_array($relDoctor->working_hours) ? $relDoctor->working_hours : json_decode($relDoctor->working_hours, true) ?? [];
                                @endphp
                                @foreach($relHours as $day => $time)
                                    <li><strong>{{ $day }}:</strong> {{ $time }}</li>
                                @endforeach
                            </ul>

                            <a class="btn btn-simple btn-primary btn-round" href="{{ route('doctors.detail', $relDoctor->slug) }}">View Profile</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</section>
<!-- Shared Image Sizing (same as Our Team) -->
<style>
    .doctor-pic {
        width: 100%;
        height: 420px; /* consistent height */
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border-radius: 10px;
        margin-bottom: 15px;
    }

    .doctor-pic img.doctor-img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* ensures no stretching */
        border-radius: 10px;
    }

    /* Tablet (≤768px) */
    @media (max-width: 768px) {
        .doctor-pic {
            height: 400px;
        }
    }

    /* Mobile (≤576px) */
    @media (max-width: 576px) {
        .doctor-pic {
            height: 420px;
        }
    }
</style>
@endsection
