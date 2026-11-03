<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Garment Order Report - {{ $order->order_number }}</title>

    <style>

        @page {
            margin: 25px 30px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333333;
            background: #ffffff;
        }

        /* =========================================
           HEADER
        ========================================= */

        .header {
            width: 100%;
            text-align: center;
            padding-bottom: 15px;
            border-bottom: 2px solid #222222;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 2px;
            color: #1f2937;
        }

        .header p {
            margin: 5px 0 0;
            font-size: 12px;
            color: #6b7280;
        }


        /* =========================================
           REPORT TITLE
        ========================================= */

        .report-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .report-title h2 {
            margin: 0;
            font-size: 19px;
            color: #1f2937;
        }

        .report-title p {
            margin: 5px 0 0;
            font-size: 10px;
            color: #777777;
        }


        /* =========================================
           GENERAL SECTION
        ========================================= */

        .section {
            width: 100%;
            border: 1px solid #d9dde3;
            margin-bottom: 16px;
        }

        .section-title {
            background: #f1f3f5;
            border-bottom: 1px solid #d9dde3;
            padding: 10px 12px;
            font-size: 13px;
            font-weight: bold;
            color: #1f2937;
        }

        .section-body {
            padding: 0;
        }


        /* =========================================
           INFORMATION TABLE
        ========================================= */

        .info-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .info-table td {
            width: 33.33%;
            padding: 12px;
            vertical-align: top;
            border-bottom: 1px solid #eeeeee;
        }

        .info-table tr:last-child td {
            border-bottom: none;
        }

        .label {
            display: block;
            margin-bottom: 5px;
            font-size: 10px;
            color: #777777;
        }

        .value {
            display: block;
            font-size: 12px;
            font-weight: bold;
            color: #222222;
            word-wrap: break-word;
        }


        /* =========================================
           STATUS
        ========================================= */

        .status-table {
            width: 100%;
            border-collapse: collapse;
        }

        .status-table td {
            padding: 15px;
        }

        .status {
            display: inline-block;
            padding: 6px 14px;
            background: #f59e0b;
            color: #ffffff;
            font-size: 11px;
            font-weight: bold;
        }


        /* =========================================
           QUANTITY & PRICE
        ========================================= */

        .price-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .price-table td {
            width: 33.33%;
            padding: 15px;
            vertical-align: top;
        }

        .price-box {
            border: 1px solid #e1e5ea;
            padding: 12px;
            background: #fafafa;
        }

        .price-label {
            font-size: 10px;
            color: #777777;
            margin-bottom: 6px;
        }

        .price-value {
            font-size: 14px;
            font-weight: bold;
            color: #222222;
        }

        .total-box {
            border: 1px solid #d5dbe1;
            padding: 12px;
            background: #f3f4f6;
        }


        /* =========================================
           SCHEDULE
        ========================================= */

        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .schedule-table td {
            width: 50%;
            padding: 15px;
            vertical-align: top;
        }


        /* =========================================
           NOTES
        ========================================= */

        .notes {
            padding: 15px;
            min-height: 65px;
            line-height: 1.6;
            color: #444444;
            word-wrap: break-word;
        }


        /* =========================================
           SUMMARY
        ========================================= */

        .summary-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .summary-table td {
            width: 50%;
            padding: 10px 12px;
            border-bottom: 1px solid #eeeeee;
        }

        .summary-table tr:last-child td {
            border-bottom: none;
        }


        /* =========================================
           FOOTER
        ========================================= */

        .footer {
            margin-top: 25px;
            padding-top: 10px;
            border-top: 1px solid #dddddd;
            text-align: center;
            color: #777777;
            font-size: 9px;
            line-height: 1.5;
        }


        /* =========================================
           PAGE NUMBER
        ========================================= */

        .page-number {
            text-align: right;
            font-size: 9px;
            color: #999999;
            margin-top: 5px;
        }

    </style>

</head>


