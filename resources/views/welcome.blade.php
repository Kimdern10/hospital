@extends('layouts.app')
@section('content')
  <!-- start hero -->
   <section id="hero">
    <div class="slider" style="background-image: url('{{ asset('assets/images/ChatGPT.png') }}'); position: relative;">

        <!-- Overlay -->
        <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(53, 51, 51, 0.5); z-index:1;"></div>

        <div class="container" style="position:relative; z-index:2;">
            <div class="slider_text">
               <h3 class="title" style="color:#ffffff;">
    <strong span  style="color:#F5F5F5;">Welcome to</span></strong> <br>
    Omnisana <strong style="color:#00BCD4;">Hospital</strong>
</h3>
<p class="sub-title" style="color:#f1f1f1;">
    Providing compassionate care, advanced treatment, and world-class facilities for you and your family.
</p>

               <button onclick="window.location.href='{{ route('about') }}'" 
        class="btn btn-primary btn-round">
    View More
</button>

            </div>
            <form action="{{ route('appointments.store') }}" method="POST">
                @csrf
                <div class="slider_form row"> 
                    <p class="col-12">Make an Appointment</p>

                    {{-- Name --}}
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Enter Name" class="form-control m-b-15" required>
                        </div>
                    </div>

                    {{-- Mobile --}}
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="form-group">
                            <input type="text" name="mobile" placeholder="Enter Mobile" class="form-control m-b-15" required>
                        </div>
                    </div>

                    {{-- Date --}}
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="form-group">
                            <input type="date" name="date" class="form-control m-b-15" required>
                        </div>
                    </div>

                    {{-- Doctor Dropdown --}}
                    <div class="col-lg-4 col-md-6 col-6">
                        <select name="doctor_id" class="form-control m-b-15" required>
                            <option selected disabled>Select Doctor</option>
                            @foreach($allDoctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Department Dropdown --}}
                    <div class="col-lg-4 col-md-6 col-6">
                        <select name="department_id" class="form-control" required>
                            <option selected disabled>Select Department</option>
                            @foreach($allDepartments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Submit --}}
                    <div class="col-lg-4 col-md-6">
                        <button type="submit" class="btn btn-primary btn-round btn-block m-t-0 m-b-0">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

     

    <!-- Content Area -->
    <section class="main-section">

        <!-- Home About Us Section -->
        <div class="about-us-section">
            <div class="container">
                <div class="row">
                    <div class="section-title col-12 mb-12 mt-5" data-aos="fade-up">
                        <h2><span>About </span>Us</h2>
                        <p>Omnisana Hospital is dedicated to delivering excellence in healthcare through innovation, compassion, and expertise.</p>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-4 col-sm-4">
       <div class="box-img box-shadow" data-aos="fade-up" 
     style="width:100%; max-width:1000px; height:510px; overflow:hidden; border-radius:8px;">
    <img src="{{ asset('assets/images/second.jpg') }}" alt="Second Image" 
         style="width:100%; height:100%; object-fit:cover; object-position:center;">
    <span class="section-line" data-aos="fade-up"></span>
</div>


                    </div>
                    <div class="col-lg-7 col-sm-8 mt-5">
                        <div class="common-cnt" data-aos="fade-up">
                            <div class="section-top">
                                <p><strong>Omnisana Hospital</strong> has built a strong reputation as a trusted medical center, providing high-quality healthcare with a patient-first approach.</p>
                            </div>
                            <p>For years, we have been delivering exceptional medical services across multiple specialties, ranging from cardiology and neurology to pediatrics and surgery. Our doctors, nurses, and staff are committed to ensuring every patient feels cared for, respected, and safe.</p>
                            <p>We combine state-of-the-art facilities with compassionate service to ensure the best outcomes for our patients and their families.</p>
                            <p>
                                <!-- <a class="btn btn-primary btn-simple btn-round margin-0" data-aos="flip-up">View More</a> -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
/* Tablet */
@media (max-width: 992px) {
    .box-img {
        height: 580px !important;
    }
}

/* Mobile */
@media (max-width: 768px) {
    .box-img {
        height: 610px !important;
    }
}

/* Small mobile */
@media (max-width: 480px) {
    .box-img {
        height: 490px !important;
    }
}
</style>

        <!-- Home About Us Section -->

        <!-- Home About Us Section -->
           <div class="our-best-service section-65-100" style="background: #f9f9fb; padding: 60px 0;">
    <div class="container">
        <!-- Section Title -->
        <div class="row mb-5">
            <div class="section-title col-12 text-center" data-aos="fade-up">
                <h2 style=" section-title font-size: 2.5rem; font-weight: 700; color: #2c3e50;">
                    <span style="color: #007bff;">Our </span>Best Services
                </h2>
                <p style="max-width: 650px; margin: 15px auto; font-size: 1.1rem; color: #555;">
                    We provide a full spectrum of specialized healthcare services designed to meet the needs of all patients.
                </p>
            </div>
        </div>
<style>
/* Tablet */
@media (max-width: 992px) {
    h2.section-title {
        font-size: 2rem !important;
    }
}

/* Mobile */
@media (max-width: 768px) {
    h2.section-title {
        font-size: 1.6rem !important;
    }
}

