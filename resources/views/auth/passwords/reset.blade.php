@extends('layouts.app')

@section('content')
<section id="hero">
    <div class="inner-banner" style="background-image:url({{ asset('assets/images/banner-blog.jpg') }})">
        <div class="container">
            <h3 class="title">Reset  <br><big><strong>  Password</strong></big></h3>
        </div>
    </div>
</section>



<div class="sidebar-page-container py-5">
    <div class="auto-container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="login-box">
                    <div class="card bg-white shadow">
                        <div class="card-body p-4">
                            <div class="sec-title text-center mb-4">
                                <div class="separator mb-2">
                                    <span class="icon flaticon-pawprint-1"></span>
                                </div>
                                <p class="fw-bold text-dark">Enter a new password to reset your account</p>
                                <h2 class="h4 text-dark">Reset Password</h2>
                            </div>

                            <form method="POST" action="{{ route('create.new-password') }}">
                                @csrf
                                <input type="hidden" name="user_email" value="{{ $email }}">

                                <div class="form-group mb-3">
                                    <label for="password" class="form-label text-dark">New Password *</label>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password" required placeholder="Enter new password">
                                    @error('password')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="confirm_password" class="form-label text-dark">Confirm Password *</label>
                                    <input id="confirm_password" type="password"
                                           class="form-control @error('confirm_password') is-invalid @enderror"
                                           name="confirm_password" required placeholder="Confirm password">
                                    @error('confirm_password')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                            </form>

                            <div class="text-center mt-3">
                                <a href="{{ route('login') }}" class="text-decoration-underline">Back to Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
</div>
@endsection
