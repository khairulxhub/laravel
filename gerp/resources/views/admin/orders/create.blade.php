@extends('admin.master')

@section('title', 'Create Garment Order')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

    <div>
        <h1 class="h3 mb-1">Create Garment Order</h1>
        <p class="text-muted mb-0">
            Add a new garment order
        </p>
    </div>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary">

        <i data-feather="arrow-left"></i>

        Back to Orders

    </a>

</div>


@if($errors->any())

    <div class="alert alert-danger">

        <strong>Please fix the following errors:</strong>

        <ul class="mb-0 mt-2">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


<div class="card">

    <div class="card-header">

        <h5 class="card-title mb-0">
            Order Information
        </h5>

    </div>


    <div class="card-body">

        <form action="{{ route('orders.store') }}" method="POST">

            @csrf


            {{-- Order Basic Information --}}

            <h5 class="mb-3">
                Order Basic Information
            </h5>


            <div class="row">


                {{-- Order Number --}}

                <div class="col-md-6 mb-3">

                    <label for="order_number" class="form-label">
                        Order Number <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="order_number"
                           id="order_number"
                           class="form-control @error('order_number') is-invalid @enderror"
                           value="{{ old('order_number') }}"
                           placeholder="GERP-2026-0001"
                           required>

                    @error('order_number')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- PO Number --}}

                <div class="col-md-6 mb-3">

                    <label for="po_number" class="form-label">
                        PO Number
                    </label>

                    <input type="text"
                           name="po_number"
                           id="po_number"
                           class="form-control @error('po_number') is-invalid @enderror"
                           value="{{ old('po_number') }}"
                           placeholder="PO-ABC-2026-091">

                    @error('po_number')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Buyer Name --}}

                <div class="col-md-6 mb-3">

                    <label for="buyer_name" class="form-label">
                        Buyer Name <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="buyer_name"
                           id="buyer_name"
                           class="form-control @error('buyer_name') is-invalid @enderror"
                           value="{{ old('buyer_name') }}"
                           placeholder="ABC Fashion International"
                           required>

                    @error('buyer_name')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Order Type --}}

                <div class="col-md-6 mb-3">

                    <label for="order_type" class="form-label">
                        Order Type
                    </label>

                    <select name="order_type"
                            id="order_type"
                            class="form-select @error('order_type') is-invalid @enderror">

                        <option value="">Select Order Type</option>

                        <option value="FOB"
                            {{ old('order_type') == 'FOB' ? 'selected' : '' }}>
                            FOB
                        </option>

                        <option value="CM"
                            {{ old('order_type') == 'CM' ? 'selected' : '' }}>
                            CM
                        </option>

                        <option value="CMT"
                            {{ old('order_type') == 'CMT' ? 'selected' : '' }}>
                            CMT
                        </option>

                        <option value="Export"
                            {{ old('order_type') == 'Export' ? 'selected' : '' }}>
                            Export
                        </option>

                    </select>

                    @error('order_type')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Style Number --}}

                <div class="col-md-6 mb-3">

                    <label for="style_number" class="form-label">
                        Style Number
                    </label>

                    <input type="text"
                           name="style_number"
                           id="style_number"
                           class="form-control @error('style_number') is-invalid @enderror"
                           value="{{ old('style_number') }}"
                           placeholder="ST-POLO-2601">

                    @error('style_number')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Product Name --}}

                <div class="col-md-6 mb-3">

                    <label for="product_name" class="form-label">
                        Product Name <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="product_name"
                           id="product_name"
                           class="form-control @error('product_name') is-invalid @enderror"
                           value="{{ old('product_name') }}"
                           placeholder="Men's Premium Polo Shirt"
                           required>

                    @error('product_name')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

            </div>


            <hr class="my-4">


            {{-- Quantity & Price --}}

            <h5 class="mb-3">
                Quantity & Price
            </h5>


            <div class="row">


                {{-- Order Quantity --}}

                <div class="col-md-4 mb-3">

                    <label for="order_qty" class="form-label">
                        Order Quantity <span class="text-danger">*</span>
                    </label>

                    <input type="number"
                           name="order_qty"
                           id="order_qty"
                           class="form-control @error('order_qty') is-invalid @enderror"
                           value="{{ old('order_qty') }}"
                           min="1"
                           placeholder="50000"
                           required>

                    @error('order_qty')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Unit Price --}}

                <div class="col-md-4 mb-3">

                    <label for="unit_price" class="form-label">
                        Unit Price ($) <span class="text-danger">*</span>
                    </label>

                    <input type="number"
                           name="unit_price"
                           id="unit_price"
                           class="form-control @error('unit_price') is-invalid @enderror"
                           value="{{ old('unit_price') }}"
                           min="0"
                           step="0.01"
                           placeholder="6.25"
                           required>

                    @error('unit_price')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Total Value --}}

                <div class="col-md-4 mb-3">

                    <label for="total_value" class="form-label">
                        Total Value ($)
                    </label>

                    <input type="number"
                           name="total_value"
                           id="total_value"
                           class="form-control"
                           value="{{ old('total_value') }}"
                           step="0.01"
                           readonly>

                    <small class="text-muted">
                        Automatically calculated
                    </small>

                </div>

            </div>


            <hr class="my-4">


            {{-- Dates & Status --}}

            <h5 class="mb-3">
                Order Schedule
            </h5>


            <div class="row">


                {{-- Order Date --}}

                <div class="col-md-4 mb-3">

                    <label for="order_date" class="form-label">
                        Order Date <span class="text-danger">*</span>
                    </label>

                    <input type="date"
                           name="order_date"
                           id="order_date"
                           class="form-control @error('order_date') is-invalid @enderror"
                           value="{{ old('order_date', date('Y-m-d')) }}"
                           required>

                    @error('order_date')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Ex Factory Date --}}

                <div class="col-md-4 mb-3">

                    <label for="ex_factory_date" class="form-label">
                        Ex-Factory Date
                    </label>

                    <input type="date"
                           name="ex_factory_date"
                           id="ex_factory_date"
                           class="form-control @error('ex_factory_date') is-invalid @enderror"
                           value="{{ old('ex_factory_date') }}">

                    @error('ex_factory_date')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Status --}}

                <div class="col-md-4 mb-3">

                    <label for="status" class="form-label">
                        Status <span class="text-danger">*</span>
                    </label>

                    <select name="status"
                            id="status"
                            class="form-select @error('status') is-invalid @enderror"
                            required>

                        <option value="Pending"
                            {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="In Progress"
                            {{ old('status') == 'In Progress' ? 'selected' : '' }}>
                            In Progress
                        </option>

                        <option value="Completed"
                            {{ old('status') == 'Completed' ? 'selected' : '' }}>
                            Completed
                        </option>

                        <option value="Cancelled"
                            {{ old('status') == 'Cancelled' ? 'selected' : '' }}>
                            Cancelled
                        </option>

                    </select>

                    @error('status')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

            </div>


            {{-- Notes --}}

            <div class="mb-3">

                <label for="notes" class="form-label">
                    Notes
                </label>

                <textarea name="notes"
                          id="notes"
                          rows="4"
                          class="form-control @error('notes') is-invalid @enderror"
                          placeholder="Enter any additional order notes...">{{ old('notes') }}</textarea>

                @error('notes')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- Buttons --}}

            <div class="d-flex justify-content-end gap-2 mt-4">

                <a href="{{ route('orders.index') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

                <button type="submit"
                        class="btn btn-primary">

                    <i data-feather="save"></i>

                    Save Order

                </button>

            </div>


        </form>

    </div>

</div>

@endsection


@section('script')

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const orderQty = document.getElementById('order_qty');
        const unitPrice = document.getElementById('unit_price');
        const totalValue = document.getElementById('total_value');

        function calculateTotal() {

            const qty = parseFloat(orderQty.value) || 0;
            const price = parseFloat(unitPrice.value) || 0;

            const total = qty * price;

            totalValue.value = total.toFixed(2);

        }

        orderQty.addEventListener('input', calculateTotal);

        unitPrice.addEventListener('input', calculateTotal);

        calculateTotal();

    });

</script>

@endsection