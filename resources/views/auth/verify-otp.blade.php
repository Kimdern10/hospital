@extends('layouts.app')

@section('content')
<!-- Page Title -->
<section id="hero">
    <div class="inner-banner" style="background-image:url({{ asset('assets/images/banner-blog.jpg') }})">
        <div class="container">
            <h3 class="title">Verify <br><big><strong>Otp</strong></big></h3>
        </div>
    </div>
</section>

<!-- OTP Verification Form -->
<div class="sidebar-page-container py-5">
    <div class="auto-container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="login-box">
                    <div class="card bg-white shadow rounded-3">
                        <div class="card-body p-4">
                            <!-- Heading -->
                            <div class="sec-title centered mb-4">
                                <div class="separator mb-2">
                                    <span class="icon flaticon-pawprint-1"></span>
                                </div>
                                <div class="title text-dark">Because We Really Care About You</div>
                                <h2 class="text-dark fw-bold">Verify Email</h2>
                            </div>

                            <!-- OTP Form -->
                            <form id="otp-form" method="POST" action="{{ route('verify.otp.submit', ['email' => $email]) }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="otp-input" class="form-label text-dark">Enter the 6-digit OTP code</label>
                                    <input type="text"
                                           name="otp"
                                           id="otp-input"
                                           class="form-control @error('otp') is-invalid @enderror"
                                           placeholder="Enter OTP"
                                           maxlength="6"
                                           style="height: 48px; font-size: 16px;" />
                                    @error('otp')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div id="countdown-timer" class="mb-4 text-danger fw-semibold" style="font-size: 14px;"></div>

                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <button type="submit" class="btn btn-primary px-4">Verify</button>
                                    <a href="{{ route('resend.otp', ['email' => $email]) }}"
                                       id="resend-btn"
                                       class="btn btn-outline-secondary"
                                       style="pointer-events: none; opacity: 0.6;"
                                       onclick="localStorage.removeItem('otp-expiry-{{ $email }}')">
                                        <i class="fas fa-paper-plane me-1"></i> Resend Code
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
</div>

<!-- Countdown Timer Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const countdownEl = document.getElementById("countdown-timer");
        const resendBtn = document.getElementById("resend-btn");
        const expiryTimestamp = {{ $otpExpiresAt ?? 'null' }} * 1000;
        const localKey = "otp-expiry-{{ $email }}";

        if (!expiryTimestamp) {
            countdownEl.textContent = "Unable to start timer.";
            return;
        }

        localStorage.setItem(localKey, expiryTimestamp);

        function updateCountdown() {
            const now = Date.now();
            const expiresAt = parseInt(localStorage.getItem(localKey));
            const diff = expiresAt - now;

            if (diff <= 0) {
                countdownEl.textContent = "OTP expired. You can now resend.";
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
