@extends('admin.master')

@section('title', 'Order Details')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

    <div>
        <h1 class="h3 mb-1">Order Details</h1>
        <p class="text-muted mb-0">
            View garment order information
        </p>
    </div>

    <div>
        <button type="button"
        class="btn btn-danger"
        data-bs-toggle="modal"
        data-bs-target="#pdfPreviewModal">

    <i data-feather="file-text"></i>

    PDF Preview

</button>

        <a href="{{ route('orders.edit', $order->id) }}"
           class="btn btn-warning">

            <i data-feather="edit-2"></i>

            Edit Order

        </a>

        <a href="{{ route('orders.index') }}"
           class="btn btn-secondary">

            <i data-feather="arrow-left"></i>

            Back to Orders

        </a>

    </div>

</div>


<div class="row">

    {{-- Order Information --}}

    <div class="col-md-8">

        <div class="card">

            <div class="card-header">

                <h5 class="card-title mb-0">
                    Order Information
                </h5>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="text-muted">
                            Order Number
                        </label>

                        <div class="fw-bold">
                            {{ $order->order_number }}
                        </div>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="text-muted">
                            PO Number
                        </label>

                        <div>
                            {{ $order->po_number ?? '-' }}
                        </div>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="text-muted">
                            Buyer Name
                        </label>

                        <div>
                            {{ $order->buyer_name }}
                        </div>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="text-muted">
                            Style Number
                        </label>

                        <div>
                            {{ $order->style_number ?? '-' }}
                        </div>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="text-muted">
                            Product Name
                        </label>

                        <div>
                            {{ $order->product_name }}
                        </div>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="text-muted">
                            Order Type
                        </label>

                        <div>
                            {{ $order->order_type ?? '-' }}
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Status --}}

    <div class="col-md-4">

        <div class="card">

            <div class="card-header">

                <h5 class="card-title mb-0">
                    Order Status
                </h5>

            </div>

            <div class="card-body text-center">

                @if($order->status == 'Pending')

                    <span class="badge bg-warning fs-6">
                        Pending
                    </span>

                @elseif($order->status == 'In Progress')

                    <span class="badge bg-primary fs-6">
                        In Progress
                    </span>

                @elseif($order->status == 'Completed')

                    <span class="badge bg-success fs-6">
                        Completed
                    </span>

                @elseif($order->status == 'Cancelled')

                    <span class="badge bg-danger fs-6">
                        Cancelled
                    </span>

                @else

                    <span class="badge bg-secondary fs-6">
                        {{ $order->status }}
                    </span>

                @endif

            </div>

        </div>

    </div>

</div>


{{-- Quantity & Price --}}

<div class="card">

    <div class="card-header">

        <h5 class="card-title mb-0">
            Quantity & Price
        </h5>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-4">

                <div class="text-muted">
                    Order Quantity
                </div>

                <h4>
                    {{ number_format($order->order_qty) }} pcs
                </h4>

            </div>


            <div class="col-md-4">

                <div class="text-muted">
                    Unit Price
                </div>

                <h4>
                    ${{ number_format($order->unit_price, 2) }}
                </h4>

            </div>


            <div class="col-md-4">

                <div class="text-muted">
                    Total Value
                </div>

                <h4>
                    ${{ number_format($order->total_value, 2) }}
                </h4>

            </div>

        </div>

    </div>

</div>


{{-- Schedule --}}

<div class="card">

    <div class="card-header">

        <h5 class="card-title mb-0">
            Order Schedule
        </h5>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-6">

                <div class="text-muted">
                    Order Date
                </div>

                <div class="fw-bold">
                    {{ $order->order_date?->format('d M Y') }}
                </div>

            </div>


            <div class="col-md-6">

                <div class="text-muted">
                    Ex-Factory Date
                </div>

                <div class="fw-bold">

                    @if($order->ex_factory_date)

                        {{ $order->ex_factory_date->format('d M Y') }}

                    @else

                        -

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>


{{-- Notes --}}

@if($order->notes)

    <div class="card">

        <div class="card-header">

            <h5 class="card-title mb-0">
                Notes
            </h5>

        </div>

        <div class="card-body">

            {{ $order->notes }}

        </div>

    </div>

@endif


{{-- PDF Preview Modal --}}

<div class="modal fade"
     id="pdfPreviewModal"
     tabindex="-1"
     aria-labelledby="pdfPreviewModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-xl modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title"
                    id="pdfPreviewModalLabel">

                    <i data-feather="file-text"></i>

                    Garment Order PDF Preview

                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>

            </div>


            <div class="modal-body p-0">

                <iframe
                    src="{{ route('orders.pdf.preview', $order->id) }}"
                    width="100%"
                    height="650"
                    style="border: none;">
                </iframe>

            </div>


            <div class="modal-footer">

                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                    <i data-feather="x"></i>

                    Close

                </button>


                <a href="{{ route('orders.pdf.download', $order->id) }}"
                   class="btn btn-danger">

                    <i data-feather="download"></i>

                    Download PDF

                </a>

            </div>

        </div>

    </div>

</div>




@endsection