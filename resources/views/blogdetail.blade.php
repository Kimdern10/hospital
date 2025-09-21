@extends('layouts.app')

@section('content')
    
<section id="hero">
    <div class="inner-banner" style="background-image:url({{ asset('assets/images/banner-blog.jpg') }})">
        <div class="container">
            <h3 class="title">Our <br><big><strong>Blog</strong></big></h3>
        </div>
    </div>
</section>

<section class="main-section blog-page">
    <div class="container">
        <div class="row">
            <!-- Main Blog Content -->
            <div class="col-lg-8 col-md-12">
                <div class="card single_post">
                    <div class="body">
                        <h3 class="m-t-0 m-b-5">{{ $post->title }}</h3>
                        <ul class="meta">
                            <li><i class="zmdi zmdi-account col-blue"></i> Posted By: Admin</li>
                            <li><i class="zmdi zmdi-label col-red"></i> {{ $post->topic->name ?? 'General' }}</li>
                            <li><i class="zmdi zmdi-calendar col-blue"></i> {{ $post->created_at->format('M d, Y') }}</li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="img-post m-b-15">
                            <img src="{{ asset('storage/' . $post->image) }}" 
                                 alt="{{ $post->title }}" 
                                 style="width:100%; height:400px; object-fit:cover; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.15);">
                        </div>
                        <p>{!! nl2br(e($post->content)) !!}</p>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 col-md-12 right-box">

                {{-- Search --}}
                <div class="card">
                    <div class="body search">
                        <form action="{{ route('blogs') }}" method="GET">
                            <div class="input-group m-b-0">
                                <input type="text" name="q" class="form-control" placeholder="Search..." value="{{ request('q') }}">
                                <span class="input-group-addon">
                                    <button type="submit" style="border:none; background:none;">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Popular Posts --}}
                <div class="card">
                    <div class="header">
                        <h2><strong>Popular</strong> Posts</h2>
                    </div>
                    <div class="body widget popular-post">
                        @forelse ($popularPosts as $pPost)
                            <div class="border single_post mb-3">                                    
                                <div class="img-post m-b-5">
                                    <img src="{{ asset('storage/' . $pPost->image) }}" 
                                         alt="{{ $pPost->title }}" 
                                         style="width:100%; height:190px; object-fit:cover; border-radius:8px;">
                                </div>
                                <p class="m-b-0">
                                    <a href="{{ route('blog.details', $pPost->slug) }}">
                                        {{ Str::limit($pPost->title, 40) }}
                                    </a>
                                </p>
                                <small>{{ $pPost->created_at->format('M d, Y') }}</small>
                            </div>
                        @empty
                            <p>No popular posts yet.</p>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<style>
/* Disable black & white hover effect */
.img-post img {
    filter: none !important;
    transition: none !important;
}
.img-post img:hover {
    filter: none !important;
}
</style>

@endsection
