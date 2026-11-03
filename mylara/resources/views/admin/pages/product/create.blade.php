
@extends('admin.layouts.master')

@section('title', 'Products')

@section('content')

    <x-admin.phead title="Create Product" subtitle="Create a new product.">
        <a href="{{ route('products.index') }}"
           class="btn-custom btn-custom-secondary fw-bold"
           type="button">
            <i class="bi bi-arrow-left"></i> Back to Product List
        </a>
    </x-admin.phead>

    <div>

        <form action="{{ route('products.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row g-3">

                {{-- Product Name --}}
                <div class="col-lg-4 col-sm-6 col-12">
                    <label for="basicText" class="form-label-custom">
                        Name
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control-custom"
                           id="basicText"
                           placeholder="Enter product name"
                           value="{{ old('name') }}">

                    <x-admin.error-msg name="name" />
                </div>


                {{-- Price --}}
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">
                        Price
                    </label>

                    <input type="number"
                           name="price"
                           class="form-control-custom"
                           placeholder="Enter price"
                           step="0.01"
                           min="0"
                           value="{{ old('price') }}">

                    <x-admin.error-msg name="price" />
                </div>


                {{-- Quantity --}}
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">
                        Quantity
                    </label>

                    <input type="number"
                           name="quantity"
                           class="form-control-custom"
                           placeholder="Enter quantity"
                           min="0"
                           value="{{ old('quantity') }}">

                    <x-admin.error-msg name="quantity" />
                </div>


                {{-- Reorder Level --}}
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">
                        Reorder Level
                    </label>

                    <input type="number"
                           name="reorder_level"
                           class="form-control-custom"
                           placeholder="Enter reorder level"
                           min="0"
                           value="{{ old('reorder_level') }}">

                    <x-admin.error-msg name="reorder_level" />
                </div>


                {{-- Category --}}
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">
                        Category
                    </label>

                    <select name="category_id"
                            class="form-select-custom">

                        <option value="" disabled
                            {{ old('category_id') ? '' : 'selected' }}>
                            Select one...
                        </option>

                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}"
                                @selected(old('category_id') == $item->id)>
                                {{ $item->name }}
                            </option>
                        @endforeach

                    </select>

                    <x-admin.error-msg name="category_id" />
                </div>


                {{-- Brand --}}
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">
                        Brand
                    </label>

                    <select name="brand_id"
                            class="form-select-custom">

                        <option value="" disabled
                            {{ old('brand_id') ? '' : 'selected' }}>
                            Select one...
                        </option>

                        @foreach ($brands as $item)
                            <option value="{{ $item->id }}"
                                @selected(old('brand_id') == $item->id)>
                                {{ $item->name }}
                            </option>
                        @endforeach

                    </select>

                    <x-admin.error-msg name="brand_id" />
                </div>


                {{-- Description --}}
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">
                        Description
                    </label>

                    <textarea name="description"
                              class="form-control"
                              rows="3"
                              placeholder="Enter product description">{{ old('description') }}</textarea>

                    <x-admin.error-msg name="description" />
                </div>


                {{-- Image --}}
                <div class="col-lg-4 col-sm-6 col-12">
                    <label for="productImage"
                           class="form-label-custom">
                        Product Image
                    </label>

                    <input type="file"
                           name="image"
                           id="productImage"
                           class="form-control-custom"
                           accept="image/jpeg,image/png,image/jpg,image/webp">

                    <x-admin.error-msg name="image" />

                    {{-- Image Preview --}}
                    <div class="mt-2">
                        <img id="imagePreview"
                             src=""
                             alt="Image Preview"
                             style="display:none; width:100px; height:100px; object-fit:cover; border-radius:8px;">
                    </div>
                </div>


                {{-- Active --}}
                <div class="col-lg-4 col-sm-6 col-12">

                    <div class="form-switch-custom">

                        <input class="form-switch-input-custom"
                               type="checkbox"
                               id="switchOne"
                               name="active"
                               value="1"
                               {{ old('active', 1) ? 'checked' : '' }}>

                        <label class="form-switch-label"
                               for="switchOne">
                            Active
                        </label>

                    </div>

                    <x-admin.error-msg name="active" />

                </div>

            </div>


            {{-- Submit --}}
            <div class="mb-3 text-end mt-4">

                <button type="submit"
                        class="btn-custom btn-custom-secondary">
                    <i class="bi bi-check-lg"></i>
                    Save Product
                </button>

            </div>

        </form>

    </div>

@endsection


@section('script')

<script>
    document.getElementById('productImage').addEventListener('change', function (event) {

        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');

        if (file) {

            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(file);

        } else {

            preview.src = '';
            preview.style.display = 'none';

        }

    });
</script>

@endsection

