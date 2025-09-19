@extends('layouts.admin')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">

            <!-- Link to trashed specialities + Add button -->
           

               <div class="mb-3">
                <a href="{{ route('admin.specialities.trash') }}" class="btn btn-primary">View Trashed</a>
                <a href="{{ route('admin.specialities.create') }}" class="btn btn-primary">+ Add Speciality</a>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Specialities List</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 specialities-table">
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
                                        @if($speciality->deleted_at)
                                            <span class="badge bg-danger">Trashed</span>
                                        @else
                                            <span class="badge bg-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            @if(!$speciality->deleted_at)
                                                <!-- Edit -->
                                                <a href="{{ route('admin.specialities.edit', $speciality->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                                <!-- Soft Delete -->
                                                <form action="{{ route('admin.specialities.destroy', $speciality->id) }}" method="POST" 
                                                    onsubmit="return confirm('Move this speciality to trash?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger-subtle btn-sm">
                                                        <i class="ph ph-trash"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <!-- Restore -->
                                                <form action="{{ route('admin.specialities.restore', $speciality->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Restore this speciality?')">Restore</button>
                                                </form>

                                                <!-- Force Delete -->
                                                <form action="{{ route('admin.specialities.forceDelete', $speciality->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-dark" onclick="return confirm('Permanently delete this speciality?')">Delete Permanently</button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-danger">No specialities found</td>
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
<style>
@media (max-width: 768px) {
    .specialities-table th,
    .specialities-table td {
        font-size: 12px;
        padding: 4px 6px;
        white-space: nowrap;
    }

    .specialities-table {
        font-size: 12px;
    }

    .card-title {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .specialities-table th,
    .specialities-table td {
        font-size: 10px;
        padding: 2px 4px;
    }

    .card-title {
        font-size: 14px;
    }
}
</style>
@endsection
