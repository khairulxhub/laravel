<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\Style;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    /**
     * Display all styles.
     */
    public function index(Request $request)
    {
        $query = Style::with('buyer');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('style_name', 'like', "%{$search}%")
                    ->orWhere('style_no', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $styles = $query
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        return view('admin.styles.index', compact('styles'));
    }


    /**
     * Show create form.
     */
    public function create()
    {
        $buyers = Buyer::orderBy('name')->get();

        return view('admin.styles.create', compact('buyers'));
    }


    /**
     * Store new style.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'style_name' => 'required|string|max:255',
            'style_no'   => 'required|string|max:255|unique:styles,style_no',
            'buyer_id'   => 'nullable|exists:buyers,id',
            'season'     => 'nullable|string|max:255',
            'status'     => 'required|in:active,inactive',
        ]);

        Style::create($validated);

        return redirect()
            ->route('styles.index')
            ->with('success', 'Style created successfully.');
    }


    /**
     * Display a single style.
     */
    public function show(Style $style)
    {
        $style->load([
            'buyer',
            'techPacks' => function ($query) {
                $query->latest('id');
            }
        ]);

        return view('admin.styles.show', compact('style'));
    }


    /**
     * Show edit form.
     */
    public function edit(Style $style)
    {
        $buyers = Buyer::orderBy('name')->get();

        return view('admin.styles.edit', compact('style', 'buyers'));
    }


    /**
     * Update style.
     */
    public function update(Request $request, Style $style)
    {
        $validated = $request->validate([
            'style_name' => 'required|string|max:255',
            'style_no'   => 'required|string|max:255|unique:styles,style_no,' . $style->id,
            'buyer_id'   => 'nullable|exists:buyers,id',
            'season'     => 'nullable|string|max:255',
            'status'     => 'required|in:active,inactive',
        ]);

        $style->update($validated);

        return redirect()
            ->route('styles.index')
            ->with('success', 'Style updated successfully.');
    }


    /**
     * Delete style.
     */
    public function destroy(Style $style)
    {
        $style->delete();

        return redirect()
            ->route('styles.index')
            ->with('success', 'Style deleted successfully.');
    }
}
