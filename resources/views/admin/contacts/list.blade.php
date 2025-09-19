@extends('layouts.admin')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">

            <!-- Link to trashed contacts + Add button -->
            <div class="mb-3">
                <a href="{{ route('contacts.trash') }}" class="btn btn-primary">View Trashed</a>
                <a href="{{ route('contacts.create') }}" class="btn btn-primary">+ Add Contact</a>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Hospital Contacts List</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 contacts-table">
                            <thead>
                                <tr class="bg-white">
                                    <th class="bg-primary text-white">#</th>
                                    <th class="bg-primary text-white">Address 1</th>
                                    <th class="bg-primary text-white">Address 2</th>
                                    <th class="bg-primary text-white">Email</th>
                                    <th class="bg-primary text-white">Phone 1</th>
                                    <th class="bg-primary text-white">Phone 2</th>
                                    <th class="bg-primary text-white">Status</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($contacts as $contact)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $contact->address }}</td>
                                    <td>{{ $contact->address_two  }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->phone_two  }}</td>
                                    <td>
                                        @if($contact->deleted_at)
                                            <span class="badge bg-danger">Deleted</span>
                                        @else
                                            <span class="badge bg-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            @if(!$contact->deleted_at)
                                                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Move this contact to trash?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger-subtle btn-sm">
                                                        <i class="ph ph-trash"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('contacts.restore', $contact->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">Restore</button>
                                                </form>
                                                <form action="{{ route('contacts.forceDelete', $contact->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-dark" onclick="return confirm('Permanently delete this contact?')">Delete Permanently</button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-danger">No contacts found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-3 d-flex justify-content-center">
                            {{ $contacts->links() }}
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
    .contacts-table th,
    .contacts-table td {
        font-size: 12px;
        padding: 4px 6px;
        white-space: nowrap;
    }

    .contacts-table {
        font-size: 12px;
    }

    .card-title {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .contacts-table th,
    .contacts-table td {
        font-size: 10px;
        padding: 2px 4px;
    }

    .card-title {
        font-size: 14px;
    }
}
</style>
@endsection
