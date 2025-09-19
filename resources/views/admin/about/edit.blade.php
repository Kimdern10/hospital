
@extends('layouts.admin')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">{{ isset($about) ? 'Edit About Us' : 'Add About Us' }}</h4>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                   <form action="{{ isset($about) ? route('about.update', $about->id) : route('about.store') }}" method="POST">
                        @csrf
                        @if(isset($about)) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $about->title ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea name="content" class="form-control" rows="4">{{ old('content', $about->content ?? '') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mission</label>
                            <textarea name="mission" class="form-control" rows="3">{{ old('mission', $about->mission ?? '') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Vision</label>
                            <textarea name="vision" class="form-control" rows="3">{{ old('vision', $about->vision ?? '') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Idea</label>
                            <textarea name="idea" class="form-control" rows="3">{{ old('idea', $about->idea ?? '') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Opening Hours</label>
                            <div class="row">
                                @php
                                    $defaultHours = [
                                        'monday' => '9:00 - 20:00',
                                        'tuesday' => '9:00 - 20:00',
                                        'wednesday' => '9:00 - 20:00',
                                        'thursday' => '9:00 - 20:00',
                                        'friday' => '9:00 - 20:00',
                                        'saturday' => '10:00 - 18:00',
                                        'sunday' => '10:00 - 18:00',
                                    ];
                                    $hours = old('opening_hours', $about->opening_hours ?? $defaultHours);
                                @endphp

                                @foreach($hours as $day => $time)
                                <div class="col-md-4 mb-2">
                                    <input type="text" name="opening_hours[{{ $day }}]" class="form-control" value="{{ $time }}" placeholder="{{ ucfirst($day) }} hours">
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">{{ isset($about) ? 'Update' : 'Save' }}</button>
                            <a href="{{ route('about.index') }}" class="btn btn-secondary">Back</a>
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


