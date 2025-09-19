@extends('layouts.app')

@section('content')
    
    <section id="hero">
        <div class="inner-banner" style="background-image: url('{{ asset('assets/images/banner-service.jpg') }}')">
            <div class="container">
                <h3 class="title">About Us<br><big>Omnisana <strong>Hospital</strong></big></h3>
            </div>
        </div>
    </section>

    <!-- Content Area -->
    <section class="main-section">

        <!-- About Us Section -->
        <div class="service-section">
            <div class="container">
                <div class="row">
                    <div class="section-title col-12" data-aos="fade-right">
                        <h2><span>Welcome </span>Omnisana Hospital</h2>
                        <p>Delivering trusted healthcare with compassion, innovation, and excellence for every patient we serve.</p>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-md-5 col-sm-12">
                        <div class="service-cnt">
                            <p>Omnisana Hospital is a multi-specialty healthcare center dedicated to providing advanced medical services in a patient-friendly environment. With world-class facilities, modern technology, and highly experienced doctors, we ensure that each patient receives the best possible care tailored to their needs.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="services-btn-grp">
                            <div class="find-doctor service-btn float-left">
                                <a href="{{ route('doctor') }}" class="text-center">
                                    <i class="zmdi zmdi-account-add"></i>
                                    <h4><span>Find & Search</span>A Doctor</h4>
                                </a>
                            </div>
             <div class="book-appoitntment service-btn float-left">
    <a href="javascript:void(0);" class="text-center">
        <i class="zmdi zmdi-phone"></i>
        <h4>
            <span>Book Appointment</span>
            @if($contactInfo->phone)
                {{ $contactInfo->phone }}
            @elseif($contactInfo->email)
                <small style="font-size: 13px; display:block;">
                    {{ $contactInfo->email }}
                </small>
            @endif
        </h4>
    </a>
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Us Section -->

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
        <div class="support-home enquiry-section xl-slategray">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 text-sm-center">
                        <h4>Your journey to better health and a brighter future begins with us.</h4>
                    </div>
                    <div class="col-md-2 text-md-right text-sm-center">
                        <!-- <a class="btn btn-primary btn-round" href="javascript:void(0);" data-aos="flip-up">Enquiry</a> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Fun Fact -->

        <!-- Services List -->
        <div class="department-list services-list">
            <div class="container">
                <div class="row">
                    <div class="section-title col-12" data-aos="fade-right">
                        <h2><span>Most </span>Popular Services</h2>
                        <p>Explore our wide range of trusted medical services designed to meet your health needs.</p>
                    </div>
                </div>
                <div class="row" data-aos="flip-up">
                    <div class="col-md-4 col-sm-6">
                        <div class="department-box box-img-cnt">
                            <div class="box-img"><img src="{{ asset('assets/images/service-1.png') }}" alt=""></div>
                            <div class="box-cnt">
                                <h4>Routine CheckUp</h4>
                                <p>Comprehensive health checkups and screenings to detect, prevent, and manage health issues early.</p>
                                <!-- <a class="btn btn-primary btn-simple btn-round" href="javascript:void(0);">View More</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="department-box box-img-cnt">
                            <div class="box-img"><img src="{{ asset('assets/images/service-2.png') }}" alt=""></div>
                            <div class="box-cnt">
                                <h4>Medical Counseling</h4>
                                <p>Personalized guidance and expert consultations to support patients in making informed health decisions.</p>
                                <!-- <a class="btn btn-primary btn-simple btn-round" href="javascript:void(0);">View More</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="department-box box-img-cnt">
                            <div class="box-img"><img src="{{ asset('assets/images/service-3.png') }}" alt=""></div>
                            <div class="box-cnt">
                                <h4>Medicine Research</h4>
                                <p>Innovative medical research aimed at advancing treatments and improving healthcare outcomes.</p>
                                <!-- <a class="btn btn-primary btn-simple btn-round" href="javascript:void(0);">View More</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services List -->

    </section>
@endsection
