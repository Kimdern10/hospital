@extends('layouts.admin')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">

            <!-- Links to Trash and Create -->
            <div class="mb-3">
                <a href="{{ route('admin.topics.trash') }}" class="btn btn-primary">View Trashed</a>
                <a href="{{ route('admin.topics.create') }}" class="btn btn-primary">+ Add New Topic</a>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Blog Topic List</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 topics-table">
                            <thead>
                                <tr class="bg-white">
                                    <th class="bg-primary text-white">#</th>
                                    <th class="bg-primary text-white">Topic Name</th>
                                    <th class="bg-primary text-white">Created At</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($topics as $topic)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $topic->name }}</td>
                                    <td>{{ $topic->created_at->format('j F, Y') }}</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <a href="{{ route('admin.topics.edit', $topic->id) }}" 
                                               class="btn btn-warning btn-sm">Edit</a>

                                            <form action="{{ route('admin.topics.destroy', $topic->id) }}" method="POST"
                                                  onsubmit="return confirm('Move this topic to trash?');">
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
                                    <td colspan="4" class="text-center text-danger">No topics found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-3 d-flex justify-content-center">
                            {{ $topics->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<style>
@media (max-width: 768px) {
    .topics-table th,
    .topics-table td {
        font-size: 12px;
        padding: 4px 6px;
        white-space: nowrap;
    }

    .topics-table {
        font-size: 12px;
    }

    .card-title {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .topics-table th,
    .topics-table td {
        font-size: 10px;
        padding: 2px 4px;
    }

    .card-title {
        font-size: 14px;
    }
}
</style>
@endsection
