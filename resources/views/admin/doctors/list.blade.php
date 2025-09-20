@extends('layouts.admin')
@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">

            <!-- Link to trashed doctors + Add button -->
              <div class="mb-3">
                <a href="{{ route('trashed') }}" class="btn btn-primary">View Trashed</a>
                <a href="{{ route('create') }}" class="btn btn-primary">+ Add Doctor</a>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Doctors List</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 doctors-table ">
                            <thead>
                                <tr class="bg-white">
                                    <th class="bg-primary text-white">#</th>
                                    <th class="bg-primary text-white">Image</th>
                                    <th class="bg-primary text-white">Name</th>
                                    <th class="bg-primary text-white">Phone</th>
                                    <th class="bg-primary text-white">Email</th>
                                    <th class="bg-primary text-white">Department</th>
                                    <th class="bg-primary text-white">Specialities</th>
                                    <th class="bg-primary text-white">Working Hours</th>
                                    <th class="bg-primary text-white">Status</th>
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
                                    <td>
                                        @foreach($doctor->specialities as $speciality)
                                            <span class="badge bg-info">{{ $speciality->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @php $hours = json_decode($doctor->working_hours, true) ?? []; @endphp
                                        @if(!empty($hours))
                                            @foreach($hours as $day => $time)
                                                <div><strong>{{ $day }}:</strong> {{ $time }}</div>
                                            @endforeach
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if($doctor->deleted_at)
                                            <span class="badge bg-danger">Trashed</span>
                                        @else
                                            <span class="badge bg-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            @if(!$doctor->deleted_at)
                                                <a href="{{ route('edit', $doctor->id) }}" class="btn btn-warning btn-sm">
                                                    Edit
                                                </a>

                                                <form action="{{ route('destroy', $doctor->id) }}" method="POST" 
                                                    onsubmit="return confirm('Move this doctor to trash?');">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-danger-subtle btn-sm">
                                                        <i class="ph ph-trash"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('restore', $doctor->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">Restore</button>
                                                </form>
                                                <form action="{{ route('forceDelete', $doctor->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-dark" onclick="return confirm('Permanently delete this doctor?')">Delete Permanently</button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center text-danger">No doctors found</td>
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
<style>
@media (max-width: 768px) {
    .doctors-table th,
    .doctors-table td {
        font-size: 12px;
        padding: 4px 6px;
        white-space: nowrap;
    }

    .doctors-table {
        font-size: 12px;
    }

    .card-title {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .doctors-table th,
    .doctors-table td {
        font-size: 10px;
        padding: 2px 4px;
    }

    .card-title {
        font-size: 14px;
    }
}
</style>
@endsection
