@extends('admin.layouts.master')

@section('title', 'Products')


@section('content')
    {{-- @php
    echo "
    <pre>";
                print_r($users);
                echo "</pre>";
    @endphp --}}
    <x-admin.phead title="Products" subtitle="Manage your users from this page.">
        <a href="{{ route('products.create') }}" class="btn-custom btn-custom-secondary fw-bold" type="button">
            <i class="bi bi-plus"></i> Add Product
        </a>
    </x-admin.phead>
    @if (session('success'))
        <div>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <!-- START: Basic Table Card Container -->
    <div class="table-card-custom">
<div class="table-header-control">
            <form action=" {{ route('products.index') }}" class="d-flex flex-md-nowrap flex-wrap gap-2">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="search" name="search" value="{{ request('search') }}" class="form-control form-control-custom" placeholder="Search products...">
                </div>
                <div class="input-group">
                    <label class="input-group-text"><i class="bi bi-funnel me-1"></i> Category</label>
                    <select class="form-select" name='category_id' id="inputGroupSelect01">
                        <option selected="" disabled>Choose...</option>

                        @foreach ($categories as $item) 
                            <option value="{{ $item->id }}" @selected(request('category_id') == $item->id)>{{ $item->name }}</option>
                            
                        @endforeach
                    
                       
                    </select>
                </div>
                <div class="input-group">
                    <label class="input-group-text"><i class="bi bi-funnel me-1"></i> Brand</label>
                    <select class="form-select" name='brand_id' id="inputGroupSelect01">
                        <option selected="" disabled>Choose...</option>
                        @foreach ($brands as $item) 
                            <option value="{{ $item->id }}" @selected(request('brand_id') == $item->id)>{{ $item->name }}</option>
                            
                        @endforeach
                  
                      
                    </select>
                </div>
                <!-- Action buttons / Filter options -->
                <div class="table-filter-group">
                    <button class="btn-table-action" type="submit">
                        Search <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <a href="{{ route('products.index') }}" class="btn-table-action text-nowrap">Clear Filter</a>
            </form>
        </div>
    
        </div>

        <!-- Responsive Table Wrapper -->
        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>category</th>
                        <th>brand</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>

                              <div class="d-flex align-items-center gap-3">
                                    @if ($item->image)
                                        <img src="{{ $item->image }}" alt="" class="rounded-3" width="60" height="60">
                                    @else
                                        <img src="https://fastly.picsum.photos/id/237/200/300.jpg?hmac=TmmQSbShHz9CdQm0NkEjx1Dyh_Y984R9LpNrpvH2D_U" alt="" class="rounded-3" width="60" height="60">
                                    @endif
                                    <div>
                                        <h5 class="mb-0 fw-normal">{{ $item->name }}</h5>
                                        <p class="mb-0 text-muted">{{ $item->id }}</p>
                                    </div>
                                </div>
                               {{ $item->name }}
                            </td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->brand->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                <span class="badge border {{ $item->active == 1 ? 'border-success text-success' : 'border-danger text-danger'}}" >
                                    {{ $item->active == 1 ? 'Active' : 'Not Active'}}</span>

                                </span>
                            </td>
                            
                            <td>
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('products.show', ['product' => $item->id]) }}" class="table-btn-action"
                                        title="View details"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('products.edit', ['product' => $item->id]) }}" class="table-btn-action"
                                        title="Edit"><i class="bi bi-pencil"></i></a>
                                    {{-- <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="table-btn-action btn-delete" title="Delete"
                                            data-bs-toggle="modal" data-bs-target="#modalDelete" data-id="{{ $user->id }}"
                                            data-name="{{ $user->name }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form> --}}
                                    <button type="button" class="table-btn-action delete" title="Delete" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete" data-id="{{ $item->id }}" data-name="{{ $item->name }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        @empty
                        <tr>
                         <td colspan="8" class="text-center">No data found</td></td>
                        </tr>   

                    @endforelse


                </tbody>
            </table>
        </div>

        <!-- Footer Controls / Pagination -->
        <div class="table-footer-control">
            {{-- {{ $users->links() }} --}}
        </div>
    </div>
    <!-- END: Basic Table Card Container -->
    <x-admin.modal id="modalDelete" title="Delete User">
        <div class="text-center">
            <i class="bi bi-trash fs-1 text-danger"></i>
            <p class="mt-2">Are you sure you want to delete this user?</p>
            <span class=" name fw-bold badge border border-danger text-danger py-2 px-3">Mina</span>
            <hr>
            <form method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-outline-secondary me-1" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </x-admin.modal>
@endsection
@section('style')
    <style>
        .table-footer-control nav {
            width: 100%;
        }

        .table-footer-control nav div:last-child {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    </style>
@endsection

@section('script')
    <script>
        document.querySelectorAll('.delete').forEach(button => {
            button.addEventListener('click', function(){
                let id = this.dataset.id;
                let name = this.dataset.name;
                // alert(id);
                // document.querySelector('#modalDelete form').action = '{{ route('users.destroy', ['user' => '__id']) }}' ;
                document.querySelector('#modalDelete form').action = `{{ route('products.destroy', ['product' => '__id']) }}`.replace('__id', id);
                document.querySelector('#modalDelete .name').innerText = name;
            })
        })
    </script>
@endsection