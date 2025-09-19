@extends('layouts.admin')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">

            <!-- Link to trashed + Add button -->
            <div class="mb-3">
                <a href="{{ route('about.trashed') }}" class="btn btn-primary">View Trashed</a>
                <a href="{{ route('about.create') }}" class="btn btn-primary">+ Add About Us</a>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">About Us List</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 about-table">
                            <thead>
                                <tr class="bg-white">
                                    <th class="bg-primary text-white">#</th>
                                    <th class="bg-primary text-white">Title</th>
                                    <th class="bg-primary text-white">Mission</th>
                                    <th class="bg-primary text-white">Vision</th>
                                    <th class="bg-primary text-white">Idea</th>
                                    <th class="bg-primary text-white">Opening Hours</th>
                                    <th class="bg-primary text-white">Status</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($aboutUs as $about)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $about->title }}</td>
                                    <td>{{ Str::limit($about->mission, 50) }}</td>
                                    <td>{{ Str::limit($about->vision, 50) }}</td>
                                    <td>{{ Str::limit($about->idea, 50) }}</td>
                                    <td>
                                        @if(!empty($about->opening_hours) && is_array($about->opening_hours))
                                            @foreach($about->opening_hours as $day => $time)
                                                <div><strong>{{ ucfirst($day) }}:</strong> {{ $time }}</div>
                                            @endforeach
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if($about->deleted_at)
                                            <span class="badge bg-danger">Trashed</span>
                                        @else
                                            <span class="badge bg-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            @if(!$about->deleted_at)
                                                <a href="{{ route('about.edit', $about->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                                <form action="{{ route('about.destroy', $about->id) }}" method="POST" onsubmit="return confirm('Move to trash?');">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-danger-subtle btn-sm">
                                                        <i class="ph ph-trash"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('about.restore', $about->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">Restore</button>
                                                </form>
                                                <form action="{{ route('about.forceDelete', $about->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-dark" onclick="return confirm('Permanently delete this record?')">Delete Permanently</button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-danger">No records found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-3 d-flex justify-content-center">
                            {{ $aboutUs->links() }}
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
    .about-table th,
    .about-table td {
        font-size: 12px;   /* smaller font */
        padding: 4px 6px;  /* less padding */
        white-space: nowrap; /* stop wrapping */
    }

    .about-table {
        font-size: 12px;
    }

    .card-title {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .about-table th,
    .about-table td {
        font-size: 10px;
        padding: 2px 4px;
    }

    .card-title {
        font-size: 14px;
    }
}
</style>
@endsection
