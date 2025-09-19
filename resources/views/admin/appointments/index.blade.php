@extends('layouts.admin')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Appointments List</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 appointments-table">
                            <thead>
                                <tr class="bg-white">
                                    <th class="bg-primary text-white">#</th>
                                    <th class="bg-primary text-white">Name</th>
                                    <th class="bg-primary text-white">Mobile</th>
                                    <th class="bg-primary text-white">Date</th>
                                    <th class="bg-primary text-white">Doctor</th>
                                    <th class="bg-primary text-white">Department</th>
                                    <th class="bg-primary text-white">Submitted At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($appointments as $appointment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $appointment->name }}</td>
                                        <td>{{ $appointment->mobile }}</td>
                                        <td>{{ $appointment->date ? $appointment->date->format('d M Y') : 'N/A' }}</td>
                                        <td>{{ $appointment->doctor->name ?? 'N/A' }}</td>
                                        <td>{{ $appointment->department->name ?? 'N/A' }}</td>
                                        <td>{{ $appointment->created_at ? $appointment->created_at->format('d M Y, h:i A') : '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-danger">No appointments found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-3 d-flex justify-content-center">
                            {{ $appointments->links() }}
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
    .appointments-table th,
    .appointments-table td {
        font-size: 12px;   /* smaller font */
        padding: 4px 6px;  /* less padding */
        white-space: nowrap; /* avoid text wrapping */
    }

    .appointments-table {
        font-size: 12px;
    }

    .card-title {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .appointments-table th,
    .appointments-table td {
        font-size: 10px;
        padding: 2px 4px;
    }

    .card-title {
        font-size: 14px;
    }
}
</style>
@endsection
