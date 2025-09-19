@extends('layouts.app')

@section('content')
 <section id="hero">
        <div class="inner-banner" style="background-image: url('{{ asset('assets/images/banner-about.jpg') }}')">
            <div class="container">
                <h3 class="title">About Us<br><big>Omnisana <strong>Hospital</strong></big></h3>
            </div>
        </div>
    </section>

    <!-- Content Area -->
    <section class="main-section">

        <!-- About Us Section -->
        <div class="about-us-section">
            <div class="container">
                <div class="row">
                    <div class="section-title col-12" data-aos="fade-right">
                        <h2><span>About </span>Us</h2>
                        <p>Learn more about who we are, our values, and our commitment to exceptional healthcare.</p>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-md-4 col-sm-6">
                        <div class="box-img box-shadow" data-aos="fade-up">
                            <img src="{{ ('assets/images/first.jpg') }}" alt="About Omnisana Hospital">
                            <span class="section-line" data-aos="fade-right"></span>
                        </div>
                    </div>
                   <div class="col-md-7 col-sm-6">
                      <div class="page-text">
                        <div class="section-top" data-aos="fade-up" data-aos-duration="4000">
                            <p><strong>{{ $aboutUs->title }}</strong> {{ $aboutUs->content }}</p>
                        </div>

                        <div class="mission-vision" data-aos="fade-up" data-aos-duration="4000">
                            @if($aboutUs->mission)
                                <div class="grp-area mission">
                                    <i class="zmdi zmdi-favorite"></i>
                                    <h5>Our Mission</h5>
                                    <p>{{ $aboutUs->mission }}</p>
                                </div>
                            @endif

                            @if($aboutUs->vision)
                                <div class="grp-area vision">
                                    <i class="zmdi zmdi-eye"></i>
                                    <h5>Our Vision</h5>
                                    <p>{{ $aboutUs->vision }}</p>

                                    @if($aboutUs->idea)
                                        <ul class="list-unstyled">
                                            <li>
                                                <i class="zmdi zmdi-thumb-up"></i>
                                                <p>{{ $aboutUs->idea }}</p>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div class="opening-hours" data-aos="fade-up" data-aos-duration="4000">
                            <h6><i class="zmdi zmdi-time"></i> Opening Hours</h6>
                            <ul class="list-unstyled">
                                @foreach($aboutUs->opening_hours ?? [] as $day => $hours)
                                    <li>
                                        <label><i class="zmdi zmdi-chevron-right"></i> {{ $day }}</label>
                                        <span>{{ $hours }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                      </div>
                   </div>
                </div>
            </div>
        </div>
        <!-- About Us Section -->

        <!-- Why choose us -->
 
<!-- Why choose us -->
<div class="why-choose-us py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12" data-aos="fade-up">
                <h2 class="fw-bold"><span class="text-warning">Why</span> Choose Us</h2>
                <p class="text-muted">Trusted healthcare services backed by experience, compassion, and advanced facilities.</p>
            </div>
        </div>

        <div class="row">
            <!-- Qualified Doctors -->
            <div class="col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1200">
                <div class="service-card">
                    <div class="service-icon mb-3">
                        <i class="zmdi zmdi-account-add"></i>
                    </div>
                    <h5>Qualified Doctors</h5>
                    <p>Highly skilled specialists dedicated to expert care.</p>
                </div>
            </div>

            <!-- Blood Bank -->
            <div class="col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1200">
                <div class="service-card">
                    <div class="service-icon mb-3">
                        <i class="zmdi zmdi-collection-add"></i>
                    </div>
                    <h5>Blood Bank</h5>
                    <p>Reliable and safe blood bank for patient needs.</p>
                </div>
            </div>

            <!-- Modern Clinic -->
            <div class="col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1200">
                <div class="service-card">
                    <div class="service-icon mb-3">
                        <i class="zmdi zmdi-hospital-alt"></i>
                    </div>
                    <h5>Modern Clinic</h5>
                    <p>State-of-the-art facilities for top-quality care.</p>
                </div>
            </div>

            <!-- Emergency -->
            <div class="col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1200">
                <div class="service-card">
                    <div class="service-icon mb-3">
                        <i class="zmdi zmdi-thumb-up"></i>
                    </div>
                    <h5>Emergency</h5>
                    <p>24/7 emergency response for critical cases.</p>
                </div>
            </div>

            <!-- 24/7 Service -->
            <div class="col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1200">
                <div class="service-card">
                    <div class="service-icon mb-3">
                        <i class="zmdi zmdi-headset-mic"></i>
                    </div>
                    <h5>24/7 Service</h5>
                    <p>Round-the-clock healthcare support.</p>
                </div>
            </div>

            <!-- Comprehensive Care -->
            <div class="col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1200">
                <div class="service-card">
                    <div class="service-icon mb-3">
                        <i class="zmdi zmdi-shield-check"></i>
                    </div>
                    <h5>Comprehensive Care</h5>
                    <p>Holistic healthcare for long-term wellness.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Styling -->
<style>
    .why-choose-us {
        background: #f8f9fa; /* milky white */
    }
    .service-card {
        background: #fff;
        border-radius: 12px;
        padding: 30px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }
    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }
    .service-card h5 {
        font-weight: 600;
        color: #2c3e50;
    }
    .service-card p {
        color: #666;
        font-size: 0.95rem;
        margin-top: 10px;
    }
    .service-icon i {
        font-size: 42px;
        color: #000; /* pure black icon */
    }
