@extends('layouts.admin')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit Blog Post</h4>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('blog.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Topic</label>
                            <select name="topic_id" class="form-control" required>
                                @foreach($topics as $topic)
                                    <option value="{{ $topic->id }}" {{ $post->topic_id == $topic->id ? 'selected' : '' }}>
                                        {{ $topic->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" value="{{ $post->title }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea name="content" rows="5" class="form-control" required>{{ $post->content }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label><br>
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" width="120" class="mb-2 rounded">
                            @endif
                            <input type="file" name="image" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Post</button>
                        <a href="{{ route('blog.posts.index') }}" class="btn btn-secondary">Back</a>
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

