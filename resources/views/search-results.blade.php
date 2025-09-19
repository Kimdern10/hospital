@extends('layouts.app')

@section('content')
<!-- <section id="hero">
    <div class="inner-banner" style="background-image:url(assets/images/banner-doctors.jpg)">
        <div class="container">
            <h3 class="title">Our <br><big><strong>Specialists</strong></big></h3>
        </div>
    </div>
</section> -->

<!-- Content Area -->
<section class="main-section">
    <div class="our-team doctors-team">
        <div class="container">
            <div class="row justify-content-between">
                <!-- <div class="section-title left col-lg-4" data-aos="fade-right">
                    <h2><span>Meet </span>Our Experts</h2>
                    <p>Dedicated healthcare professionals committed to your well-being and recovery.</p>
                </div>
                <div class="section-title right col-lg-8" data-aos="fade-left">
                    <p><span class="color-212121">Omnisana Hospital</span> provides compassionate care with experienced specialists who combine medical excellence with patient-centered service.</p>
                </div> -->
            </div>

            <div class="row">
                @forelse($doctors as $doctor)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="team-box text-center" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="3000">
                            <div class="doctor-pic">
                                @if($doctor->image)
                                    <img src="{{ asset('storage/'.$doctor->image) }}" alt="{{ $doctor->name }}" class="doctor-img">
                                @else
                                    <img src="{{ asset('assets/images/default-doctor.png') }}" alt="{{ $doctor->name }}" class="doctor-img">
                                @endif
                            </div>
                            <div class="doctor-info">
                                <h4>{{ $doctor->name }}
                                    <span>{{ $doctor->department->name ?? 'Specialist' }}</span>
                                </h4>

                                <!-- Specialities -->
                                <p>
                                    <strong>Specialities:</strong>
                                    @if($doctor->specialities->isNotEmpty())
                                        {{ $doctor->specialities->pluck('name')->join(', ') }}
                                    @else
                                        N/A
                                    @endif
                                </p>

                                <!-- Social Icons -->
                                <ul class="clearfix">
                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                                </ul>

                                <!-- View Profile -->
                                <a class="btn btn-simple btn-primary btn-round" href="{{ route('doctors.detail', $doctor->id) }}">View Profile</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-danger">
                        <p>No doctors found for your search.</p>
                    </div>
                @endforelse
            </div>

        
        </div>
    </div>
</section>

{{-- Shared Image Sizing for Doctors & Team --}}
<style>
    .doctor-pic {
        width: 100%;
        height: 420px; /* uniform height */
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border-radius: 10px;
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