</style>



        <!-- Why choose us -->

        <!-- Fun Fact -->
          <div class="fun-fact">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="fun-fact-box text-center">
                    <i class="zmdi zmdi-account"></i>
                    <span class="counter timer" data-from="0" data-to="562" data-speed="2500"
                          data-fresh-interval="700">562</span>
                    <p>Happy Clients</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="fun-fact-box text-center">
                    <i class="zmdi zmdi-favorite"></i>
                    <span class="counter timer" data-from="0" data-to="2367" data-speed="2500"
                          data-fresh-interval="700">2367</span>
                    <p>Successful Treatments</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="fun-fact-box text-center">
                    <i class="zmdi zmdi-thumb-up"></i>
                    <span class="counter timer" data-from="0" data-to="35" data-speed="2500"
                          data-fresh-interval="700">35</span>
                    <p>Years Of Service</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="fun-fact-box text-center">
                    <i class="zmdi zmdi-mood"></i>
                    <span class="counter timer" data-from="0" data-to="2367" data-speed="2500"
                          data-fresh-interval="700">2367</span>
                    <p>Smiling Patients</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .fun-fact-box {
        background: #ffffff;
        padding: 30px 20px;
        margin: 15px 0;
        border-radius: 20px; /* Rounded corners */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Soft shadow */
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .fun-fact-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
    }

    .fun-fact-box i {
        font-size: 40px;
        color: #0d6efd;
        margin-bottom: 10px;
        display: block;
    }

    .fun-fact-box .counter {
        font-size: 28px;
        font-weight: bold;
        display: block;
        margin-bottom: 8px;
        color: #333;
    }

    .fun-fact-box p {
        font-size: 16px;
        color: #666;
        margin: 0;
    }
</style>
        <!-- Fun Fact -->

        <!-- Our Location -->
        <!-- <div class="our_location">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="section-title col-4" data-aos="fade-right">
                        <h2><span>Our </span>Location</h2>
                        <p>We are proud to serve communities across the globe with trusted healthcare services.</p>
                    </div>
                    <div class="section-title col-7" data-aos="fade-left">
                        <p>With a growing network of hospitals and clinics, Omnisana Hospital is closer to you than ever before.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div id="world-map-markers" style="height:380px;"></div>
                    </div>
                    <div class="col-lg-12 col-md-12">                        
                        <ul class="row location_list list-unstyled">
                            <li class="col-lg-2 col-md-4 col-6">
                                <div class="body xl-turquoise">
                                    <i class="zmdi zmdi-pin"></i>
                                    <h4 class="counter timer" data-from="0" data-to="453" data-speed="2500" data-fresh-interval="700">453</h4>
                                    <span>America</span>
                                </div>
                            </li>
                            <li class="col-lg-2 col-md-4 col-6">
                                <div class="body xl-khaki">
                                    <i class="zmdi zmdi-pin"></i>
                                    <h4 class="counter timer" data-from="0" data-to="124" data-speed="2500" data-fresh-interval="700">124</h4>
                                    <span>Australia</span>
                                </div>
                            </li>
                            <li class="col-lg-2 col-md-4 col-6">
                                <div class="body xl-parpl">
                                    <i class="zmdi zmdi-pin"></i>
                                    <h4 class="counter timer" data-from="0" data-to="215" data-speed="2500" data-fresh-interval="700">215</h4>
                                    <span>Canada</span>
                                </div>
                            </li>
                            <li class="col-lg-2 col-md-4 col-6">
                                <div class="body xl-salmon">
                                    <i class="zmdi zmdi-pin"></i>
                                    <h4 class="counter timer" data-from="0" data-to="155" data-speed="2500" data-fresh-interval="700">155</h4>
                                    <span>India</span>
                                </div>
                            </li>
                            <li class="col-lg-2 col-md-4 col-6">
                                <div class="body xl-blue">
                                    <i class="zmdi zmdi-pin"></i>
                                    <h4 class="counter timer" data-from="0" data-to="78" data-speed="2500" data-fresh-interval="700">78</h4>
                                    <span>UK</span>
                                </div>
                            </li>
                            <li class="col-lg-2 col-md-4 col-6">
                                <div class="body xl-slategray">
                                    <i class="zmdi zmdi-pin"></i>
                                    <h4 class="counter timer" data-from="0" data-to="55" data-speed="2500" data-fresh-interval="700">55</h4>
                                    <span>Other</span>
                                </div>
                            </li>                      
                        </ul>                        
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Our Location -->

        <!-- Our Team -->
        <div class="our-team">
    <div class="container">
        <div class="row justify-content-between">
            <div class="section-title left col-lg-4" data-aos="fade-up">
                <h2><span>Meet </span>Our Team</h2>
                <p>Our team of highly skilled doctors, nurses, and staff are dedicated to delivering the best possible healthcare to every patient.</p>
            </div>
            <div class="section-title right col-lg-8" data-aos="fade-up">
                <p><span class="color-212121">Omnisana Hospital</span> brings together expertise, compassion, and teamwork to ensure outstanding patient care across all specialties.</p>
            </div>
        </div>

      

        <div class="row">
            @foreach($doctorFrontend as $doctor)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-box text-center" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="5000">
                        <div class="doctor-pic">
                            <img src="{{ $doctor->image ? asset('storage/' . $doctor->image) : asset('assets/images/doctor-detail.png') }}" 
                                 alt="{{ $doctor->name }}"
                                 class="doctor-img">
                        </div>
                        <div class="doctor-info">
                            <h4>{{ $doctor->name }} 
                                <span>{{ $doctor->department->name ?? 'Specialist' }}</span>
                            </h4>
<!--                             
                            <ul class="clearfix">
                                <li><a href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul> -->

                            <a class="btn btn-simple btn-primary btn-round" 
                               href="{{ route('doctors.detail', $doctor->slug) }}">
                               View More
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
        <!-- Our Team -->

    </section>
    

@endsection
