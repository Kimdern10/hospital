@extends('layouts.admin')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Create Blog Post</h4>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('blog.posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="topic_id" class="form-label">Select Topic</label>
                            <select name="topic_id" id="topic_id" class="form-control" required>
                                <option value="">-- Choose Topic --</option>
                                @foreach($topics as $topic)
                                    <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Post Title</label>
                            <input type="text" name="title" id="title" class="form-control" required placeholder="Enter post title">
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Post Content</label>
                            <textarea name="content" id="content" class="form-control" rows="6" required placeholder="Write your post..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Post Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>

                        <div class="d-flex gap-2 flex-wrap">
                            <button type="submit" class="btn btn-primary">Publish Post</button>
                            <a href="{{ route('blog.posts.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@push('styles')
<style>
    /* Mobile adjustments for form and text */
    @media (max-width: 767px) {
        .card {
            padding: 10px !important;
        }

        .card-header .card-title {
            font-size: 18px !important;
        }

        .form-label {
            font-size: 14px !important;
        }

        .form-control {
            padding: 8px 10px !important;
            font-size: 14px !important;
        }

        textarea.form-control {
            font-size: 14px !important;
        }

        .btn {
            font-size: 14px !important;
            padding: 8px 12px !important;
        }

        .d-flex.gap-2 {
            flex-direction: column !important;
            gap: 10px !important;
        }
    }
</style>
@endpush

@endsection
