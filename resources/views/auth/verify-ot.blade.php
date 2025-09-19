@extends('layouts.app')

@section('content')
<section class="page-title" style="background-image:url(images/background/7.jpg)">
    <div class="auto-container">
        <div class="clearfix">
            <div class="pull-left">
                <h1>Verify-Otp</h1>
            </div>
            <div class="pull-right">
                <ul class="page-breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Verify</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="clearfix">
            <div id="login" class="ptb ptb-xs-40 page-signin">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="main-body">
                                <div class="body-inner">
                                    <div class="card bg-white">
                                        <div class="card-content">
                                            <section class="logo text-center">
                                                <div class="sec-title centered">
                                                    <div class="separator">
                                                        <span class="icon flaticon-pawprint-1"></span>
                                                    </div>
                                                    <div class="title">Because We Really Care About Your Pets</div>
                                                    <h2>Verify</h2>
                                                </div>
                                            </section>

                                            <form id="otp-form" method="POST" action="{{ route('verify.otp.submit', ['email' => $email]) }}">
                                                @csrf
                                                <h4 class="text-secondary">Verify Email Account</h4>
                                                <p class="font-weight-600">A 6-digit code has been sent to your email. Enter it below to verify.</p>

                                                {{-- Countdown timer --}}
                                                <div id="countdown-timer" style="font-weight: bold; color: red; margin-bottom: 10px;"></div>

                                                <fieldset>
                                                    <div class="form-group">
                                                        <div class="ui-input-group">
                                                            <input name="otp" id="otp-input" class="form-control" placeholder="Enter OTP" type="text">
                                                            @error('otp')
                                                                <span class="text-danger" style="font-size: 12px">{{$message}}</span>
                                                            @enderror
                                                            <label>Code *</label>
                                                        </div>
                                                    </div>

                                                    <div class="text-left">
                                                        <button id="verify-btn" class="btn btn-primary btnhover me-2">Verify</button>
                                                        <a href="{{ route('resend.otp', ['email' => $email]) }}"
                                                           id="resend-btn"
                                                           class="btn btn-secondary"
                                                           style="pointer-events: none; opacity: 0.6;"
                                                           onclick="localStorage.removeItem('otp-expiry-{{ $email }}')">
                                                           <i class="fas fa-unlock-alt"></i> Resend Code
                                                        </a>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                        <!-- <div class="card-action no-border text-end"> <a href="#/page/signin">Login</a><button class="color-primary">Sign Up</button> </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Countdown Timer Script --}}
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

        // Always reset the expiry on page load with fresh value from backend
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
