@extends('layouts.admin')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add Department</h4>
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

                    {{-- Create Form --}}
                    <form action="{{ route('departments.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Department Name</label>
                            <input 
                                type="text" 
                                name="name" 
                                class="form-control" 
                                placeholder="Enter department name" 
                                value="{{ old('name') }}" 
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea 
                                name="description" 
                                class="form-control" 
                                rows="4" 
                                placeholder="Enter department description">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Department Image</label>
                            <input type="file" name="image" class="form-control">
                            <small class="text-muted">Accepted formats: jpg, jpeg, png, webp | Max: 2MB</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Department</button>
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
