@extends('layouts.admin')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">

            <!-- Link to trashed posts -->
            <div class="mb-3">
                <a href="{{ route('blog.posts.trash') }}" class="btn btn-primary">View Trashed</a>
                <a href="{{ route('blog.posts.create') }}" class="btn btn-primary">+ Add New Post</a>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Blog Post List</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 blog-table">
                            <thead>
                                <tr class="bg-white">
                                    <th class="bg-primary text-white">#</th>
                                    <th class="bg-primary text-white">Topic</th>
                                    <th class="bg-primary text-white">Title</th>
                                    <th class="bg-primary text-white">Image</th>
                                    <th class="bg-primary text-white">Created At</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->topic->name ?? 'N/A' }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        @if($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}" width="80" class="rounded">
                                        @else
                                            No image
                                        @endif
                                    </td>
                                    <td>{{ $post->created_at->format('j F, Y') }}</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <a href="{{ route('blog.posts.edit', $post->id) }}" class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <form action="{{ route('blog.posts.destroy', $post->id) }}" method="POST" 
                                                onsubmit="return confirm('Move this post to trash?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger-subtle btn-sm">
                                                    <i class="ph ph-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-danger">No blog posts found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-3 d-flex justify-content-center">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Custom CSS for responsiveness --}}
<style>
@media (max-width: 768px) {
    .blog-table th,
    .blog-table td {
        font-size: 12px;   /* smaller font */
        padding: 4px 6px;  /* less padding */
        white-space: nowrap;
    }

    .blog-table {
        font-size: 12px;
    }

    .card-title {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .blog-table th,
    .blog-table td {
        font-size: 10px;
        padding: 2px 4px;
    }

    .card-title {
        font-size: 14px;
    }
}
</style>
@endsection
