@extends('layouts.app')

@section('content')
<!-- Page Title (Same as Register) -->
<section id="hero">
    <div class="inner-banner" style="background-image:url({{ asset('assets/images/banner-blog.jpg') }})">
        <div class="container">
            <h3 class="title">Our<br><big><strong>Sign in</strong></big></h3>
        </div>
    </div>
</section>

    
<!-- End Page Title -->

<!-- Login Section -->
<div class="sidebar-page-container py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="card bg-white shadow rounded">
                    <div class="card-body">
                        <!-- Section Header -->
                        <div class="text-center mb-4">
                            <h3 class="text-primary">Welcome Back</h3>
                            <p class="text-muted">Please log in to access your hospital dashboard.</p>
                        </div>

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">Email Address *</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter your email">
                                @error('email') <span class="text-danger" style="font-size: 12px">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password *</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password">
                                @error('password') <span class="text-danger" style="font-size: 12px">{{ $message }}</span> @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <button class="btn btn-primary">Login</button>
                                <a href="{{ route('forgetPassword') }}">Forgot Password?</a>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
