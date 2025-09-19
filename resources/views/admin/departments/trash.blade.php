@extends('layouts.admin')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">

         

            <!-- Links -->
            <div class="mb-3">
                <a href="{{ route('departments.index') }}" class="btn btn-secondary">← Back to Department List</a>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Deleted Departments</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 trashed-department-table">
                            <thead>
                                <tr class="bg-white">
                                    <th class="bg-primary text-white">#</th>
                                    <th class="bg-primary text-white">Department Name</th>
                                    <th class="bg-primary text-white">Description</th>
                                    <th class="bg-primary text-white">Image</th>
                                    <th class="bg-primary text-white">Deleted At</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($departments as $department)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td>{{ Str::limit($department->description, 50) ?? '—' }}</td>
                                    <td>
                                        @if($department->image)
                                            <img src="{{ asset('storage/' . $department->image) }}" width="80" class="rounded img-fluid">
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td>{{ $department->deleted_at->format('j F, Y h:i A') }}</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <form action="{{ route('departments.restore', $department->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">Restore</button>
                                            </form>
                                            <form action="{{ route('departments.forceDelete', $department->id) }}" method="POST" 
                                                onsubmit="return confirm('Are you sure you want to permanently delete this department?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete Permanently</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-danger">No deleted departments found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-3 d-flex justify-content-center">
                            {{ $departments->links() }}
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
      .trashed-department-table th,
    .trashed-department-table td {
        font-size: 12px;
        padding: 4px 6px;
        white-space: nowrap;
    }

     .trashed-department-table {
        font-size: 12px;
    }

    .card-title {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .trashed-department-table th,
    .trashed-department-table td {
        font-size: 10px;
        padding: 2px 4px;
    }

    .card-title {
        font-size: 14px;
    }
}
</style>
@endsection
