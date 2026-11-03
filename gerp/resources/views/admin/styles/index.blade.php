@extends('admin.master')

@section('content')

<div class="container-fluid">

{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1 fw-bold">Styles</h2>
        <p class="text-muted mb-0">Manage all garment styles</p>
    </div>

    <a href="{{ route('styles.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i>
        Add Style
    </a>
</div>


{{-- Search & Filter Card --}}
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">

        <form action="{{ route('styles.index') }}" method="GET">

            <div class="row g-3 align-items-end">

                {{-- Search --}}
                <div class="col-md-5">
                    <label class="form-label fw-semibold">
                        Search Style
                    </label>

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Search style name or style no..."
                        value="{{ request('search') }}"
                    >
                </div>


                {{-- Status --}}
                <div class="col-md-3">
                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <select name="status" class="form-select">

                        <option value="">All Status</option>

                        <option value="active"
                            {{ request('status') == 'active' ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="inactive"
                            {{ request('status') == 'inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>
                </div>


                {{-- Search Button --}}
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search"></i>
                        Search
                    </button>
                </div>


                {{-- Reset --}}
                <div class="col-md-2">
                    <a href="{{ route('styles.index') }}"
                       class="btn btn-light border w-100">
                        <i class="bi bi-arrow-clockwise"></i>
                        Reset
                    </a>
                </div>

            </div>

        </form>

    </div>
</div>


{{-- Styles Table --}}
<div class="card shadow-sm border-0">

    <div class="card-header bg-white border-0 py-3">

        <div class="d-flex justify-content-between align-items-center">

            <h5 class="mb-0 fw-bold">
                Style List
            </h5>

            <span class="text-muted">
                Total:
                <strong>{{ $styles->total() }}</strong>
            </span>

        </div>

    </div>


    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>
                        <th class="ps-4">#</th>
                        <th>Style Name</th>
                        <th>Style No</th>
                        <th>Buyer</th>
                        <th>Season</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>

                </thead>


                <tbody>

                    @forelse($styles as $key => $style)

                        <tr>

                            {{-- Serial --}}
                            <td class="ps-4">
                                {{ $styles->firstItem() + $key }}
                            </td>


                            {{-- Style Name --}}
                            <td>
                                <div class="fw-semibold">
                                    {{ $style->style_name }}
                                </div>
                            </td>


                            {{-- Style Number --}}
                            <td>
                                <span class="badge bg-light text-dark border">
                                    {{ $style->style_no }}
                                </span>
                            </td>


                            {{-- Buyer --}}
                            <td>
                                {{ $style->buyer->name ?? '-' }}
                            </td>


                            {{-- Season --}}
                            <td>
                                {{ $style->season ?? '-' }}
                            </td>


                            {{-- Status --}}
                            <td>

                                @if($style->status === 'active')

                                    <span class="badge bg-success-subtle text-success">
                                        <i class="bi bi-check-circle me-1"></i>
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-danger-subtle text-danger">
                                        <i class="bi bi-x-circle me-1"></i>
                                        Inactive
                                    </span>

                                @endif

                            </td>


                            {{-- Actions --}}
                            <td>

                                <div class="d-flex justify-content-center gap-1">

                                    {{-- View --}}
                                    <a href="{{ route('styles.show', $style->id) }}"
                                       class="btn btn-sm btn-light border"
                                       title="View">

                                        <i data-feather="eye"></i>

                                    </a>


                                    {{-- Edit --}}
                                    <a href="{{ route('styles.edit', $style->id) }}"
                                       class="btn btn-sm btn-light border"
                                       title="Edit">

                                        <i data-feather="edit-2"></i>

                                    </a>


                                    {{-- Delete --}}
                                    <form
                                        action="{{ route('styles.destroy', $style->id) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this style?');"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-light border text-danger"
                                            title="Delete"
                                        >

                                            <i data-feather="trash-2"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center py-5">

                                <div class="text-muted">

                                    <i class="bi bi-inbox fs-2 d-block mb-2"></i>

                                    <h6>No styles found</h6>

                                    <p class="mb-0">
                                        There are no garment styles available.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- Pagination --}}
    @if($styles->hasPages())

        <div class="card-footer bg-white border-0">

            <div class="d-flex justify-content-end">

                {{ $styles->withQueryString()->links() }}

            </div>

        </div>

    @endif

</div>


</div>

@endsection
