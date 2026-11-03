@extends('admin.master')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="mb-1">Buyer Details</h2>
            <p class="text-muted mb-0">
                View buyer information
            </p>
        </div>

        <div>

            <a href="{{ route('buyers.edit', $buyer->id) }}"
               class="btn btn-warning">
                Edit Buyer
            </a>

            <a href="{{ route('buyers.index') }}"
               class="btn btn-secondary">
                ← Buyer List
            </a>

        </div>

    </div>


    <div class="row">

        <div class="col-lg-8">

            <div class="card">

                <div class="card-header">
                    <h5 class="mb-0">
                        {{ $buyer->name }}
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row mb-3">

                        <div class="col-md-6">
                            <strong>Buyer Name</strong>
                            <p>{{ $buyer->name }}</p>
                        </div>

                        <div class="col-md-6">
                            <strong>Company Name</strong>
                            <p>{{ $buyer->company_name ?? '-' }}</p>
                        </div>

                    </div>


                    <div class="row mb-3">

                        <div class="col-md-6">
                            <strong>Email</strong>
                            <p>{{ $buyer->email ?? '-' }}</p>
                        </div>

                        <div class="col-md-6">
                            <strong>Phone</strong>
                            <p>{{ $buyer->phone ?? '-' }}</p>
                        </div>

                    </div>


                    <div class="row mb-3">

                        <div class="col-md-6">
                            <strong>Country</strong>
                            <p>{{ $buyer->country ?? '-' }}</p>
                        </div>

                        <div class="col-md-6">

                            <strong>Status</strong>

                            <p>

                                @if($buyer->status === 'Active')

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        Inactive
                                    </span>

                                @endif

                            </p>

                        </div>

                    </div>


                    <div class="mb-3">

                        <strong>Address</strong>

                        <p>
                            {{ $buyer->address ?? '-' }}
                        </p>

                    </div>


                    <div class="mb-3">

                        <strong>Notes</strong>

                        <p>
                            {{ $buyer->notes ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-lg-4">

            <div class="card">

                <div class="card-header">
                    <h5 class="mb-0">Order Summary</h5>
                </div>

                <div class="card-body">

                    <h3>
                        {{ $buyer->orders->count() }}
                    </h3>

                    <p class="text-muted mb-0">
                        Total Orders
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection