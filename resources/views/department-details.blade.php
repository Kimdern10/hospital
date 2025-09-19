@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section id="hero">
    <div class="inner-banner" style="background-image:url({{ asset('assets/images/banner-department.jpg') }})">
        <div class="container">
            <h3 class="title">Omnisana Hospital<br><big><strong>Departments-Details</strong></big></h3>
        </div>
    </div>
</section>

<!-- Content Area -->
<section class="main-section">
    <div class="about-us-section doctor-detail-cnt">
        <div class="container">
            <div class="row">
                <div class="section-title col-12 clearfix">
                    <div class="float-left">
                        <h2><span>Department: </span>{{ $department->name }}</h2>
                    </div>
                    <!-- <div class="float-right">
                        <a href="/" class="btn btn-primary btn-round">Make Appointment</a>
                    </div> -->
                </div>
            </div>

            <div class="row justify-content-between">
                <!-- Left Side Image -->
                <div class="col-md-4 col-sm-6 p-r-0">
                    <div class="box-img box-shadow">
                        <img src="{{ $department->image ? asset('storage/'.$department->image) : asset('assets/images/department-detail.png') }}" 
                             alt="{{ $department->name }}" class="img-fluid">
                        <span class="section-line"></span>
                    </div>
                </div>

                <!-- Right Side Content -->
                <div class="col-md-7 col-sm-6">
                    <div class="page-text">
                        <p>{{ $department->description ?? 'No description available.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .box-img {
        width: 100%;
        height: 420px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border-radius: 10px;
        margin-bottom: 15px;
    }

    .box-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
    }

    @media (max-width: 768px) {
        .box-img { height: 400px; }
    }

    @media (max-width: 576px) {
        .box-img { height: 420px; }
    }
</style>
@endsection
