@extends('layouts.admin')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit Department</h4>
                    </div>
                </div>

                <div class="card-body">
                    {{-- Validation Errors --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Edit Form --}}
                    <form action="{{ route('departments.update', $department->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Department Name</label>
                            <input 
                                type="text" 
                                name="name" 
                                class="form-control" 
                                value="{{ old('name', $department->name) }}" 
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea 
                                name="description" 
                                class="form-control" 
                                rows="4" 
                                placeholder="Enter department description">{{ old('description', $department->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Department Image</label>
                            <input type="file" name="image" class="form-control">

                            @if($department->image)
                                <div class="mt-2">
                                    <p>Current Image:</p>
                                    <img src="{{ asset('storage/' . $department->image) }}" alt="Department Image" width="150" class="rounded shadow">
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Update Department</button>
                        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@push('styles')
<style>
    /* Mobile adjustments for form */
    @media (max-width: 767px) {
        .card {
            padding: 10px !important;
        }

        .card-header .card-title {
            font-size: 18px !important;
        }

        .form-label {
            font-size: 14px !important;
        }

        .form-control {
            padding: 8px 10px !important;
            font-size: 14px !important;
        }

        .btn {
            font-size: 14px !important;
            padding: 8px 12px !important;
        }

        .d-flex.gap-2 {
            flex-direction: column !important;
            gap: 10px !important;
        }

        .alert {
            font-size: 14px !important;
            padding: 10px !important;
        }
    }
</style>
@endpush
@endsection

