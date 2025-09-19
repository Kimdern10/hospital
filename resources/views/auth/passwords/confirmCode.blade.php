@extends('layouts.app')

@section('content')
<!-- Page Title -->
<section id="hero">
    <div class="inner-banner" style="background-image:url({{ asset('assets/images/banner-blog.jpg') }})">
        <div class="container">
            <h3 class="title">Confirm  <br><big><strong>  Code</strong></big></h3>
        </div>
    </div>
</section>
<!-- End Page Title -->

<!-- Confirm Code Section -->
<div class="sidebar-page-container" style="margin-top: 20px;">
    <div class="auto-container">
        <div class="row clearfix justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="card bg-white shadow rounded">
                    <div class="card-body">
                        <!-- Section Header -->
                        <div class="text-center mb-4">
                            <h3 class="text-primary">Confirm Verification Code</h3>
                            <p class="text-muted">A verification code has been sent to your email. Please enter the code below to continue.</p>
                        </div>

                        <!-- Countdown Display -->
                        <div id="countdown-timer" class="text-danger fw-bold mb-3 text-center"></div>

                        <!-- Confirm Code Form -->
                        <form method="POST" action="{{ route('submitPasswordResetCode') }}">
                            @csrf

                            <input type="hidden" name="user_email" value="{{ $email }}" class="form-control @error('user_email') is-invalid @enderror">
                            @error('user_email')
                                <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                            @enderror

                            <div class="form-group">
                                <label for="code">Verification Code *</label>
                                <input id="code" type="text" name="code" class="form-control @error('code') is-invalid @enderror" required placeholder="Enter 6-digit code">
                                @error('code')
                                    <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <button id="verify-btn" class="btn btn-primary">Verify</button>
                                <a href="{{ route('resend.code', ['email' => $email]) }}"
                                   id="resend-btn"
                                   class="btn btn-secondary"
                                   style="pointer-events: none; opacity: 0.6;"
                                   onclick="localStorage.removeItem('otp-expiry-{{ $email }}')">
                                   Resend Code
                                </a>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Countdown Timer Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const countdownEl = document.getElementById("countdown-timer");
        const resendBtn = document.getElementById("resend-btn");

        const expiryTimestamp = {{ $otpExpiresAt ?? 'null' }} * 1000;
        const localKey = "otp-expiry-{{ $email }}";

        if (!expiryTimestamp) {
            countdownEl.innerHTML = "Unable to start timer.";
            return;
        }

        localStorage.setItem(localKey, expiryTimestamp);

        function updateCountdown() {
            const now = Date.now();
            const expiresAt = parseInt(localStorage.getItem(localKey));
            const diff = expiresAt - now;

            if (diff <= 0) {
                countdownEl.textContent = "Code expired. You can now resend.";
                resendBtn.disabled = false;
                resendBtn.style.pointerEvents = "auto";
                resendBtn.style.opacity = "1";
                return;
            }

            const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const secs = Math.floor((diff % (1000 * 60)) / 1000);
            countdownEl.textContent = `Code expires in ${mins}m ${secs}s`;

            resendBtn.disabled = true;
            resendBtn.style.pointerEvents = "none";
            resendBtn.style.opacity = "0.6";

            setTimeout(updateCountdown, 1000);
        }

        updateCountdown();
    });
</script>
@endsection
