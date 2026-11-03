@extends('admin.master')

@section('content')

<div class="container-fluid py-4">

    {{-- =========================================================
        PAGE HEADER
    ========================================================== --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="mb-1">Style Details</h4>

            <p class="text-muted mb-0">
                View complete style information
            </p>
        </div>

        <div class="d-flex gap-2">

            <a href="{{ route('styles.edit', $style->id) }}"
               class="btn btn-primary">

                <i class="bi bi-pencil me-1"></i>
                Edit Style

            </a>

            <a href="{{ route('styles.index') }}"
               class="btn btn-light border">

                <i class="bi bi-arrow-left me-1"></i>
                Back

            </a>

        </div>

    </div>


    {{-- =========================================================
        SUCCESS MESSAGE
    ========================================================== --}}

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle me-1"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- =========================================================
        VALIDATION ERRORS
    ========================================================== --}}

    @if($errors->any())

        <div class="alert alert-danger alert-dismissible fade show">

            <strong>
                Please fix the following errors:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- =========================================================
        STYLE + QUICK ACTIONS
    ========================================================== --}}

    <div class="row g-4">

        {{-- =====================================================
            STYLE INFORMATION
        ====================================================== --}}

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h5 class="mb-0">
                                Style Information
                            </h5>

                            <small class="text-muted">
                                Style #{{ $style->style_no }}
                            </small>

                        </div>

                        @if($style->status === 'active')

                            <span class="badge bg-success-subtle text-success px-3 py-2">

                                <i class="bi bi-check-circle me-1"></i>
                                Active

                            </span>

                        @else

                            <span class="badge bg-secondary-subtle text-secondary px-3 py-2">

                                <i class="bi bi-x-circle me-1"></i>
                                Inactive

                            </span>

                        @endif

                    </div>

                </div>


                <div class="card-body">

                    <div class="row g-4">

                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Style Name
                            </div>

                            <div class="fw-semibold">
                                {{ $style->style_name }}
                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Style No
                            </div>

                            <div class="fw-semibold">
                                {{ $style->style_no }}
                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Buyer
                            </div>

                            @if($style->buyer)

                                <div class="fw-semibold">
                                    {{ $style->buyer->name }}
                                </div>

                                @if($style->buyer->company_name)

                                    <div class="text-muted small">
                                        {{ $style->buyer->company_name }}
                                    </div>

                                @endif

                            @else

                                <span class="text-muted">
                                    No buyer assigned
                                </span>

                            @endif

                        </div>


                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Season
                            </div>

                            <div class="fw-semibold">
                                {{ $style->season ?: 'N/A' }}
                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Status
                            </div>

                            @if($style->status === 'active')

                                <span class="badge bg-success-subtle text-success">
                                    Active
                                </span>

                            @else

                                <span class="badge bg-secondary-subtle text-secondary">
                                    Inactive
                                </span>

                            @endif

                        </div>


                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                ID
                            </div>

                            <div class="fw-semibold">
                                #{{ $style->id }}
                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Created At
                            </div>

                            <div>
                                {{ $style->created_at?->format('d M Y, h:i A') ?? 'N/A' }}
                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Last Updated
                            </div>

                            <div>
                                {{ $style->updated_at?->format('d M Y, h:i A') ?? 'N/A' }}
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
            QUICK ACTIONS
        ====================================================== --}}

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">

                    <h5 class="mb-0">
                        Quick Actions
                    </h5>

                </div>


                <div class="card-body">

                    <div class="d-grid gap-2">

                        <a href="{{ route('styles.edit', $style->id) }}"
                           class="btn btn-primary">

                            <i class="bi bi-pencil me-1"></i>
                            Edit Style

                        </a>


                        <form
                            action="{{ route('styles.destroy', $style->id) }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this style?');"
                        >

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-outline-danger w-100">

                                <i class="bi bi-trash me-1"></i>
                                Delete Style

                            </button>

                        </form>


                        <a href="{{ route('styles.index') }}"
                           class="btn btn-light border">

                            <i class="bi bi-list me-1"></i>
                            All Styles

                        </a>

                    </div>

                </div>

            </div>


            {{-- =================================================
                BUYER INFORMATION
            ================================================== --}}

            @if($style->buyer)

                <div class="card border-0 shadow-sm mt-4">

                    <div class="card-header bg-white py-3">

                        <h5 class="mb-0">
                            Buyer Information
                        </h5>

                    </div>


                    <div class="card-body">

                        <div class="mb-3">

                            <div class="text-muted small">
                                Buyer Name
                            </div>

                            <div class="fw-semibold">
                                {{ $style->buyer->name }}
                            </div>

                        </div>


                        @if($style->buyer->company_name)

                            <div class="mb-3">

                                <div class="text-muted small">
                                    Company
                                </div>

                                <div>
                                    {{ $style->buyer->company_name }}
                                </div>

                            </div>

                        @endif


                        @if($style->buyer->email)

                            <div class="mb-3">

                                <div class="text-muted small">
                                    Email
                                </div>

                                <div>
                                    {{ $style->buyer->email }}
                                </div>

                            </div>

                        @endif


                        @if($style->buyer->phone)

                            <div>

                                <div class="text-muted small">
                                    Phone
                                </div>

                                <div>
                                    {{ $style->buyer->phone }}
                                </div>

                            </div>

                        @endif

                    </div>

                </div>

            @endif

        </div>

    </div>


    {{-- =========================================================
        TECH PACK SECTION
    ========================================================== --}}

    <div class="card border-0 shadow-sm mt-4">

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h5 class="mb-1">

                        <i class="bi bi-file-earmark-text me-1"></i>

                        Tech Packs

                    </h5>

                    <small class="text-muted">
                        Technical information, images and PDF documents
                    </small>

                </div>


                <a href="#add-tech-pack"
                   class="btn btn-primary btn-sm">

                    <i class="bi bi-plus-lg me-1"></i>
                    Add Tech Pack

                </a>

            </div>

        </div>


        <div class="card-body">

            {{-- =================================================
                EXISTING TECH PACKS
            ================================================== --}}

            @if($style->techPacks && $style->techPacks->count())

                <div class="row g-4">

                    @foreach($style->techPacks as $techPack)

                        <div class="col-12">

                            <div class="border rounded p-3">

                                <div class="row g-4">

                                    {{-- =================================================
                                        IMAGE
                                    ================================================== --}}

                                    <div class="col-md-3">

                                        @if($techPack->image_path)

                                            <div class="border rounded overflow-hidden bg-light">

                                                <a
                                                    href="{{ asset('storage/' . $techPack->image_path) }}"
                                                    target="_blank"
                                                >

                                                    <img
                                                        src="{{ asset('storage/' . $techPack->image_path) }}"
                                                        alt="Tech Pack Image"
                                                        class="img-fluid w-100"
                                                        style="height:220px; object-fit:cover;"
                                                    >

                                                </a>

                                            </div>

                                        @else

                                            <div
                                                class="border rounded bg-light d-flex align-items-center justify-content-center"
                                                style="height:220px;"
                                            >

                                                <div class="text-center text-muted">

                                                    <i class="bi bi-image fs-1"></i>

                                                    <div class="small mt-2">
                                                        No Image
                                                    </div>

                                                </div>

                                            </div>

                                        @endif

                                    </div>


                                    {{-- =================================================
                                        TECH PACK INFORMATION
                                    ================================================== --}}

                                    <div class="col-md-5">

                                        <div class="d-flex justify-content-between align-items-start">

                                            <div>

                                                <h5 class="mb-1">
                                                    {{ $techPack->tech_pack_no }}
                                                </h5>

                                                <div class="text-muted small">

                                                    Version:
                                                    {{ $techPack->version }}

                                                </div>

                                            </div>


                                            @if($techPack->status === 'approved')

                                                <span class="badge bg-success-subtle text-success">
                                                    Approved
                                                </span>

                                            @elseif($techPack->status === 'pending')

                                                <span class="badge bg-warning-subtle text-warning">
                                                    Pending
                                                </span>

                                            @elseif($techPack->status === 'rejected')

                                                <span class="badge bg-danger-subtle text-danger">
                                                    Rejected
                                                </span>

                                            @else

                                                <span class="badge bg-secondary-subtle text-secondary">
                                                    Draft
                                                </span>

                                            @endif

                                        </div>


                                        <hr>


                                        <div class="row g-3">

                                            <div class="col-sm-6">

                                                <div class="text-muted small">
                                                    Product Type
                                                </div>

                                                <div class="fw-semibold">
                                                    {{ $techPack->product_type ?: 'N/A' }}
                                                </div>

                                            </div>


                                            <div class="col-sm-6">

                                                <div class="text-muted small">
                                                    Fabric
                                                </div>

                                                <div class="fw-semibold">
                                                    {{ $techPack->fabric ?: 'N/A' }}
                                                </div>

                                            </div>


                                            <div class="col-sm-6">

                                                <div class="text-muted small">
                                                    GSM
                                                </div>

                                                <div class="fw-semibold">
                                                    {{ $techPack->gsm ?: 'N/A' }}
                                                </div>

                                            </div>


                                            <div class="col-sm-6">

                                                <div class="text-muted small">
                                                    Color
                                                </div>

                                                <div class="fw-semibold">
                                                    {{ $techPack->color ?: 'N/A' }}
                                                </div>

                                            </div>


                                            <div class="col-sm-6">

                                                <div class="text-muted small">
                                                    Size Range
                                                </div>

                                                <div class="fw-semibold">
                                                    {{ $techPack->size_range ?: 'N/A' }}
                                                </div>

                                            </div>


                                            <div class="col-sm-6">

                                                <div class="text-muted small">
                                                    Created
                                                </div>

                                                <div>
                                                    {{ $techPack->created_at?->format('d M Y') ?? 'N/A' }}
                                                </div>

                                            </div>

                                        </div>


                                        @if($techPack->notes)

                                            <div class="mt-3">

                                                <div class="text-muted small">
                                                    Notes
                                                </div>

                                                <div>
                                                    {{ $techPack->notes }}
                                                </div>

                                            </div>

                                        @endif

                                    </div>


                                    {{-- =================================================
                                        DOCUMENTS
                                    ================================================== --}}

                                    <div class="col-md-4">

                                        <div class="border rounded p-3 bg-light h-100">

                                            <h6 class="mb-3">

                                                <i class="bi bi-paperclip me-1"></i>
                                                Documents

                                            </h6>


                                            @if($techPack->file_path)

                                                <div class="d-flex align-items-center mb-3">

                                                    <i class="bi bi-file-earmark-pdf text-danger fs-3 me-2"></i>

                                                    <div>

                                                        <div class="fw-semibold">
                                                            Tech Pack PDF
                                                        </div>

                                                        <small class="text-muted">
                                                            PDF Document
                                                        </small>

                                                    </div>

                                                </div>


                                                <div class="d-grid gap-2">

                                                    <a
                                                        href="{{ asset('storage/' . $techPack->file_path) }}"
                                                        target="_blank"
                                                        class="btn btn-danger btn-sm"
                                                    >

                                                        <i class="bi bi-eye me-1"></i>
                                                        Preview PDF

                                                    </a>


                                                    <a
                                                        href="{{ asset('storage/' . $techPack->file_path) }}"
                                                        download
                                                        class="btn btn-outline-secondary btn-sm"
                                                    >

                                                        <i class="bi bi-download me-1"></i>
                                                        Download PDF

                                                    </a>

                                                </div>

                                            @else

                                                <div class="text-muted small mb-3">

                                                    <i class="bi bi-file-earmark-x me-1"></i>

                                                    No PDF uploaded.

                                                </div>

                                            @endif


                                            <hr>


                                            <div class="d-flex gap-2">

                                                <a
                                                    href="{{ route('tech-packs.show', $techPack->id) }}"
                                                    class="btn btn-sm btn-light border flex-fill"
                                                >

                                                    <i class="bi bi-eye me-1"></i>
                                                    View

                                                </a>


                                                <a
                                                    href="{{ route('tech-packs.edit', $techPack->id) }}"
                                                    class="btn btn-sm btn-light border flex-fill"
                                                >

                                                    <i class="bi bi-pencil me-1"></i>
                                                    Edit

                                                </a>

                                            </div>


                                            <form
                                                action="{{ route('tech-packs.destroy', $techPack->id) }}"
                                                method="POST"
                                                class="mt-2"
                                                onsubmit="return confirm('Are you sure you want to delete this Tech Pack?');"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-outline-danger btn-sm w-100"
                                                >

                                                    <i class="bi bi-trash me-1"></i>
                                                    Delete Tech Pack

                                                </button>

                                            </form>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="text-center py-4">

                    <i class="bi bi-file-earmark-text fs-1 text-muted"></i>

                    <h6 class="mt-3">
                        No Tech Pack Found
                    </h6>

                    <p class="text-muted mb-0">
                        Add the first Tech Pack for this style.
                    </p>

                </div>

            @endif


            {{-- =================================================
                ADD TECH PACK FORM
            ================================================== --}}

            <div
                id="add-tech-pack"
                class="border rounded mt-4 p-4 bg-light"
            >

                <div class="mb-4">

                    <h5 class="mb-1">

                        <i class="bi bi-plus-circle me-1"></i>
                        Add Tech Pack

                    </h5>

                    <p class="text-muted mb-0">
                        Add technical specifications, image and PDF.
                    </p>

                </div>


                <form
                    id="techPackForm"
                    action="{{ route('tech-packs.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >

                    @csrf

                    <input
                        type="hidden"
                        name="style_id"
                        value="{{ $style->id }}"
                    >


                    <div class="row g-3">

                        {{-- =================================================
                            TECH PACK NO
                        ================================================== --}}

                        <div class="col-md-6">

                            <label class="form-label">
                                Tech Pack No
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="tech_pack_no"
                                class="form-control @error('tech_pack_no') is-invalid @enderror"
                                value="{{ old('tech_pack_no') }}"
                                placeholder="Example: TP-001"
                                required
                            >

                            @error('tech_pack_no')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- =================================================
                            VERSION
                        ================================================== --}}

                        <div class="col-md-6">

                            <label class="form-label">
                                Version
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="version"
                                class="form-control @error('version') is-invalid @enderror"
                                value="{{ old('version', '1.0') }}"
                                placeholder="Example: 1.0"
                                required
                            >

                            @error('version')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- =================================================
                            PRODUCT TYPE
                        ================================================== --}}

                        <div class="col-md-6">

                            <label class="form-label">
                                Product Type
                            </label>

                            <input
                                type="text"
                                name="product_type"
                                class="form-control"
                                value="{{ old('product_type') }}"
                                placeholder="Example: T-Shirt"
                            >

                        </div>


                        {{-- =================================================
                            FABRIC
                        ================================================== --}}

                        <div class="col-md-6">

                            <label class="form-label">
                                Fabric
                            </label>

                            <input
                                type="text"
                                name="fabric"
                                class="form-control"
                                value="{{ old('fabric') }}"
                                placeholder="Example: 100% Cotton"
                            >

                        </div>


                        {{-- =================================================
                            GSM
                        ================================================== --}}

                        <div class="col-md-4">

                            <label class="form-label">
                                GSM
                            </label>

                            <input
                                type="text"
                                name="gsm"
                                class="form-control"
                                value="{{ old('gsm') }}"
                                placeholder="Example: 180 GSM"
                            >

                        </div>


                        {{-- =================================================
                            COLOR
                        ================================================== --}}

                        <div class="col-md-4">

                            <label class="form-label">
                                Color
                            </label>

                            <input
                                type="text"
                                name="color"
                                class="form-control"
                                value="{{ old('color') }}"
                                placeholder="Example: Navy Blue"
                            >

                        </div>


                        {{-- =================================================
                            SIZE RANGE
                        ================================================== --}}

                        <div class="col-md-4">

                            <label class="form-label">
                                Size Range
                            </label>

                            <input
                                type="text"
                                name="size_range"
                                class="form-control"
                                value="{{ old('size_range') }}"
                                placeholder="Example: S - XXL"
                            >

                        </div>


                        {{-- =================================================
                            CONSTRUCTION
                        ================================================== --}}

                        <div class="col-md-6">

                            <label class="form-label">
                                Construction
                            </label>

                            <textarea
                                name="construction"
                                class="form-control"
                                rows="3"
                                placeholder="Construction details..."
                            >{{ old('construction') }}</textarea>

                        </div>


                        {{-- =================================================
                            WASHING
                        ================================================== --}}

                        <div class="col-md-6">

                            <label class="form-label">
                                Washing
                            </label>

                            <textarea
                                name="washing"
                                class="form-control"
                                rows="3"
                                placeholder="Washing instructions..."
                            >{{ old('washing') }}</textarea>

                        </div>


                        {{-- =================================================
                            STATUS
                        ================================================== --}}

                        <div class="col-md-4">

                            <label class="form-label">

                                Status
                                <span class="text-danger">*</span>

                            </label>

                            <select
                                name="status"
                                class="form-select"
                                required
                            >

                                <option value="draft"
                                    {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>
                                    Draft
                                </option>

                                <option value="pending"
                                    {{ old('status') === 'pending' ? 'selected' : '' }}>
                                    Pending
                                </option>

                                <option value="approved"
                                    {{ old('status') === 'approved' ? 'selected' : '' }}>
                                    Approved
                                </option>

                                <option value="rejected"
                                    {{ old('status') === 'rejected' ? 'selected' : '' }}>
                                    Rejected
                                </option>

                            </select>

                        </div>


                        {{-- =================================================
                            IMAGE UPLOAD
                        ================================================== --}}

                        <div class="col-md-4">

                            <label for="techPackImage"
                                   class="form-label">

                                Tech Pack Image

                            </label>

                            <input
                                type="file"
                                name="image"
                                id="techPackImage"
                                class="form-control @error('image') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                            >

                            <small class="text-muted">
                                JPG, JPEG, PNG, WEBP — Maximum 20MB
                            </small>

                            @error('image')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                            <div id="imageClientError"
                                 class="text-danger small mt-1 d-none">
                            </div>

                        </div>


                        {{-- =================================================
                            PDF UPLOAD
                        ================================================== --}}

                        <div class="col-md-4">

                            <label for="techPackPdf"
                                   class="form-label">

                                Tech Pack PDF

                            </label>

                            <input
                                type="file"
                                name="pdf"
                                id="techPackPdf"
                                class="form-control @error('pdf') is-invalid @enderror"
                                accept=".pdf,application/pdf"
                            >

                            <small class="text-muted">
                                PDF only — Maximum 20MB
                            </small>

                            @error('pdf')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                            <div id="pdfClientError"
                                 class="text-danger small mt-1 d-none">
                            </div>

                        </div>


                        {{-- =================================================
                            IMAGE PREVIEW
                        ================================================== --}}

                        <div class="col-md-6">

                            <div id="imagePreviewContainer"
                                 class="d-none">

                                <label class="form-label">
                                    Image Preview
                                </label>

                                <div class="border rounded p-2 bg-white">

                                    <img
                                        id="imagePreview"
                                        src=""
                                        alt="Image Preview"
                                        class="img-fluid rounded"
                                        style="max-height:250px; width:100%; object-fit:contain;"
                                    >

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                            PDF PREVIEW
                        ================================================== --}}

                        <div class="col-md-6">

                            <div id="pdfPreviewContainer"
                                 class="d-none">

                                <label class="form-label">
                                    Selected PDF
                                </label>

                                <div class="border rounded p-3 bg-white">

                                    <div class="d-flex align-items-center">

                                        <i class="bi bi-file-earmark-pdf text-danger fs-2 me-2"></i>

                                        <div>

                                            <div id="pdfFileName"
                                                 class="fw-semibold">
                                            </div>

                                            <small id="pdfFileSize"
                                                   class="text-muted">
                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                            NOTES
                        ================================================== --}}

                        <div class="col-12">

                            <label class="form-label">
                                Notes
                            </label>

                            <textarea
                                name="notes"
                                class="form-control"
                                rows="3"
                                placeholder="Additional notes..."
                            >{{ old('notes') }}</textarea>

                        </div>


                        {{-- =================================================
                            SUBMIT
                        ================================================== --}}

                        <div class="col-12">

                            <hr>

                            <div class="d-flex justify-content-end gap-2">

                                <button
                                    type="reset"
                                    class="btn btn-light border"
                                    id="resetTechPackBtn"
                                >

                                    <i class="bi bi-arrow-counterclockwise me-1"></i>
                                    Reset

                                </button>


                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                    id="saveTechPackBtn"
                                >

                                    <i class="bi bi-save me-1"></i>
                                    Save Tech Pack

                                </button>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     JAVASCRIPT
