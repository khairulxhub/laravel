@extends('admin.master')

@section('title', 'Garments ERP - Dashboard')

@section('content')

<div class="container-fluid p-0">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>
            <h1 class="h3 mb-1">
                <strong>Garments ERP</strong> Dashboard
            </h1>

            <p class="text-muted mb-0">
                Production and order overview
            </p>
        </div>

        <div>
            <span class="badge bg-success">
                Production Running
            </span>
        </div>

    </div>


    {{-- Statistics --}}
    <div class="row">

        {{-- Total Orders --}}
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">

                    <div class="row">

                        <div class="col mt-0">
                            <h5 class="card-title">
                                Total Orders
                            </h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i data-feather="shopping-bag"></i>
                            </div>
                        </div>

                    </div>

                    <h1 class="mt-1 mb-3">128</h1>

                    <div class="mb-0">
                        <span class="text-success">
                            +12.5%
                        </span>

                        <span class="text-muted">
                            Since last month
                        </span>
                    </div>

                </div>
            </div>
        </div>


        {{-- Total Production --}}
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">

                    <div class="row">

                        <div class="col mt-0">
                            <h5 class="card-title">
                                Production Qty
                            </h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-success">
                                <i data-feather="package"></i>
                            </div>
                        </div>

                    </div>

                    <h1 class="mt-1 mb-3">
                        842,500
                    </h1>

                    <div class="mb-0">
                        <span class="text-success">
                            +8.4%
                        </span>

                        <span class="text-muted">
                            This month
                        </span>
                    </div>

                </div>
            </div>
        </div>


        {{-- Pending Orders --}}
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">

                    <div class="row">

                        <div class="col mt-0">
                            <h5 class="card-title">
                                Pending Orders
                            </h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-warning">
                                <i data-feather="clock"></i>
                            </div>
                        </div>

                    </div>

                    <h1 class="mt-1 mb-3">
                        24
                    </h1>

                    <div class="mb-0">
                        <span class="text-warning">
                            18.7%
                        </span>

                        <span class="text-muted">
                            Of total orders
                        </span>
                    </div>

                </div>
            </div>
        </div>


        {{-- Order Value --}}
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">

                    <div class="row">

                        <div class="col mt-0">
                            <h5 class="card-title">
                                Order Value
                            </h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-info">
                                <i data-feather="dollar-sign"></i>
                            </div>
                        </div>

                    </div>

                    <h1 class="mt-1 mb-3">
                        $1.84M
                    </h1>

                    <div class="mb-0">
                        <span class="text-success">
                            +15.2%
                        </span>

                        <span class="text-muted">
                            This year
                        </span>
                    </div>

                </div>
            </div>
        </div>

    </div>


    {{-- Production Progress --}}
    <div class="row">

        <div class="col-xl-8">
            <div class="card flex-fill">

                <div class="card-header">

                    <h5 class="card-title mb-0">
                        Production Progress
                    </h5>

                </div>

                <div class="card-body">

                    {{-- Cutting --}}
                    <div class="mb-4">

                        <div class="d-flex justify-content-between mb-1">

                            <span>
                                Cutting
                            </span>

                            <strong>
                                92%
                            </strong>

                        </div>

                        <div class="progress">
                            <div
                                class="progress-bar bg-primary"
                                style="width: 92%">
                            </div>
                        </div>

                    </div>


                    {{-- Sewing --}}
                    <div class="mb-4">

                        <div class="d-flex justify-content-between mb-1">

                            <span>
                                Sewing
                            </span>

                            <strong>
                                84%
                            </strong>

                        </div>

                        <div class="progress">
                            <div
                                class="progress-bar bg-success"
                                style="width: 84%">
                            </div>
                        </div>

                    </div>


                    {{-- Finishing --}}
                    <div class="mb-4">

                        <div class="d-flex justify-content-between mb-1">

                            <span>
                                Finishing
                            </span>

                            <strong>
                                71%
                            </strong>

                        </div>

                        <div class="progress">
                            <div
                                class="progress-bar bg-warning"
                                style="width: 71%">
                            </div>
                        </div>

                    </div>


                    {{-- Packing --}}
                    <div>

                        <div class="d-flex justify-content-between mb-1">

                            <span>
                                Packing
                            </span>

                            <strong>
                                58%
                            </strong>

                        </div>

                        <div class="progress">
                            <div
                                class="progress-bar bg-info"
                                style="width: 58%">
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>


        {{-- Order Status --}}
        <div class="col-xl-4">

            <div class="card">

                <div class="card-header">

                    <h5 class="card-title mb-0">
                        Order Status
                    </h5>

                </div>

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">
                        <span>
                            Pending
                        </span>

                        <span class="badge bg-warning">
                            24
                        </span>
                    </div>


                    <div class="d-flex justify-content-between mb-3">
                        <span>
                            In Production
                        </span>

                        <span class="badge bg-primary">
                            42
                        </span>
                    </div>


                    <div class="d-flex justify-content-between mb-3">
                        <span>
                            Completed
                        </span>

                        <span class="badge bg-success">
                            48
                        </span>
                    </div>


                    <div class="d-flex justify-content-between">
                        <span>
                            Cancelled
                        </span>

                        <span class="badge bg-danger">
                            14
                        </span>
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Recent Orders --}}
    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <h5 class="card-title mb-0">
                        Recent Orders
                    </h5>

                </div>

                <div class="table-responsive">

                    <table class="table table-hover my-0">

                        <thead>

                            <tr>

                                <th>Order No</th>

                                <th>Buyer</th>

                                <th>Product</th>

                                <th>Qty</th>

                                <th>Ex-Factory</th>

                                <th>Status</th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr>

                                <td>
                                    GERP-2026-0001
                                </td>

                                <td>
                                    ABC Fashion International
                                </td>

                                <td>
                                    Men's Premium Polo Shirt
                                </td>

                                <td>
                                    50,000 pcs
                                </td>

                                <td>
                                    15 Dec 2026
                                </td>

                                <td>
                                    <span class="badge bg-primary">
                                        In Production
                                    </span>
                                </td>

                            </tr>


                            <tr>

                                <td>
                                    GERP-2026-0002
                                </td>

                                <td>
                                    Fashion World Ltd.
                                </td>

                                <td>
                                    Ladies Cotton T-Shirt
                                </td>

                                <td>
                                    35,000 pcs
                                </td>

                                <td>
                                    25 Nov 2026
                                </td>

                                <td>
                                    <span class="badge bg-warning">
                                        Pending
                                    </span>
                                </td>

                            </tr>


                            <tr>

                                <td>
                                    GERP-2026-0003
                                </td>

                                <td>
                                    Global Apparel Inc.
                                </td>

                                <td>
                                    Kids Polo Shirt
                                </td>

                                <td>
                                    25,000 pcs
                                </td>

                                <td>
                                    10 Dec 2026
                                </td>

                                <td>
                                    <span class="badge bg-success">
                                        Completed
                                    </span>
                                </td>

                            </tr>


                            <tr>

                                <td>
                                    GERP-2026-0004
                                </td>

                                <td>
                                    Zara Fashion Buyer
                                </td>

                                <td>
                                    Men's Basic T-Shirt
                                </td>

                                <td>
                                    75,000 pcs
                                </td>

                                <td>
                                    20 Jan 2027
                                </td>

                                <td>
                                    <span class="badge bg-primary">
                                        In Production
                                    </span>
                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection