@extends('layouts.app')

@section('content')
<section id="hero">
    <div class="inner-banner" style="background-image:url({{ asset('assets/images/banner-blog.jpg') }})">
        <div class="container text-center">
            <h3 class="title">Our <br><big><strong>Blog</strong></big></h3>
        </div>
    </div>
</section>

<section class="main-section blog-page">
    <div class="container">
        <div class="row justify-content-center">
            
            {{-- Blog content --}}
            <div class="col-lg-8 col-md-12 left-box">
                @forelse ($posts as $post)
                    <div class="card single_post mb-4" data-aos="fade-up">
                        <div class="body">
                            <h3>
                                <a href="{{ route('blog.details', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <ul class="meta">
                                <li><i class="zmdi zmdi-account col-blue"></i> Posted By: Admin</li>
                                <li><i class="zmdi zmdi-label col-red"></i> {{ $post->topic->name ?? 'General' }}</li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="img-post m-b-15">
                                <img src="{{ asset('storage/' . $post->image) }}" 
                                    alt="{{ $post->title }}" 
                                    style="width:100%; height:400px; object-fit:cover; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.15);">
                            </div>
                            <p>{{ Str::limit(strip_tags($post->content), 150) }}</p>
                            <a href="{{ route('blog.details', $post->slug) }}" class="btn btn-round btn-info">Read More</a>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No blog posts found.</p>
                @endforelse

                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-4">
                    {{ $posts->links() }}
                </div>
            </div>

            {{-- Sidebar --}}
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
                        @foreach ($popularPosts as $pPost)
                            <div class="border single_post mb-3">                                    
                                <div class="img-post m-b-5">
                                    <img src="{{ asset('storage/' . $pPost->image) }}" 
                                         alt="{{ $pPost->title }}" 
                                         style="width:100%; height:190px; object-fit:cover;">
                                </div>
                                <p class="m-b-0">
                                    <a href="{{ route('blog.details', $pPost->slug) }}">
                                        {{ Str::limit($pPost->title, 40) }}
                                    </a>
                                </p>
                                <small>{{ $pPost->created_at->format('M d, Y') }}</small>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Tag Clouds --}}
                <div class="card">
                    <div class="header">
                        <h2><strong>Tag</strong> Clouds</h2>
                    </div>
                    <div class="body widget tag-clouds">
<ul class="list-unstyled m-b-0">
    <li><a href="javascript:void(0);" class="tag badge badge-default">Cardio Monitoring</a></li>
    <li><a href="javascript:void(0);" class="tag badge badge-success">Traumatology</a></li>
    <li><a href="javascript:void(0);" class="tag badge badge-info">Creative UX</a></li>
    <li><a href="javascript:void(0);" class="tag badge badge-success">Pulmonary</a></li>
    <li><a href="javascript:void(0);" class="tag badge badge-warning">Cardiology</a></li>
</ul>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
