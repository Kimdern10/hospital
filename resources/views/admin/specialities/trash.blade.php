@extends('layouts.admin')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">

            <!-- Link to active specialities + Add button -->
            <div class="mb-3">
                <a href="{{ route('admin.specialities.index') }}" class="btn btn-secondary">← Back to Specialities</a>
                
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Deleted Specialities</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 trashed-specialities-table">
                            <thead>
                                <tr class="bg-white">
                                    <th class="bg-primary text-white">#</th>
                                    <th class="bg-primary text-white">Name</th>
                                    <th class="bg-primary text-white">Status</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($specialities as $speciality)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $speciality->name }}</td>
                                    <td>
                                        <span class="badge bg-danger">Trashed</span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <form action="{{ route('admin.specialities.restore', $speciality->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">Restore</button>
                                            </form>
                                            <form action="{{ route('admin.specialities.forceDelete', $speciality->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to permanently delete this speciality?')">Delete Permanently</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-danger">No deleted specialities found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-3 d-flex justify-content-center">
                            {{ $specialities->links() }}
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
    .trashed-specialities-table th,
    .trashed-specialities-table td {
        font-size: 12px;
        padding: 4px 6px;
        white-space: nowrap;
    }

    .trashed-specialities-table {
        font-size: 12px;
    }

    .card-title {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .trashed-specialities-table th,
    .trashed-specialities-table td {
        font-size: 10px;
        padding: 2px 4px;
    }

    .card-title {
        font-size: 14px;
    }
}
</style>
@endsection
