<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Dynamic Page Title -->
    <title>@yield('title', 'Omnisana Hospital')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/Omnisana Hospital Logo Design.png') }}" alt="logo" class="site-logo">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/aos/aos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />



    <style>
        /* Center Loader */
        #loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        /* Loader Animation */
        .loader {
            width: 25px;
            height: 50px;
            display: grid;
            color: #000;
            background:
                linear-gradient(currentColor 0 0) top/100% 2px,
                radial-gradient(farthest-side at  top, #0000 calc(100% - 2px),currentColor calc(100% - 1px) ,#0000) top,
                linear-gradient(currentColor 0 0) bottom/100% 2px,
                radial-gradient(farthest-side at  bottom, #0000 calc(100% - 2px),currentColor calc(100% - 1px) ,#0000) bottom;
            background-size: 100% 1px,100% 50%; 
            background-repeat: no-repeat;
            animation: l18 4s infinite linear;
            margin-bottom: 15px;
        }
        .loader::before,
        .loader::after {
            content: "";
            grid-area: 1/1;
            background: inherit;
            border: inherit;
            animation: inherit;
        }
        .loader::after {
            animation-duration: 2s;
        }
        @keyframes l18 {
            100% {transform: rotate(1turn)}
        }

        /* Please wait text */
        .loading-text {
            font-size: 18px;
            color: #333;
            margin-top: 10px;
        }

        /* Scroll To Top */
        #scrollToTop {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #007bff;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
            display: none;
            z-index: 999;
        }
    </style>
</head>
<body>

<!-- Page Loader -->
<div id="loading">
    <div class="loader"></div>
    <p class="loading-text">Please wait...</p>
</div>

<div class="wrapper" style="display:none;">
    <!-- Header -->
    @include('snippets.header')

    <!-- Page Content -->
    @yield('content')

    <!-- Footer -->
    @include('snippets.footer')
</div>

<!-- Scroll To Top -->
<div id="scrollToTop">0%</div>

<!-- JS Assets -->
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/countto.js') }}"></script>

<!-- SweetAlert -->
<script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<!-- Loader Hide Script -->
<script>
    window.addEventListener("load", function () {
        document.getElementById("loading").style.display = "none";
        document.querySelector(".wrapper").style.display = "block";
    });

    // Scroll To Top with % counter
    const scrollBtn = document.getElementById("scrollToTop");
    window.addEventListener("scroll", () => {
        let scrollTop = window.scrollY;
        let docHeight = document.documentElement.scrollHeight - window.innerHeight;
        let scrollPercent = Math.round((scrollTop / docHeight) * 100);

        if (scrollTop > 100) {
            scrollBtn.style.display = "flex";
            scrollBtn.textContent = scrollPercent + "%";
        } else {
            scrollBtn.style.display = "none";
        }
    });

    scrollBtn.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
</script>

</script>

<!-- Flash Messages -->
@if (session('message'))
<script> swal("Successful!", "{{ session('message') }}", "success"); </script>
@endif
@if (session('info'))
<script> swal("Info", "{{ session('info') }}", "info"); </script>
@endif
@if (session('success'))
<script> swal("Successful!", "{{ session('success') }}", "success"); </script>
@endif
@if (session('error'))
<script> swal("Error!", "{{ session('error') }}", "warning"); </script>
@endif
@if (session('warning'))
<script> swal("Warning!", "{{ session('warning') }}", "warning"); </script>
@endif

</body>
</html>
