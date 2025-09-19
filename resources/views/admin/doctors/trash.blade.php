@extends('layouts.admin')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">

            <!-- Link back to main doctor list -->
            <div class="mb-3">
                <a href="{{ route('index') }}" class="btn btn-secondary">← Back to Doctors</a>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Trashed Doctors</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 trashed-doctors-table">
                            <thead>
                                <tr class="bg-white">
                                    <th class="bg-primary text-white">#</th>
                                    <th class="bg-primary text-white">Image</th>
                                    <th class="bg-primary text-white">Name</th>
                                    <th class="bg-primary text-white">Phone</th>
                                    <th class="bg-primary text-white">Email</th>
                                    <th class="bg-primary text-white">Department</th>
                                    <th class="bg-primary text-white">Deleted At</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($doctors as $doctor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($doctor->image)
                                            <img src="{{ asset('storage/' . $doctor->image) }}" width="60" height="60" class="rounded" alt="{{ $doctor->name }}">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->phone }}</td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>{{ $doctor->department->name ?? 'N/A' }}</td>
                                    <td>{{ $doctor->deleted_at->format('j F, Y') }}</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <form action="{{ route('restore', $doctor->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">Restore</button>
                                            </form>
                                            <form action="{{ route('forceDelete', $doctor->id) }}" method="POST"
                                                  onsubmit="return confirm('Are you sure you want to permanently delete this doctor?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete Permanently</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-danger">No trashed doctors found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-3 d-flex justify-content-center">
                            {{ $doctors->links() }}
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
    .trashed-doctors-table th,
    .trashed-doctors-table td {
        font-size: 12px;
        padding: 4px 6px;
        white-space: nowrap;
    }

    .trashed-doctors-table {
        font-size: 12px;
    }

    .card-title {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .trashed-doctors-table th,
    .trashed-doctors-table td {
        font-size: 10px;
        padding: 2px 4px;
    }

    .card-title {
        font-size: 14px;
    }
}
</style>
@endsection
