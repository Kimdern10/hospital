@extends('layouts.admin')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add Hospital Contact</h4>
                    </div>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There are some problems with your input.<br>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contacts.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Second Address (optional)</label>
                            <input type="text" name="address_two" class="form-control" value="{{ old('address_two') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>

                        <!-- Make phone fields optional by removing required -->
                        <div class="mb-3">
                            <label class="form-label">Phone (optional)</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Second Phone (optional)</label>
                            <input type="text" name="phone_two" class="form-control" value="{{ old('phone_two') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Working Days</label>
                            <input type="text" name="working_days" class="form-control" value="{{ old('working_days') }}" required placeholder="e.g. Mon - Fri: 8AM - 5PM">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Weekend Days</label>
                            <input type="text" name="weekend_days" class="form-control" value="{{ old('weekend_days') }}" required placeholder="e.g. Sat - Sun: 9AM - 3PM">
                        </div>

                        <div class="d-flex justify-content-start gap-2 flex-wrap">
                            <button type="submit" class="btn btn-primary">Save Contact</button>
                            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back</a>
                        </div>
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
