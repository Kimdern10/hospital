@extends('layouts.admin')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">

            <!-- Back button on left -->
            <div class="mb-3">
                <a href="{{ route('about.index') }}" class="btn btn-secondary">← Back to About Us List</a>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Trashed About Us</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 trashed-about-table">
                            <thead>
                                <tr class="bg-white">
                                    <th class="bg-primary text-white">#</th>
                                    <th class="bg-primary text-white">Title</th>
                                    <th class="bg-primary text-white">Mission</th>
                                    <th class="bg-primary text-white">Vision</th>
                                    <th class="bg-primary text-white">Idea</th>
                                    <th class="bg-primary text-white">Opening Hours</th>
                                    <th class="bg-primary text-white">Deleted At</th>
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
                                    <td>{{ $about->deleted_at ? $about->deleted_at->format('j F, Y') : '-' }}</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <form action="{{ route('about.restore', $about->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">Restore</button>
                                            </form>
                                            <form action="{{ route('about.forceDelete', $about->id) }}" method="POST" style="display:inline-block;">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to permanently delete this record?')">Delete Permanently</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-danger">No trashed records found</td>
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
    .trashed-about-table th,
    .trashed-about-table td {
        font-size: 12px;   /* smaller font */
        padding: 4px 6px;  /* less padding */
        white-space: nowrap; /* stop wrapping */
    }

    .trashed-about-table {
        font-size: 12px;
    }

    .card-title {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .trashed-about-table th,
    .trashed-about-table td {
        font-size: 10px;
        padding: 2px 4px;
    }

    .card-title {
        font-size: 14px;
    }
}
</style>
@endsection
