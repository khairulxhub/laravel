@extends('admin.master')

@section('title', 'Garment Orders')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h1 class="h3 mb-1">Garment Orders</h1>
        <p class="text-muted mb-0">Manage all garment orders</p>
    </div>
<div class="d-flex align-items-center gap-2 mb-3">

    {{-- <a href="{{ route('orders.report') }}" class="btn btn-dark">
        <i data-feather="file-text"></i>
        Order Report
    </a> --}}

    <a href="{{ route('orders.create') }}" class="btn btn-primary">
        <i class="align-middle" data-feather="plus"></i>
        Add Order
    </a>

</div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>
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
                                <strong>
                                    {{ $order->order_number }}
                                </strong>
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
                            </td>

                            <td>

                                @if($order->status == 'Pending')

                                    <span class="badge bg-warning">
                                        Pending
                                    </span>

                                @elseif($order->status == 'In Progress')

                                    <span class="badge bg-primary">
                                        In Progress
                                    </span>

                                @elseif($order->status == 'Completed')

                                    <span class="badge bg-success">
                                        Completed
                                    </span>

                                @elseif($order->status == 'Cancelled')

                                    <span class="badge bg-danger">
                                        Cancelled
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        {{ $order->status }}
                                    </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route('orders.show', $order->id) }}"
                                   class="btn btn-sm btn-info"
                                   title="View">

                                    <i data-feather="eye"></i>

                                </a>

                                <a href="{{ route('orders.edit', $order->id) }}"
                                   class="btn btn-sm btn-warning"
                                   title="Edit">

                                    <i data-feather="edit-2"></i>

                                </a>

                                <form action="{{ route('orders.destroy', $order->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this order?');">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            title="Delete">

                                        <i data-feather="trash-2"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>
                        

                    @empty

                        <tr>

                            <td colspan="10" class="text-center py-5">

                                <div class="text-muted">
                                    No garment orders found.
                                </div>
                               
                                <a href="{{ route('orders.create') }}"
                                   class="btn btn-primary mt-3">

                                    Add First Order

                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        @if($orders->hasPages())

            <div class="mt-3">

                {{ $orders->links() }}

            </div>

        @endif

    </div>

</div>

@endsection