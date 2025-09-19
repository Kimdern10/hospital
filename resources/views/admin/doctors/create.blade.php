@extends('layouts.admin')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add Doctor</h4>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-control" required>
                        </div>

                        <!-- Department Dropdown -->
                        <div class="mb-3">
                            <label class="form-label">Department</label>
                            <select name="department_id" class="form-control" required>
                                <option value="">-- Select Department --</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Specialities Multi Select -->
                        <div class="mb-3">
                            <label class="form-label">Specialities (Choose at least 3)</label>
                            <select name="specialities[]" class="form-control" multiple required>
                                @foreach($specialities as $speciality)
                                    <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Hold CTRL (Windows) or CMD (Mac) to select multiple.</small>
                        </div>

                        <!-- Structured Working Hours -->
                        <div class="mb-3">
                            <label class="form-label">Working Hours</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="working_hours[Saturday]" class="form-control mb-2" placeholder="Saturday 10:00 AM - 05:00 PM" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="working_hours[Sunday]" class="form-control mb-2" placeholder="Sunday 10:00 AM - 02:00 PM" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="working_hours[Monday-Friday]" class="form-control mb-2" placeholder="Monday - Friday 10:00 AM - 07:00 PM" required>
                                </div>
                            </div>
                        </div>

                        <!-- Biography -->
                        <div class="mb-3">
                            <label class="form-label">Biography</label>
                            <textarea name="bio" class="form-control" rows="5" placeholder="Write a brief biography of the doctor"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="d-flex gap-2 flex-wrap">
                            <button type="submit" class="btn btn-primary">Save Doctor</button>
                            <a href="{{ route('index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Optional JS validation for specialities -->
<script>
document.querySelector("form").addEventListener("submit", function(e) {
    let specialitySelect = document.querySelector("select[name='specialities[]']");
    if ([...specialitySelect.selectedOptions].length < 3) {
        e.preventDefault();
        alert("Please select at least 3 specialities before saving the doctor.");
    }
});
</script>

@push('styles')
<style>
    /* Mobile adjustments for form and text */
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

        select.form-control[multiple] {
            min-height: 100px !important;
        }

        .btn {
            font-size: 14px !important;
            padding: 8px 12px !important;
        }

        .d-flex.gap-2 {
            flex-direction: column !important;
            gap: 10px !important;
        }

        .row .col-md-4 {
            width: 100% !important;
            margin-bottom: 10px;
        }
    }
</style>
@endpush

@endsection