<body>


    {{-- =========================================
         GERP HEADER
    ========================================= --}}

    <div class="header">

        <h1>GERP</h1>

        <p>
            Garment Enterprise Resource Planning
        </p>

    </div>


    {{-- =========================================
         REPORT TITLE
    ========================================= --}}

    <div class="report-title">

        <h2>Garment Order Report</h2>

        <p>
            Individual Order Information
        </p>

    </div>


    {{-- =========================================
         ORDER INFORMATION
    ========================================= --}}

    <div class="section">

        <div class="section-title">
            Order Information
        </div>

        <div class="section-body">

            <table class="info-table">

                <tr>

                    <td>
                        <span class="label">
                            Order Number
                        </span>

                        <span class="value">
                            {{ $order->order_number }}
                        </span>
                    </td>


                    <td>
                        <span class="label">
                            PO Number
                        </span>

                        <span class="value">
                            {{ $order->po_number ?? '-' }}
                        </span>
                    </td>


                    <td>
                        <span class="label">
                            Buyer Name
                        </span>

                        <span class="value">
                            {{ $order->buyer_name }}
                        </span>
                    </td>

                </tr>


                <tr>

                    <td>
                        <span class="label">
                            Style Number
                        </span>

                        <span class="value">
                            {{ $order->style_number ?? '-' }}
                        </span>
                    </td>


                    <td>
                        <span class="label">
                            Product Name
                        </span>

                        <span class="value">
                            {{ $order->product_name }}
                        </span>
                    </td>


                    <td>
                        <span class="label">
                            Order Type
                        </span>

                        <span class="value">
                            {{ $order->order_type ?? '-' }}
                        </span>
                    </td>

                </tr>

            </table>

        </div>

    </div>


    {{-- =========================================
         ORDER STATUS
    ========================================= --}}

    <div class="section">

        <div class="section-title">
            Order Status
        </div>

        <table class="status-table">

            <tr>

                <td>

                    <span class="status">
                        {{ $order->status }}
                    </span>

                </td>

            </tr>

        </table>

    </div>


    {{-- =========================================
         QUANTITY & PRICE
    ========================================= --}}

    <div class="section">

        <div class="section-title">
            Quantity & Price
        </div>

        <table class="price-table">

            <tr>

                <td>

                    <div class="price-box">

                        <div class="price-label">
                            Order Quantity
                        </div>

                        <div class="price-value">
                            {{ number_format($order->order_qty) }} pcs
                        </div>

                    </div>

                </td>


                <td>

                    <div class="price-box">

                        <div class="price-label">
                            Unit Price
                        </div>

                        <div class="price-value">
                            ${{ number_format($order->unit_price, 2) }}
                        </div>

                    </div>

                </td>


                <td>

                    <div class="total-box">

                        <div class="price-label">
                            Total Value
                        </div>

                        <div class="price-value">
                            ${{ number_format($order->total_value, 2) }}
                        </div>

                    </div>

                </td>

            </tr>

        </table>

    </div>


    {{-- =========================================
         ORDER SCHEDULE
    ========================================= --}}

    <div class="section">

        <div class="section-title">
            Order Schedule
        </div>

        <table class="schedule-table">

            <tr>

                <td>

                    <span class="label">
                        Order Date
                    </span>

                    <span class="value">
                        {{ $order->order_date?->format('d M Y') ?? '-' }}
                    </span>

                </td>


                <td>

                    <span class="label">
                        Ex-Factory Date
                    </span>

                    <span class="value">
                        {{ $order->ex_factory_date?->format('d M Y') ?? '-' }}
                    </span>

                </td>

            </tr>

        </table>

    </div>


    {{-- =========================================
         NOTES
    ========================================= --}}

    <div class="section">

        <div class="section-title">
            Notes
        </div>

        <div class="notes">

            {{ $order->notes ?? 'No notes available.' }}

        </div>

    </div>


    {{-- =========================================
         ORDER SUMMARY
    ========================================= --}}

    <div class="section">

        <div class="section-title">
            Order Summary
        </div>

        <table class="summary-table">

            <tr>

                <td>
                    <span class="label">
                        Order Number
                    </span>

                    <span class="value">
                        {{ $order->order_number }}
                    </span>
                </td>


                <td>
                    <span class="label">
                        Status
                    </span>

                    <span class="value">
                        {{ $order->status }}
                    </span>
                </td>

            </tr>


            <tr>

                <td>
                    <span class="label">
                        Total Quantity
                    </span>

                    <span class="value">
                        {{ number_format($order->order_qty) }} pcs
                    </span>
                </td>


                <td>
                    <span class="label">
                        Total Order Value
                    </span>

                    <span class="value">
                        ${{ number_format($order->total_value, 2) }}
                    </span>
                </td>

            </tr>

        </table>

    </div>


    {{-- =========================================
         FOOTER
    ========================================= --}}

    <div class="footer">

        <strong>GERP</strong>
        -
        Garment Enterprise Resource Planning

        <br>

        This document is an automatically generated garment order report.

        <br>

        Generated on:
        {{ now()->format('d M Y h:i A') }}

    </div>


</body>

</html>