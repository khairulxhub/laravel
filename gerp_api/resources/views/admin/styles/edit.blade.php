@extends('admin.master')

@section('content')

<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="mb-1">Edit Style</h4>
            <p class="text-muted mb-0">
                Update style information
            </p>
        </div>

        <a href="{{ route('styles.index') }}"
           class="btn btn-light border">
            <i class="bi bi-arrow-left me-1"></i>
            Back to Styles
        </a>

    </div>


    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix the following errors:</strong>

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">
            <h5 class="mb-0">
                <i class="bi bi-pencil-square me-2"></i>
                Style Information
            </h5>
        </div>


        <div class="card-body">

            <form action="{{ route('styles.update', $style->id) }}"
                  method="POST">

                @csrf
                @method('PUT')


                <div class="row g-3">

                    {{-- Style Name --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Style Name
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="style_name"
                            class="form-control @error('style_name') is-invalid @enderror"
                            value="{{ old('style_name', $style->style_name) }}"
                            placeholder="Enter style name"
                            required
                        >

                        @error('style_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Style No --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Style No
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="style_no"
                            class="form-control @error('style_no') is-invalid @enderror"
                            value="{{ old('style_no', $style->style_no) }}"
                            placeholder="Example: ST-001"
                            required
                        >

                        @error('style_no')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Buyer --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Buyer
                        </label>

                        <select
                            name="buyer_id"
                            class="form-select @error('buyer_id') is-invalid @enderror"
                        >

                            <option value="">
                                Select Buyer
                            </option>

                            @foreach ($buyers as $buyer)

                                <option
                                    value="{{ $buyer->id }}"
                                    {{ old('buyer_id', $style->buyer_id) == $buyer->id ? 'selected' : '' }}
                                >
                                    {{ $buyer->name }}

                                    @if($buyer->company_name)
                                        - {{ $buyer->company_name }}
                                    @endif
                                </option>

                            @endforeach

                        </select>

                        @error('buyer_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Season --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Season
                        </label>

                        <input
                            type="text"
                            name="season"
                            class="form-control @error('season') is-invalid @enderror"
                            value="{{ old('season', $style->season) }}"
                            placeholder="Example: Spring 2026"
                        >

                        @error('season')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Status --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Status
                            <span class="text-danger">*</span>
                        </label>

                        <select
                            name="status"
                            class="form-select @error('status') is-invalid @enderror"
                            required
                        >

                            <option value="active"
                                {{ old('status', $style->status) === 'active' ? 'selected' : '' }}>
                                Active
                            </option