/* Small mobile */
@media (max-width: 480px) {
    h2.section-title {
        font-size: 1.3rem !important;
    }
}
</style>

        <!-- Services Grid -->
       <div class="row">
    <!-- Cardio Monitoring -->
    <div class="col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1200">
        <div class="service-card">
            <div class="service-icon mb-3">
                <img src="{{ asset('assets/images/icon-cardio-monitoring.png') }}" alt="Cardio Monitoring" style="width: 70px;">
            </div>
            <h5>Cardio Monitoring</h5>
            <p>
                Accurate, real-time monitoring and diagnosis of cardiovascular conditions with expert guidance.
            </p>
        </div>
    </div>

    <!-- Orthodontics -->
    <div class="col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1200">
        <div class="service-card">
            <div class="service-icon mb-3">
                <img src="{{ asset('assets/images/icon-orthodontics.png') }}" alt="Orthodontics" style="width: 70px;">
            </div>
            <h5>Orthodontics</h5>
            <p>
                Modern orthodontic solutions for healthier smiles, including braces, aligners, and corrective treatments.
            </p>
        </div>
    </div>

    <!-- Traumatology -->
    <div class="col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1200">
        <div class="service-card">
            <div class="service-icon mb-3">
                <img src="{{ asset('assets/images/icon-traumatology.png') }}" alt="Traumatology" style="width: 70px;">
            </div>
            <h5>Traumatology</h5>
            <p>
                Emergency care and surgical expertise in handling accidents, fractures, and trauma cases.
            </p>
        </div>
    </div>

    <!-- Cardiology -->
    <div class="col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1200">
        <div class="service-card">
            <div class="service-icon mb-3">
                <img src="{{ asset('assets/images/icon-cardiology.png') }}" alt="Cardiology" style="width: 70px;">
            </div>
            <h5>Cardiology</h5>
            <p>
                Advanced diagnosis and treatment of heart-related diseases with state-of-the-art technology.
            </p>
        </div>
    </div>

    <!-- Prostheses -->
    <div class="col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1200">
        <div class="service-card">
            <div class="service-icon mb-3">
                <img src="{{ asset('assets/images/icon-prostheses.png') }}" alt="Prostheses" style="width: 70px;">
            </div>
            <h5>Prostheses</h5>
            <p>
                Customized prosthetic solutions to restore mobility, independence, and quality of life.
            </p>
        </div>
    </div>

    <!-- Pulmonary -->
    <div class="col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1200">
        <div class="service-card">
            <div class="service-icon mb-3">
                <img src="{{ asset('assets/images/icon-pulmonary.png') }}" alt="Pulmonary" style="width: 70px;">
            </div>
            <h5>Pulmonary</h5>
            <p>
                Comprehensive diagnosis and treatment for lung and respiratory system conditions.
            </p>
        </div>
    </div>
</div>

    </div>
</div>

<!-- Hover Effect -->
<style>
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
</style>
        <!-- Home About Us Section -->

        <!-- Home Fun Fact -->
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
        <!-- Home Fun Fact -->

        <!-- Home Our Team -->
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
                            
                            <!-- <ul class="clearfix">
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

        <!-- Home Our Team -->

        <!-- Home Why choose us -->
        <div class="why-choose-us">
            <div class="container">
                <div class="row">
                    <div class="section-title col-12" data-aos="fade-up">
                        <h2><span>Why </span>Choose Us</h2>
                        <p>We combine innovation, expertise, and compassion to provide the best possible care.</p>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-6 col-md-12">
                        <div class="common-cnt">
                            <div class="section-top" data-aos="fade-down">
                                <p>Our goal is to ensure your health and well-being<br>
                                    with advanced technology<br>
                                    and personalized care</p>
                            </div>
                            <p data-aos="fade-down" data-aos-duration="3000">Omnisana Hospital provides comprehensive healthcare services under one roof, ensuring that every patient receives the right treatment at the right time. From preventive care to advanced surgery, our hospital is designed to serve your every need with precision and care.</p>
                          <p>
    <a href="{{ route('services') }}" 
       class="btn btn-primary btn-round" 
       data-aos="flip-up">
       More about practice
    </a>
</p>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="box-img" data-aos="fade-up" data-aos-duration="3000">
                            <img src="{{asset('assets/images/image.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Home Why choose us -->

        <!-- Home Support -->
        <div class="support-home text-center xl-slategray">
            <div class="container">
                <div class="row">
                     @if($contactInfo)
<div class="col-12">
    <h4>We provide 24/7 customer support.</h4>
    <p>{{ $contactInfo->support_text ?? 'For emergency cases, please contact us at '.$contactInfo->phone.'. We are here for you anytime, any day.' }}</p>
    <!-- <a class="btn btn-primary btn-simple btn-round" href="javascript:void(0);">Read More</a> -->
</div>
@endif
                </div>
            </div>
        </div>
        <!-- Home Support -->

        <!-- Home Blog -->
       <div class="home-blog"> 
 <div class="container">
    <div class="row">
        <div class="section-title col-12" data-aos="fade-up">
            <h2><span>Latest </span>From Blog</h2>
            <p>Stay updated with the latest health tips, hospital news, and patient success stories from Omnisana Hospital.</p>
        </div>
    </div>
 

<div class="row" data-aos="flip-up">
    @foreach ($blogFrontend as $post)
        <div class="col-lg-4 col-md-6">
            <div class="blog-box">
                <div class="blog-img">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="">
                </div>
                <div class="blog-cnt">
                    <h5>
                        <a href="{{ route('blog.details', $post->slug) }}">
                            {{ $post->title }}
                        </a>
                    </h5>
                   <p>
    {{ Str::limit(strip_tags($post->content), 25) }}
    <a href="{{ route('blog.details', $post->slug) }}">Read More</a>
</p>

                </div>
                <div class="blog-info">
                    <span class="blog-date">
                        <i class="zmdi zmdi-calendar"></i> {{ $post->created_at->format('d M Y') }}
                    </span>
                </div>
            </div>
        </div>
    @endforeach
</div>


  <!-- Pagination Links -->
 <div class="d-flex justify-content-center mt-4">
    {{ $blogFrontend->links() }}
</div>
</div>

</div>

        <!-- Home Blog -->

    </section>
     @endsection
