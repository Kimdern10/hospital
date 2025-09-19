@extends('layouts.app')

@section('content')
<!-- Page Title -->
<section id="hero">
    <div class="inner-banner" style="background-image:url({{ asset('assets/images/banner-blog.jpg') }})">
        <div class="container">
            <h3 class="title">Create <br><big><strong>Account</strong></big></h3>
        </div>
    </div>
</section>

<!-- Register Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-5 rounded-4">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <h2 class="fw-bold text-primary">Create Your Patient Account</h2>
                            <p class="text-secondary fs-5">Fill in the form below to access your patient portal.</p>
                        </div>

                        <form action="{{ route('create-user') }}" method="POST" novalidate>
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="form-label fs-5">Full Name *</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-lg" placeholder="Enter your full name">
                                @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label fs-5">Email Address *</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" placeholder="Enter your email address">
                                @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label fs-5">Password *</label>
                                <input type="password" name="password" class="form-control form-control-lg" placeholder="Create a password">
                                @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="confirm_password" class="form-label fs-5">Confirm Password *</label>
                                <input type="password" name="confirm_password" class="form-control form-control-lg" placeholder="Confirm your password">
                                @error('confirm_password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-check mb-4">
                                <input type="checkbox" class="form-check-input" id="terms" name="terms">
                                <label class="form-check-label fs-6" for="terms">
                                    I agree to the <a href="#" class="text-primary">terms</a> and <a href="#" class="text-primary">privacy policy</a>.
                                </label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Register</button>
                            </div>
                        </form>

                        <div class="mt-4 text-center">
                            <p class="text-muted">Already have an account? <a href="{{ route('login') }}" class="text-primary fw-bold">Login here</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
