<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Style;
use App\Models\TechPack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TechPackController extends Controller
{
    /**
     * Display Tech Packs.
     */
   public function index(Request $request)
{
    $query = TechPack::with('style');

    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('tech_pack_no', 'like', "%{$search}%")
                ->orWhere('product_type', 'like', "%{$search}%")
                ->orWhereHas('style', function ($styleQuery) use ($search) {
                    $styleQuery->where('style_name', 'like', "%{$search}%")
                        ->orWhere('style_no', 'like', "%{$search}%");
                });
        });
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $techPacks = $query
        ->latest('id')
        ->paginate(10)
        ->withQueryString();

    // Tech Pack-এর আলাদা index page নেই
    // তাই কোনো view return না করে Style page-এ পাঠানো হচ্ছে

    return redirect()->route('styles.index');
}


    /**
     * Show create form.
     */
    public function create(Request $request)
    {
        $styles = Style::orderBy('style_name')->get();

        $selectedStyle = $request->style_id;

        return view('tech-packs.create', compact(
            'styles',
            'selectedStyle'
        ));
    }


    /**
     * Store Tech Pack.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'style_id'      => 'required|exists:styles,id',
            'tech_pack_no'  => 'required|string|max:255|unique:tech_packs,tech_pack_no',
            'version'       => 'required|string|max:50',
            'product_type'  => 'nullable|string|max:255',
            'fabric'        => 'nullable|string|max:255',
            'gsm'           => 'nullable|string|max:100',
            'color'         => 'nullable|string|max:255',
            'size_range'    => 'nullable|string|max:255',
            'construction'  => 'nullable|string',
            'washing'       => 'nullable|string',
            'status'        => 'required|in:draft,pending,approved,rejected',
            'notes'         => 'nullable|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:20480',
            'pdf'   => 'nullable|file|mimes:pdf|max:20480',
        ]);

        $techPack = new TechPack();

        $techPack->style_id = $validated['style_id'];
        $techPack->tech_pack_no = $validated['tech_pack_no'];
        $techPack->version = $validated['version'];
        $techPack->product_type = $validated['product_type'] ?? null;
        $techPack->fabric = $validated['fabric'] ?? null;
        $techPack->gsm = $validated['gsm'] ?? null;
        $techPack->color = $validated['color'] ?? null;
        $techPack->size_range = $validated['size_range'] ?? null;
        $techPack->construction = $validated['construction'] ?? null;
        $techPack->washing = $validated['washing'] ?? null;
        $techPack->status = $validated['status'];
        $techPack->notes = $validated['notes'] ?? null;

        /*
        |--------------------------------------------------------------------------
        | Image Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {
            $techPack->image_path = $request
                ->file('image')
                ->store('tech-packs/images', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | PDF Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('pdf')) {
            $techPack->file_path = $request
                ->file('pdf')
                ->store('tech-packs/pdfs', 'public');
        }

        $techPack->save();

        return redirect()
            ->route('styles.show', $techPack->style_id)
            ->with('success', 'Tech Pack created successfully.');
    }


    /**
     * Display Tech Pack.
     */
    public function show(TechPack $techPack)
    {
        $techPack->load('style.buyer');

        return view('tech-packs.show', compact('techPack'));
    }


    /**
     * Show edit form.
     */
    public function edit(TechPack $techPack)
    {
        $styles = Style::orderBy('style_name')->get();

        return view('admin.tech-packs.edit', compact(
            'techPack',
            'styles'
        ));
    }


    /**
     * Update Tech Pack.
     */
    public function update(Request $request, TechPack $techPack)
    {
        $validated = $request->validate([
            'style_id'      => 'required|exists:styles,id',
            'tech_pack_no'  => 'required|string|max:255|unique:tech_packs,tech_pack_no,' . $techPack->id,
            'version'       => 'required|string|max:50',
            'product_type'  => 'nullable|string|max:255',
            'fabric'        => 'nullable|string|max:255',
            'gsm'           => 'nullable|string|max:100',
            'color'         => 'nullable|string|max:255',
            'size_range'    => 'nullable|string|max:255',
            'construction'  => 'nullable|string',
            'washing'       => 'nullable|string',
            'status'        => 'required|in:draft,pending,approved,rejected',
            'notes'         => 'nullable|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'pdf'   => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $techPack->style_id = $validated['style_id'];
        $techPack->tech_pack_no = $validated['tech_pack_no'];
        $techPack->version = $validated['version'];
        $techPack->product_type = $validated['product_type'] ?? null;
        $techPack->fabric = $validated['fabric'] ?? null;
        $techPack->gsm = $validated['gsm'] ?? null;
        $techPack->color = $validated['color'] ?? null;
        $techPack->size_range = $validated['size_range'] ?? null;
        $techPack->construction = $validated['construction'] ?? null;
        $techPack->washing = $validated['washing'] ?? null;
        $techPack->status = $validated['status'];
        $techPack->notes = $validated['notes'] ?? null;

        /*
        |--------------------------------------------------------------------------
        | Replace Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            if ($techPack->image_path) {
                Storage::disk('public')->delete($techPack->image_path);
            }

            $techPack->image_path = $request
                ->file('image')
                ->store('tech-packs/images', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Replace PDF
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('pdf')) {

            if ($techPack->file_path) {
                Storage::disk('public')->delete($techPack->file_path);
            }

            $techPack->file_path = $request
                ->file('pdf')
                ->store('tech-packs/pdfs', 'public');
        }

        $techPack->save();

        return redirect()
            ->route('styles.show', $techPack->style_id)
            ->with('success', 'Tech Pack updated successfully.');
    }


    /**
     * Delete Tech Pack.
     */
    public function destroy(TechPack $techPack)
    {
        $styleId = $techPack->style_id;

        if ($techPack->image_path) {
            Storage::disk('public')->delete($techPack->image_path);
        }

        if ($techPack->file_path) {
            Storage::disk('public')->delete($techPack->file_path);
        }

        $techPack->delete();

        return redirect()
            ->route('styles.show', $styleId)
            ->with('success', 'Tech Pack deleted successfully.');
    }
}