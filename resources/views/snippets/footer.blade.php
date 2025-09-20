<footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form" data-aos="fade-up" data-aos-duration="3000">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group m-b-0">
                                    <input type="text" value="" placeholder="your name" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group m-b-0">
                                    <input type="text" value="" placeholder="your email" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <button class="btn btn-primary btn-round btn-block margin-0">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-lg-4 col-md-12">
                    <div class="fcard about">
                        <h5 class="title">About Hospitals</h5>
                        <p>The relentless service of Hospitals in the past 25 years taken health care to the most modern
                            levels in the region catering to urban & rural.</p>
                        <p>A Health Care Provider of Western Approach, Hospitals is the most trusted multispecialty
                            hospital.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="fcard links">
                        <h5 class="title">Usefull Links</h5>
                        <div class="row">
                            <div class="col-6">
                                <ul class="list-unstyled">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="{{ route('services') }}">Services</a></li>
                                    <li><a href="{{ route('departments') }}">Department </a></li>
                                    <li><a href="{{ route('doctor') }}">Doctors</a></li>
                                    <li><a href="{{ route('blogs') }}">Blog</a></li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('about') }}">About us</a></li>
                                    <li><a href="{{ route('contact') }}">Contact us</a></li>
                                    <li><a href="javascript:void(0);">Appointments</a></li>
                                    <li><a href="javascript:void(0);">Latest News</a></li>
                                    <li><a href="javascript:void(0);">Certificates</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  @if($contactInfo)
<div class="fcard contact links">
    <h5 class="title">Contact Details</h5>
    <ul class="list-unstyled">
        <li><i class="zmdi zmdi-pin"></i> {{ $contactInfo->address }}</li>
        <li><i class="zmdi zmdi-email"></i> {{ $contactInfo->email }}</li>
       @if (!empty($contactInfo->phone))
    <li><i class="zmdi zmdi-phone"></i> {{ $contactInfo->phone }}</li>
@endif

@if (!empty($contactInfo->phone_two))
    <li><i class="zmdi zmdi-phone"></i> {{ $contactInfo->phone_two }}</li>
@endif

        <li><i class="zmdi zmdi-time"></i> {{ $contactInfo->working_days }}</li>
        <li><i class="zmdi zmdi-time"></i> {{ $contactInfo->weekend_days }}</li>
    </ul>
</div>
@endif

                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-md-6 text-center text-md-start">
    <small>
        &copy; {{ date('Y') }} Omnisana. All rights reserved.
    </small>
</div>

                   
                    <div class="col-lg-4 col-md-4">
                        <div class="social float-md-right"><a href="#"><i class="zmdi zmdi-facebook m-r-10"></i></a> <a
                                href="#"><i class="zmdi zmdi-twitter m-r-10"></i></a> <a href="#"><i
                                class="zmdi zmdi-dribbble m-r-10"></i></a> <a href="#"><i
                                class="zmdi zmdi-behance m-r-10"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>