========================================================== --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const MAX_IMAGE_SIZE = 20 * 1024 * 1024;
    const MAX_PDF_SIZE   = 20 * 1024 * 1024;

    const imageInput = document.getElementById('techPackImage');
    const imagePreview = document.getElementById('imagePreview');
    const imageContainer = document.getElementById('imagePreviewContainer');
    const imageClientError = document.getElementById('imageClientError');

    const pdfInput = document.getElementById('techPackPdf');
    const pdfContainer = document.getElementById('pdfPreviewContainer');
    const pdfFileName = document.getElementById('pdfFileName');
    const pdfFileSize = document.getElementById('pdfFileSize');
    const pdfClientError = document.getElementById('pdfClientError');

    const form = document.getElementById('techPackForm');
    const submitButton = document.getElementById('saveTechPackBtn');
    const resetButton = document.getElementById('resetTechPackBtn');


    function formatFileSize(bytes)
    {
        if (bytes < 1024) {
            return bytes + ' B';
        }

        if (bytes < 1024 * 1024) {
            return (bytes / 1024).toFixed(2) + ' KB';
        }

        return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
    }


    /*
    |--------------------------------------------------------------------------
    | IMAGE UPLOAD
    |--------------------------------------------------------------------------
    */

    if (imageInput) {

        imageInput.addEventListener('change', function () {

            const file = imageInput.files[0];

            imageClientError.classList.add('d-none');
            imageClientError.textContent = '';

            imageContainer.classList.add('d-none');
            imagePreview.src = '';


            if (!file) {
                return;
            }


            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp'
            ];


            if (!allowedTypes.includes(file.type)) {

                imageClientError.textContent =
                    'Please select a JPG, JPEG, PNG or WEBP image.';

                imageClientError.classList.remove('d-none');

                imageInput.value = '';

                return;
            }


            if (file.size > MAX_IMAGE_SIZE) {

                imageClientError.textContent =
                    'Image is too large. Maximum allowed size is 20MB.';

                imageClientError.classList.remove('d-none');

                imageInput.value = '';

                return;
            }


            const reader = new FileReader();


            reader.onload = function (event) {

                imagePreview.src = event.target.result;

                imageContainer.classList.remove('d-none');

            };


            reader.onerror = function () {

                imageClientError.textContent =
                    'Unable to preview this image. Please choose another image.';

                imageClientError.classList.remove('d-none');

            };


            reader.readAsDataURL(file);

        });

    }


    /*
    |--------------------------------------------------------------------------
    | PDF UPLOAD
    |--------------------------------------------------------------------------
    */

    if (pdfInput) {

        pdfInput.addEventListener('change', function () {

            const file = pdfInput.files[0];

            pdfClientError.classList.add('d-none');
            pdfClientError.textContent = '';

            pdfContainer.classList.add('d-none');
            pdfFileName.textContent = '';
            pdfFileSize.textContent = '';


            if (!file) {
                return;
            }


            if (
                file.type !== 'application/pdf' &&
                !file.name.toLowerCase().endsWith('.pdf')
            ) {

                pdfClientError.textContent =
                    'Please select a valid PDF file.';

                pdfClientError.classList.remove('d-none');

                pdfInput.value = '';

                return;
            }


            if (file.size > MAX_PDF_SIZE) {

                pdfClientError.textContent =
                    'PDF is too large. Maximum allowed size is 20MB.';

                pdfClientError.classList.remove('d-none');

                pdfInput.value = '';

                return;
            }


            pdfFileName.textContent = file.name;

            pdfFileSize.textContent =
                formatFileSize(file.size);


            pdfContainer.classList.remove('d-none');

        });

    }


    /*
    |--------------------------------------------------------------------------
    | FORM SUBMIT VALIDATION
    |--------------------------------------------------------------------------
    */

    if (form) {

        form.addEventListener('submit', function (event) {

            let hasError = false;


            if (imageInput && imageInput.files.length > 0) {

                const imageFile = imageInput.files[0];

                if (imageFile.size > MAX_IMAGE_SIZE) {

                    event.preventDefault();

                    imageClientError.textContent =
                        'Image is too large. Maximum allowed size is 20MB.';

                    imageClientError.classList.remove('d-none');

                    hasError = true;
                }

            }


            if (pdfInput && pdfInput.files.length > 0) {

                const pdfFile = pdfInput.files[0];

                if (pdfFile.size > MAX_PDF_SIZE) {

                    event.preventDefault();

                    pdfClientError.textContent =
                        'PDF is too large. Maximum allowed size is 20MB.';

                    pdfClientError.classList.remove('d-none');

                    hasError = true;
                }

            }


            if (hasError) {
                return;
            }


            if (submitButton) {

                submitButton.disabled = true;

                submitButton.innerHTML =
                    '<span class="spinner-border spinner-border-sm me-1"></span>' +
                    'Uploading...';

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | RESET
    |--------------------------------------------------------------------------
    */

    if (resetButton) {

        resetButton.addEventListener('click', function () {

            setTimeout(function () {

                imageContainer.classList.add('d-none');

                imagePreview.src = '';

                imageClientError.classList.add('d-none');
                imageClientError.textContent = '';

                pdfContainer.classList.add('d-none');

                pdfFileName.textContent = '';
                pdfFileSize.textContent = '';

                pdfClientError.classList.add('d-none');
                pdfClientError.textContent = '';

                if (submitButton) {

                    submitButton.disabled = false;

                    submitButton.innerHTML =
                        '<i class="bi bi-save me-1"></i>' +
                        'Save Tech Pack';

                }

            }, 50);

        });

    }

});

</script>

@endsection