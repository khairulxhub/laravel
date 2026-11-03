@extends('admin.master')

@section('title', 'Garment Orders')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h1 class="h3 mb-1">Garment Orders</h1>
        <p class="text-muted mb-0">Manage all garment orders</p>
    </div>

    <a href="{{ route('orders.create') }}" class="btn btn-primary">
        <i class="align-middle" data-feather="plus"></i>
        Add Order
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Order List</h5>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover table-bordered align-middle">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order No</th>
                        <th>PO No</th>
                        <th>Buyer</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Total Value</th>
                        <th>Status</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($orders as $order)

                        <tr>
                            <td>
                                {{ $loop->iteration + ($orders->currentPage() - 1) * $orders->perPage() }}
                            </td>

                            <td>
                                <strong>{{ $order->order_number }}</strong>
                            </td>

                            <td>
                                {{ $order->po_number ?? '-' }}
                            </td>

                            <td>
                                {{ $order->buyer_name }}
                            </td>

                            <td>
                                {{ $order->product_name }}
                            </td>

                            <td>
                                {{ number_format($order->order_qty) }}
                            </td>

                            <td>
                                ${{ number_format($order->unit_price, 2) }}
                            </td>

                            <td>
                                <strong>
                                    ${{ number_format($order->total_value, 2) }}
                                </strong>