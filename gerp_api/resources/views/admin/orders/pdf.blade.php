<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>
        Garment Order Report - {{ $order->order_number }}
    </title>

    <style>

        @page {
            margin: 25px 30px 80px 30px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #333;
            background: #fff;
        }


        /* =========================================
           COMPANY HEADER
        ========================================= */

        .company-header {
            width: 100%;
            text-align: center;
            border-bottom: 2px solid #222;
            padding-bottom: 12px;
            margin-bottom: 18px;
        }

        .company-name {
            margin: 0;
            font-size: 25px;
            font-weight: bold;
            letter-spacing: 2px;
            color: #1f2937;
        }

        .company-tagline {
            margin-top: 4px;
            font-size: 10px;
            color: #666;
        }


        /* =========================================
           REPORT TITLE
        ========================================= */

        .report-title {
            width: 100%;
            text-align: center;
            margin-bottom: 18px;
        }

        .report-title h2 {
            margin: 0;
            font-size: 17px;
            color: #222;
        }

        .report-title p {
            margin: 4px 0 0;
            font-size: 9px;
            color: #777;
        }


        /* =========================================
           SECTION
        ========================================= */

        .section {
            width: 100%;
            border: 1px solid #d9dde3;
            margin-bottom: 14px;
        }

        .section-title {
            width: 100%;
            background: #f1f3f5;
            border-bottom: 1px solid #d9dde3;
            padding: 8px 10px;
            font-size: 11px;
            font-weight: bold;
            color: #1f2937;
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
            padding: 10px;
            vertical-align: top;
            border-bottom: 1px solid #eeeeee;
        }

        .info-table tr:last-child td {
            border-bottom: none;
        }


        /* =========================================
           LABEL / VALUE
        ========================================= */

        .label {
            display: block;
            margin-bottom: 4px;
            font-size: 9px;
            color: #777;
        }

        .value {
            display: block;
            font-size: 11px;
            font-weight: bold;
            color: #222;

            /* IMPORTANT */
            word-wrap: break-word;
            overflow-wrap: break-word;
        }


        /* =========================================
           STATUS
        ========================================= */

        .status-table {
            width: 100%;
            border-collapse: collapse;
        }

        .status-table td {
            padding: 12px;
        }

        .status {
            display: inline-block;
            padding: 5px 12px;
            background: #f59e0b;
            color: #fff;
            font-size: 9px;
            font-weight: bold;
        }


        /* =========================================
           PRICE TABLE
        ========================================= */

        .price-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .price-table td {
            width: 33.33%;
            padding: 10px;
            vertical-align: top;
        }

        .price-box {
            border: 1px solid #e1e5ea;
            padding: 10px;
            background: #fafafa;
        }

        .total-box {
            border: 1px solid #d5dbe1;
            padding: 10px;
            background: #f3f4f6;
        }

        .price-label {
            margin-bottom: 5px;
            font-size: 9px;
            color: #777;
        }

        .price-value {
            font-size: 12px;
            font-weight: bold;
            color: #222;
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
            padding: 12px;
            vertical-align: top;
        }


        /* =========================================
           NOTES
        ========================================= */

        .notes {
            padding: 12px;
            min-height: 60px;
            line-height: 1.5;

            word-wrap: break-word;
            overflow-wrap: break-word;
        }


        /* =========================================
           ORDER SUMMARY
        ========================================= */

        .summary-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .summary-table td {
            width: 50%;
            padding: 9px 10px;
            border-bottom: 1px solid #eeeeee;
            vertical-align: top;
        }

        .summary-table tr:last-child td {
            border-bottom: none;
        }


        /* =========================================
           FIXED COMPANY SIGNATURE / FOOTER
           Appears on every PDF page
        ========================================= */

        .company-footer {
            position: fixed;
            left: 0;
            right: 0;
            bottom: -55px;

            height: 50px;

            border-top: 1px solid #d9dde3;

            text-align: center;

            font-size: 8px;
            color: #777;

            padding-top: 7px;
        }

        .company-footer strong {
            color: #222;
            font-size: 9px;
        }

        .signature {
            margin-top: 3px;
            font-size: 8px;
            color: #555;
        }


        /* =========================================
           PAGE NUMBER
        ========================================= */

        .page-number:after {
            content: "Page " counter(page);
        }

    </style>

</head>


<body>


    {{-- =========================================
         COMPANY HEADER
    ========================================== --}}

    <div class="company-header">

        <div class="company-name">
            GERP
        </div>

        <div class="company-tagline">
            Garment Enterprise Resource Planning
        </div>

    </div>


    {{-- =========================================
         REPORT TITLE
    ========================================== --}}

    <div class="report-title">

        <h2>
            Garment Order Report
        </h2>

        <p>
            Individual Order Information
        </p>

    </div>


    {{-- =========================================
         ORDER INFORMATION
    ========================================== --}}

    <div class="section">

        <div class="section-title">
            Order Information
        </div>


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


    {{-- =========================================
         ORDER STATUS
    ========================================== --}}

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
    ========================================== --}}

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
    ========================================== --}}

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
    ========================================== --}}

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
    ========================================== --}}

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
         FIXED COMPANY SIGNATURE
         Shows on every page
    ========================================== --}}

    <div class="company-footer">

        <strong>
            GERP
        </strong>

        - Garment Enterprise Resource Planning

        <br>

        Authorized Document • Generated on
        {{ now()->format('d M Y h:i A') }}

        <div class="signature">
            Official Company Document
        </div>

        <span class="page-number"></span>

    </div>


</body>

</html>