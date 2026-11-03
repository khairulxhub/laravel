@extends('admin.layouts.master')

@section('title', 'Users')

@section('content')

    <x-admin.phead title="Users - Edit" subtitle="Update this  information.">
        @if (auth()->user()->role_id != 5)
            <a href="{{ route('users.index') }}" class="btn-custom btn-custom-secondary fw-bold" type="button">
                <i class="bi bi-arrow-left"></i> Back to Product List
            </a>
        @endif
    </x-admin.phead>

    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="row">

            {{-- Name --}}
            <div class="col-md-4 mb-3">
                <label class="form-label-custom">Name</label>

                <input type="text" name="name" class="form-control-custom" placeholder="Enter product name"
                    value="{{ old('name', $product->name) }}">

                <x-admin.error-msg name="name" />
            </div>


            {{-- Price --}}
            <div class="col-md-4 mb-3">
                <label class="form-label-custom">Price</label>

                <input type="number" step="0.01" name="price" class="form-control-custom" placeholder="Enter price"
                    value="{{ old('price', $product->price) }}">

                <x-admin.error-msg name="price" />
            </div>


            {{-- Qty --}}
            <div class="col-md-4 mb-3">
                <label class="form-label-custom">Qty</label>

                <input type="number" name="qty" class="form-control-custom" placeholder="Enter quantity"
                    value="{{ old('qty', $product->qty) }}">

                <x-admin.error-msg name="qty" />
            </div>


            {{-- Reorder Level --}}
            <div class="col-md-4 mb-3">
                <label class="form-label-custom">Reorder Level</label>

                <input type="number" name="reorder_level" class="form-control-custom" placeholder="Enter reorder level"
                    value="{{ old('reorder_level', $product->reorder_level) }}">

                <x-admin.error-msg name="reorder_level" />
            </div>


            {{-- Category --}}
            <div class="col-md-4 mb-3">
                <label class="form-label-custom">Category</label>

                <select name="category_id" class="form-select-custom">

                    <option value="" disabled>Select one...</option>

                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}" @selected(old('category_id', $product->category_id) == $item->id)>
                            {{ $item->name }}
                        </option>
                    @endforeach

                </select>

                <x-admin.error-msg name="category_id" />
            </div>


            {{-- Brand --}}
            <div class="col-md-4 mb-3">
                <label class="form-label-custom">Brands</label>

                <select name="brand_id" class="form-select-custom">

                    <option value="" disabled>Select one...</option>

                    @foreach ($brands as $item)
                        <option value="{{ $item->id }}" @selected(old('brand_id', $product->brand_id) == $item->id)>
                            {{ $item->name }}
                        </option>
                    @endforeach

                </select>

                <x-admin.error-msg name="brand_id" />
            </div>


            {{-- Description --}}
            <div class="col-md-4 mb-3">
                <label class="form-label-custom">Desc</label>

                <textarea name="desc" class="form-control-custom" rows="3" placeholder="Enter description">{{ old('desc', $product->desc) }}</textarea>

                <x-admin.error-msg name="desc" />
            </div>


            {{-- Image --}}
            <div class="col-md-4 mb-3">
                <label class="form-label-custom">Image</label>

                <input type="file" name="image" class="form-control-custom">

                <x-admin.error-msg name="image" />

                {{-- Current Image --}}
                @if ($product->image)
                    <div class="mt-2">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="100" height="100"
                            style="object-fit: cover; border-radius: 8px;">
                    </div>
                @endif

            </div>


            {{-- Active --}}
            <div class="col-md-4 mb-3 d-flex align-items-center">

                <div class="form-check form-switch">

                    <input class="form-check-input" type="checkbox" name="active" value="1" id="active"
                        @checked(old('active', $product->active))>

                    <label class="form-check-label" for="active">
                        Active
                    </label>

                </div>

            </div>

        </div>


        {{-- Update Button --}}
        <div class="mb-3 text-end">

            <button type="submit" class="btn-custom btn-custom-secondary">
                Update
            </button>

        </div>

    </form>

@endsection
