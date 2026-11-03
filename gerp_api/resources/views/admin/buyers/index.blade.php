@extends('admin.master')

@section('content')

<div class="container-fluid p-0">

```
{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h1 class="h3 mb-1">Buyers</h1>
        <p class="text-muted mb-0">Manage all garment buyers</p>
    </div>

    <a href="{{ route('buyers.create') }}" class="btn btn-primary">
        <i data-feather="plus"></i>
        Add Buyer
    </a>
</div>

{{-- Success Message --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>
    </div>
@endif

{{-- Error Message --}}
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>
    </div>
@endif

{{-- Search --}}
<div class="card mb-3">
    <div class="card-body">

        <form action="{{ route('buyers.index') }}" method="GET">

            <div class="row g-2">

                <div class="col-md-5">
                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Search buyer, company, email or phone..."
                        value="{{ request('search') }}"
                    >
                </div>

                <div class="col-md-3">
                    <select name="status" class="form-select">

                        <option value="">All Status</option>

                        <option value="Active"
                            {{ request('status') == 'Active' ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="Inactive"
                            {{ request('status') == 'Inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i data-feather="search"></i>
                        Search
                    </button>
                </div>

                <div class="col-md-2">
                    <a href="{{ route('buyers.index') }}"
                       class="btn btn-light border w-100">
                        Reset
                    </a>
                </div>

            </div>

        </form>

    </div>
</div>

{{-- Buyers Table --}}
<div class="card">

    <div class="card-header">
        <div class="card-title mb-0">
            Buyer List
        </div>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Buyer</th>
                        <th>Company</th>
                        <th>Contact</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($buyers as $buyer)

                        <tr>

                            {{-- ID --}}
                            <td>
                                {{ $buyer->id }}
                            </td>

                            {{-- Buyer --}}
                            <td>
                                <strong>
                                    {{ $buyer->name }}
                                </strong>

                                @if($buyer->email)
                                    <div class="small text-muted">
                                        {{ $buyer->email }}
                                    </div>
                                @endif
                            </td>

                            {{-- Company --}}
                            <td>
                                {{ $buyer->company_name ?: '-' }}
                            </td>

                            {{-- Contact --}}
                            <td>
                                @if($buyer->phone)
                                    <div>
                                        {{ $buyer->phone }}
                                    </div>
                                @else
                                    -
                                @endif
                            </td>

                            {{-- Country --}}
                            <td>
                                {{ $buyer->country ?: '-' }}
                            </td>

                            {{-- Status --}}
                            <td>

                                @if($buyer->status === 'Active')

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        Inactive
                                    </span>

                                @endif

                            </td>

                            {{-- Actions --}}
                            <td class="text-end">

                                <div class="btn-group">

                                    {{-- View --}}
                                    <a href="{{ route('buyers.show', $buyer->id) }}"
                                       class="btn btn-sm btn-outline-info"
                                       title="View">
                                        <i data-feather="eye"></i>
                                    </a>

                                    {{-- Edit --}}
                                    <a href="{{ route('buyers.edit', $buyer->id) }}"
                                       class="btn btn-sm btn-outline-primary"
                                       title="Edit">
                                        <i data-feather="edit-2"></i>
                                    </a>

                                    {{-- Delete --}}
                                    <form
                                        action="{{ route('buyers.destroy', $buyer->id) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this buyer?');"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-outline-danger"
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

                                    <i data-feather="users"
                                       style="width:40px;height:40px;">
                                    </i>

                                    <h5 class="mt-3">
                                        No buyers found
                                    </h5>

                                    <p class="mb-3">
                                        Start by adding your first buyer.
                                    </p>

                                    <a href="{{ route('buyers.create') }}"
                                       class="btn btn-primary">
                                        <i data-feather="plus"></i>
                                        Add Buyer
                                    </a>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- Pagination --}}
        @if($buyers->hasPages())

            <div class="d-flex justify-content-between align-items-center mt-3">

                <div class="text-muted small">
                    Showing
                    {{ $buyers->firstItem() }}
                    to
                    {{ $buyers->lastItem() }}
                    of
                    {{ $buyers->total() }}
                    buyers
                </div>

                <div>
                    {{ $buyers->withQueryString()->links() }}
                </div>

            </div>

        @endif

    </div>

</div>
```

</div>

@endsection

@push('scripts')

<script>
    if (typeof feather !== 'undefined') {
        feather.replace();
    }
</script>

@endpush
