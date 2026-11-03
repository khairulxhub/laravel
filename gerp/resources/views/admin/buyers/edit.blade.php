@extends('admin.master')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="mb-1">Edit Buyer</h2>
            <p class="text-muted mb-0">
                Update buyer information
            </p>
        </div>

        <a href="{{ route('buyers.index') }}"
           class="btn btn-secondary">
            ← Buyer List
        </a>

    </div>


    <div class="card">

        <div class="card-header">
            <h5 class="mb-0">
                Edit: {{ $buyer->name }}
            </h5>
        </div>

        <div class="card-body">

            <form action="{{ route('buyers.update', $buyer->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="row g-3">

                    <div class="col-md-6">

                        <label class="form-label">
                            Buyer Name <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $buyer->name) }}"
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
                            value="{{ old('company_name', $buyer->company_name) }}"
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
                            value="{{ old('email', $buyer->email) }}"
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
                            value="{{ old('phone', $buyer->phone) }}"
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
                            value="{{ old('country', $buyer->country) }}"
                        >

                    </div>


                    <div class="col-md-6">

                        <label class="form-label">
                            Status <span class="text-danger">*</span>
                        </label>

                        <select name="status" class="form-select">

                            <option value="Active"
                                {{ old('status', $buyer->status) == 'Active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="Inactive"
                                {{ old('status', $buyer->status) == 'Inactive' ? 'selected' : '' }}>
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
                        >{{ old('address', $buyer->address) }}</textarea>

                    </div>


                    <div class="col-12">

                        <label class="form-label">
                            Notes
                        </label>

                        <textarea
                            name="notes"
                            class="form-control"
                            rows="3"
                        >{{ old('notes', $buyer->notes) }}</textarea>

                    </div>


                    <div class="col-12">

                        <button type="submit"
                                class="btn btn-primary">
                            Update Buyer
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