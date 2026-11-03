@extends('admin.master')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="mb-1">Add Buyer</h2>
            <p class="text-muted mb-0">
                Create a new garment buyer
            </p>
        </div>

        <a href="{{ route('buyers.index') }}"
           class="btn btn-secondary">
            ← Buyer List
        </a>

    </div>


    <div class="card">

        <div class="card-header">
            <h5 class="mb-0">Buyer Information</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('buyers.store') }}"
                  method="POST">

                @csrf

                <div class="row g-3">

                    <div class="col-md-6">

                        <label class="form-label">
                            Buyer Name <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}"
                            required
                        >

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="col-md-6">

                        <label class="form-label">
                            Company Name
                        </label>

                        <input
                            type="text"
                            name="company_name"
                            class="form-control"
                            value="{{ old('company_name') }}"
                        >

                    </div>


                    <div class="col-md-6">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                        >

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="col-md-6">

                        <label class="form-label">
                            Phone
                        </label>

                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            value="{{ old('phone') }}"
                        >

                    </div>


                    <div class="col-md-6">

                        <label class="form-label">
                            Country
                        </label>

                        <input
                            type="text"
                            name="country"
                            class="form-control"
                            value="{{ old('country') }}"
                            placeholder="Bangladesh"
                        >

                    </div>


                    <div class="col-md-6">

                        <label class="form-label">
                            Status <span class="text-danger">*</span>
                        </label>

                        <select name="status" class="form-select">

                            <option value="Active"
                                {{ old('status', 'Active') == 'Active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="Inactive"
                                {{ old('status') == 'Inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>


                    <div class="col-12">

                        <label class="form-label">
                            Address
                        </label>

                        <textarea
                            name="address"
                            class="form-control"
                            rows="3"
                        >{{ old('address') }}</textarea>

                    </div>


                    <div class="col-12">

                        <label class="form-label">
                            Notes
                        </label>

                        <textarea
                            name="notes"
                            class="form-control"
                            rows="3"
                        >{{ old('notes') }}</textarea>

                    </div>


                    <div class="col-12">

                        <button type="submit"
                                class="btn btn-primary">
                            Save Buyer
                        </button>

                        <a href="{{ route('buyers.index') }}"
                           class="btn btn-secondary">
                            Cancel
                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection