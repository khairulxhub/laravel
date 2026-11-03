<?php

namespace App\Http\Controllers\Admin;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GarmentOrder;

class GarmentOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = GarmentOrder::orderby('id', 'desc')->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }
//     public function index()
// {
//     dd('INDEX CONTROLLER WORKING');
// }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.orders.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
{
    $request->validate([
        'order_number' => 'required|string|max:255|unique:garment_orders,order_number',
        'po_number' => 'nullable|string|max:255',
        'buyer_name' => 'required|string|max:255',
        'style_number' => 'nullable|string|max:255',
        'product_name' => 'required|string|max:255',
        'order_type' => 'nullable|string|max:255',
        'order_qty' => 'required|integer|min:1',
        'unit_price' => 'required|numeric|min:0',
        'total_value' => 'required|numeric|min:0',
        'order_date' => 'required|date',
        'ex_factory_date' => 'nullable|date',
        'status' => 'required|string|max:255',
        'notes' => 'nullable|string',
    ]);

    GarmentOrder::create([
        'order_number' => $request->order_number,
        'po_number' => $request->po_number,
        'buyer_name' => $request->buyer_name,
        'style_number' => $request->style_number,
        'product_name' => $request->product_name,
        'order_type' => $request->order_type,
        'order_qty' => $request->order_qty,
        'unit_price' => $request->unit_price,
        'total_value' => $request->total_value,
        'order_date' => $request->order_date,
        'ex_factory_date' => $request->ex_factory_date,
        'status' => $request->status,
        'notes' => $request->notes,
    ]);

    return redirect()
        ->route('orders.index')
        ->with('success', 'Garment order created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          $order = GarmentOrder::findOrFail($id);

    return view('admin.orders.show', compact('order'));
    }

    public function pdf(string $id)
{
    $order = GarmentOrder::findOrFail($id);

    $pdf = Pdf::loadView('admin.orders.pdf', compact('order'));

    return $pdf->download(
        'garment-order-' . $order->order_number . '.pdf'
    );
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $order = GarmentOrder::findOrFail($id);

    return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'order_number' => 'required|string|max:255|unique:garment_orders,order_number,' . $id,
        'po_number' => 'nullable|string|max:255',
        'buyer_name' => 'required|string|max:255',
        'style_number' => 'nullable|string|max:255',
        'product_name' => 'required|string|max:255',
        'order_type' => 'nullable|string|max:255',
        'order_qty' => 'required|integer|min:1',
        'unit_price' => 'required|numeric|min:0',
        'total_value' => 'required|numeric|min:0',
        'order_date' => 'required|date',
        'ex_factory_date' => 'nullable|date',
        'status' => 'required|string|max:255',
        'notes' => 'nullable|string',
    ]);

    $order = GarmentOrder::findOrFail($id);

    $order->update([
        'order_number' => $request->order_number,
        'po_number' => $request->po_number,
        'buyer_name' => $request->buyer_name,
        'style_number' => $request->style_number,
        'product_name' => $request->product_name,
        'order_type' => $request->order_type,
        'order_qty' => $request->order_qty,
        'unit_price' => $request->unit_price,
        'total_value' => $request->total_value,
        'order_date' => $request->order_date,
        'ex_factory_date' => $request->ex_factory_date,
        'status' => $request->status,
        'notes' => $request->notes,
    ]);

    return redirect()
        ->route('orders.index')
        ->with('success', 'Garment order updated successfully.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $order = GarmentOrder::findOrFail($id);

    $order->delete();

    return redirect()
        ->route('orders.index')
        ->with('success', 'Garment order deleted successfully.');
    }
    public function report(string $id)
{
    $order = GarmentOrder::findOrFail($id);

    return view('admin.orders.report', compact('order'));
}
public function pdfPreview(string $id)
{
    $order = GarmentOrder::findOrFail($id);

    $pdf = Pdf::loadView(
        'admin.orders.pdf',
        compact('order')
    );

    return $pdf->stream(
        'garment-order-' . $order->order_number . '.pdf'
    );
}
public function pdfDownload(string $id)
{
    $order = GarmentOrder::findOrFail($id);

    $pdf = Pdf::loadView(
        'admin.orders.pdf',
        compact('order')
    );

    return $pdf->download(
        'garment-order-' . $order->order_number . '.pdf'
    );
}
}

