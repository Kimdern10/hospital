@extends('layouts.app')
@section('content')

    {{-- Hero Section --}}
    <section id="hero">
        <div class="inner-banner" style="background-image:url({{ asset('assets/images/banner-contactus.jpg') }})">
            <div class="container">
                <h3 class="title">Omnisana <br><big><strong>Contact Us</strong></big></h3>
            </div>
        </div>
    </section>

    {{-- Main Section --}}
    <section class="main-section">

        {{-- Contact Section --}}
        <div class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="section-title col-12" data-aos="fade-right">
                        <h2><span>Get In Touch </span>With Us</h2>
                        <p>We’re here to help you. Fill out the form or reach us directly through our contact details.</p>
                    </div>
                </div>
                <div class="row">
                    
                    {{-- Contact Form --}}
                    <div class="col-md-8 col-sm-6">
                        <div class="contact-form">
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

                    {{-- Quick Contact Sidebar --}}
                    <div class="col-md-4 col-sm-6">
                        <div class="contact-sidebar">
                            <h4>Quick Contact</h4>
                            <p>If you have any questions, simply use the following contact details.</p>
                            <ul class="list-unstyled add-grp">
                                <li>
                                    <i class="zmdi zmdi-pin"></i>
                                    <p>{{ $contactInfo->address ?? 'No address set' }}</p>
                                </li>
                              @if (!empty($contactInfo->phone))
    <li><i class="zmdi zmdi-phone"></i> {{ $contactInfo->phone }}</li>
@endif

@if (!empty($contactInfo->phone_two))
    <li><i class="zmdi zmdi-phone"></i> {{ $contactInfo->phone_two }}</li>
@endif

                                <li>
                                    <i class="zmdi zmdi-email"></i>
                                    <p>{{ $contactInfo->email ?? '' }}</p>
                                </li>
                            </ul>
                            <ul class="list-unstyled social-icon clearfix">
                                <li><a href="#"><i class="zmdi zmdi-facebook-box"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-google-plus-box"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-linkedin-box"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-twitter-box"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-pinterest-box"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- Contact Section --}}



       
    </section>
@endsection
