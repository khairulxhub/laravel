@extends('admin.master')

@section('title', 'Edit Garment Order')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

    <div>
        <h1 class="h3 mb-1">Edit Garment Order</h1>
        <p class="text-muted mb-0">
            Update order information
        </p>
    </div>

    <div>

        <a href="{{ route('orders.show', $order->id) }}"
           class="btn btn-info">

            <i data-feather="eye"></i>

            View

        </a>

        <a href="{{ route('orders.index') }}"
           class="btn btn-secondary">

            <i data-feather="arrow-left"></i>

            Back

        </a>

    </div>

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
            Edit Order Information
        </h5>

    </div>


    <div class="card-body">

        <form action="{{ route('orders.update', $order->id) }}"
              method="POST">

            @csrf

            @method('PUT')


            {{-- Order Information --}}

            <h5 class="mb-3">
                Order Information
            </h5>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label for="order_number" class="form-label">
                        Order Number <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="order_number"
                           id="order_number"
                           class="form-control"
                           value="{{ old('order_number', $order->order_number) }}"
                           required>

                </div>


                <div class="col-md-6 mb-3">

                    <label for="po_number" class="form-label">
                        PO Number
                    </label>

                    <input type="text"
                           name="po_number"
                           id="po_number"
                           class="form-control"
                           value="{{ old('po_number', $order->po_number) }}">

                </div>


                <div class="col-md-6 mb-3">

                    <label for="buyer_name" class="form-label">
                        Buyer Name <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="buyer_name"
                           id="buyer_name"
                           class="form-control"
                           value="{{ old('buyer_name', $order->buyer_name) }}"
                           required>

                </div>


                <div class="col-md-6 mb-3">

                    <label for="style_number" class="form-label">
                        Style Number
                    </label>

                    <input type="text"
                           name="style_number"
                           id="style_number"
                           class="form-control"
                           value="{{ old('style_number', $order->style_number) }}">

                </div>


                <div class="col-md-6 mb-3">

                    <label for="product_name" class="form-label">
                        Product Name <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="product_name"
                           id="product_name"
                           class="form-control"
                           value="{{ old('product_name', $order->product_name) }}"
                           required>

                </div>


                <div class="col-md-6 mb-3">

                    <label for="order_type" class="form-label">
                        Order Type
                    </label>

                    <select name="order_type"
                            id="order_type"
                            class="form-select">

                        <option value="">Select Order Type</option>

                        <option value="FOB"
                            {{ old('order_type', $order->order_type) == 'FOB' ? 'selected' : '' }}>
                            FOB
                        </option>

                        <option value="CM"
                            {{ old('order_type', $order->order_type) == 'CM' ? 'selected' : '' }}>
                            CM
                        </option>

                        <option value="CMT"
                            {{ old('order_type', $order->order_type) == 'CMT' ? 'selected' : '' }}>
                            CMT
                        </option>

                        <option value="Export"
                            {{ old('order_type', $order->order_type) == 'Export' ? 'selected' : '' }}>
                            Export
                        </option>

                    </select>

                </div>

            </div>


            <hr class="my-4">


            {{-- Quantity & Price --}}

            <h5 class="mb-3">
                Quantity & Price
            </h5>

            <div class="row">

                <div class="col-md-4 mb-3">

                    <label for="order_qty" class="form-label">
                        Order Quantity <span class="text-danger">*</span>
                    </label>

                    <input type="number"
                           name="order_qty"
                           id="order_qty"
                           class="form-control"
                           value="{{ old('order_qty', $order->order_qty) }}"
                           min="1"
                           required>

                </div>


                <div class="col-md-4 mb-3">

                    <label for="unit_price" class="form-label">
                        Unit Price ($) <span class="text-danger">*</span>
                    </label>

                    <input type="number"
                           name="unit_price"
                           id="unit_price"
                           class="form-control"
                           value="{{ old('unit_price', $order->unit_price) }}"
                           min="0"
                           step="0.01"
                           required>

                </div>


                <div class="col-md-4 mb-3">

                    <label for="total_value" class="form-label">
                        Total Value ($)
                    </label>

                    <input type="number"
                           name="total_value"
                           id="total_value"
                           class="form-control"
                           value="{{ old('total_value', $order->total_value) }}"
                           step="0.01"
                           readonly>

                    <small class="text-muted">
                        Automatically calculated
                    </small>

                </div>

            </div>


            <hr class="my-4">


            {{-- Schedule --}}

            <h5 class="mb-3">
                Order Schedule
            </h5>

            <div class="row">

                <div class="col-md-4 mb-3">

                    <label for="order_date" class="form-label">
                        Order Date <span class="text-danger">*</span>
                    </label>

                    <input type="date"
                           name="order_date"
                           id="order_date"
                           class="form-control"
                           value="{{ old('order_date', $order->order_date?->format('Y-m-d')) }}"
                           required>

                </div>


                <div class="col-md-4 mb-3">

                    <label for="ex_factory_date" class="form-label">
                        Ex-Factory Date
                    </label>

                    <input type="date"
                           name="ex_factory_date"
                           id="ex_factory_date"
                           class="form-control"
                           value="{{ old('ex_factory_date', $order->ex_factory_date?->format('Y-m-d')) }}">

                </div>


                <div class="col-md-4 mb-3">

                    <label for="status" class="form-label">
                        Status <span class="text-danger">*</span>
                    </label>

                    <select name="status"
                            id="status"
                            class="form-select"
                            required>

                        <option value="Pending"
                            {{ old('status', $order->status) == 'Pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="In Progress"
                            {{ old('status', $order->status) == 'In Progress' ? 'selected' : '' }}>
                            In Progress
                        </option>

                        <option value="Completed"
                            {{ old('status', $order->status) == 'Completed' ? 'selected' : '' }}>
                            Completed
                        </option>

                        <option value="Cancelled"
                            {{ old('status', $order->status) == 'Cancelled' ? 'selected' : '' }}>
                            Cancelled
                        </option>

                    </select>

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
                          class="form-control">{{ old('notes', $order->notes) }}</textarea>

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

                    Update Order

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

        totalValue.value = (qty * price).toFixed(2);

    }

    orderQty.addEventListener('input', calculateTotal);
    unitPrice.addEventListener('input', calculateTotal);

    calculateTotal();

});

</script>

@endsection