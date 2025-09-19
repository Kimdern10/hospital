@extends('layouts.app')

@section('content')
<!-- Page Title Section with Background Image -->
<section id="hero">
    <div class="inner-banner" style="background-image:url({{ asset('assets/images/banner-blog.jpg') }})">
        <div class="container">
            <h3 class="title">Forgot <br><big><strong> Password</strong></big></h3>
        </div>
    </div>
</section>

<!-- Forgot Password Form Section -->
<div class="sidebar-page-container py-5">
    <div class="auto-container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card bg-white shadow rounded">
                    <div class="card-body p-4">
                        <!-- Heading Section -->
                        <section class="logo text-center mb-4">
                            <div class="sec-title centered">
                                <div class="separator mb-2">
                                    <span class="icon flaticon-pawprint-1"></span>
                                </div>
                                <h2 class="text-dark mb-1">Forgot Password</h2>
                                <p class="text-muted">
                                   No worries, we will send you a verification code to reset your password
                                </p>
                            </div>
                        </section>

                        <!-- Display Success Message -->
                        <!-- @if (session('status'))
                            <div class="alert alert-success text-center">
                                {{ session('status') }}
                            </div>
                        @endif -->

                        <!-- Forgot Password Form -->
                        <form method="POST" action="{{ route('forgotPassword.email') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email" class="form-label text-dark">Email Address *</label>
                                <input id="email" type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btnhover">Submit</button>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div>
        </div>
    </div>
</div>


@endsection
