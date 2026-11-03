<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Log;

class BuyerController extends Controller
{
    public function index(Request $request)
    {
        //  dd('CONTROLLER WORKING');
        $query = Buyer::query();
    //    dd('test');
        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('company_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('country', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $buyers = $query
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        // return view('admin.buyers.index', compact('buyers'));
        return response()->json([
            'buyers' => $buyers,
            'search' => $request->search,
            'status' => $request->status,
        ], 200);
    }

    

// public function index(Request $request)
// {
//     Log::info('Buyer index controller called');

//     dd('CONTROLLER WORKING');
// }


    public function create()
    {
        return view('admin.buyers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'country' => 'nullable|string|max:100',
            'status' => 'required|in:Active,Inactive',
            'notes' => 'nullable|string',
        ]);

        Buyer::create($validated);

        return redirect()
            ->route('buyers.index')
            ->with('success', 'Buyer created successfully.');
    }

    public function show(Buyer $buyer)
    {
        $buyer->load('orders');

        // return view('admin.buyers.show', compact('buyer'));
        return response()->json($buyer);
    }

    public function edit(Buyer $buyer)
    {
        return view('admin.buyers.edit', compact('buyer'));
    }

    public function update(Request $request, Buyer $buyer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'country' => 'nullable|string|max:100',
            'status' => 'required|in:Active,Inactive',
            'notes' => 'nullable|string',
        ]);

        $buyer->update($validated);

    //     
    return response()->json([
        'message' => 'Buyer updated successfully.'
    ], 200);
    }

    public function destroy(Buyer $buyer)
    {
        if ($buyer->orders()->exists()) {
            return redirect()
                ->route('buyers.index')
                ->with('error', 'This buyer has orders and cannot be deleted.');
        }

        $buyer->delete();

    //     return redirect()
    //         ->route('buyers.index')
    //         ->with('success', 'Buyer deleted successfully.');
    // }
    return response()->json([
        'message' => 'Buyer deleted successfully.'
    ], 200);
    }   
}   