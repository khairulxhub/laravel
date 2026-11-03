@extends('admin.master')

@section('content')

<div class="container-fluid">


{{-- Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="mb-1 fw-bold">Add Style</h2>
        <p class="text-muted mb-0">
            Create a new garment style
        </p>
    </div>

    <a href="{{ route('styles.index') }}"
       class="btn btn-light border">
        <i class="bi bi-arrow-left"></i>
        Back to Styles
    </a>

</div>


{{-- Form Card --}}
<div class="card shadow-sm border-0">

    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold">
            Style Information
        </h5>
    </div>

    <div class="card-body">

        <form action="{{ route('styles.store') }}"
              method="POST">

            @csrf

            <div class="row g-3">

                {{-- Style Name --}}
                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        Style Name
                        <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="style_name"
                        class="form-control @error('style_name') is-invalid @enderror"
                        value="{{ old('style_name') }}"
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

                    <label class="form-label fw-semibold">
                        Style No
                        <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="style_no"
                        class="form-control @error('style_no') is-invalid @enderror"
                        value="{{ old('style_no') }}"
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

                    <label class="form-label fw-semibold">
                        Buyer
                    </label>

                    <select
                        name="buyer_id"
                        class="form-select @error('buyer_id') is-invalid @enderror"
                    >

                        <option value="">
                            Select Buyer
                        </option>

                        @foreach($buyers as $buyer)

                            <option
                                value="{{ $buyer->id }}"
                                {{ old('buyer_id') == $buyer->id ? 'selected' : '' }}
                            >
                                {{ $buyer->name }}
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
                <div class="col-md-3">

                    <label class="form-label fw-semibold">
                        Season
                    </label>

                    <input
                        type="text"
                        name="season"
                        class="form-control"
                        value="{{ old('season') }}"
                        placeholder="Example: 2026"
                    >

                </div>


                {{-- Status --}}
                <div class="col-md-3">

                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <select name="status" class="form-select">

                        <option value="active"
                            {{ old('status', 'active') == 'active' ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="inactive"
                            {{ old('status') == 'inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                </div>

            </div>


            {{-- Buttons --}}
            <div class="d-flex justify-content-end gap-2 mt-4">

                <a href="{{ route('styles.index') }}"
                   class="btn btn-light border">
                    Cancel
                </a>

                <button type="submit"
                        class="btn btn-primary">
                    <i class="bi bi-check-lg"></i>
                    Save Style
                </button>

            </div>

        </form>

    </div>

</div>


</div>

@endsection
