@extends('layouts.admin')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">

            <!-- Link back to main contacts list -->
            <div class="mb-3">
                <a href="{{ route('contacts.index') }}" class="btn btn-secondary">← Back to Contacts</a>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Trashed Contacts</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 trashed-contacts-table">
                            <thead>
                                <tr class="bg-white">
                                    <th class="bg-primary text-white">#</th>
                                    <th class="bg-primary text-white">Address 1</th>
                                    <th class="bg-primary text-white">Address 2</th>
                                    <th class="bg-primary text-white">Email</th>
                                    <th class="bg-primary text-white">Phone 1</th>
                                    <th class="bg-primary text-white">Phone 2</th>
                                    <th class="bg-primary text-white">Deleted At</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($contacts as $contact)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $contact->address }}</td>
                                    <td>{{ $contact->address_two ?? '-' }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->phone_two ?? '-' }}</td>
                                    <td>{{ $contact->deleted_at->format('j F, Y') }}</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center">
                                            <form action="{{ route('contacts.restore', $contact->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">Restore</button>
                                            </form>
                                            <form action="{{ route('contacts.forceDelete', $contact->id) }}" method="POST"
                                                  onsubmit="return confirm('Are you sure you want to permanently delete this contact?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete Permanently</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-danger">No trashed contacts found</td>
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
    .trashed-contacts-table th,
    .trashed-contacts-table td {
        font-size: 12px;
        padding: 4px 6px;
        white-space: nowrap;
    }

    .trashed-contacts-table {
        font-size: 12px;
    }

    .card-title {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .trashed-contacts-table th,
    .trashed-contacts-table td {
        font-size: 10px;
        padding: 2px 4px;
    }

    .card-title {
        font-size: 14px;
    }
}
</style>
@endsection
