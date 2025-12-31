@extends('admin.app')
@section('title')
    Create Product
@endsection

@section('content')
<div class="container-fluid my-3">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-4">
            <!-- Left Side -->
            <div class="col-md-8 col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Create Product</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('products.index') }}">Products</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Create Product
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{ route('products.index') }}" class="add-new">
                            Products <i class="ms-1 ri-list-ordered-2"></i>
                        </a>
                    </div>
                    <div class="card-body custom-form">
                        <div class="row">

                            {{-- Product Name --}}
                            <div class="col-12 mb-3">
                                <label class="form-label custom-label">Product Name</label>
                                <input type="text" class="form-control custom-input" name="title"
                                    placeholder="Product Name" value="{{ old('title') }}">
                                @error('title')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Category --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label custom-label">Category</label>
                                <select name="category_id" id="category_id" class="form-select custom-input">
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Subcategory --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label custom-label">Subcategory</label>
                                <select name="subcategory_id" id="subcategory_id" class="form-select custom-input">
                                    <option value="">-- Select Subcategory --</option>
                                </select>
                                @error('subcategory_id')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Old Price --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label custom-label">Old Price</label>
                                <input type="number" step="0.01" class="form-control custom-input" name="old_price"
                                    placeholder="Old Price" value="{{ old('old_price') }}">
                                @error('old_price')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- New Price --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label custom-label">New Price</label>
                                <input type="number" step="0.01" class="form-control custom-input" name="new_price"
                                    placeholder="New Price" value="{{ old('new_price') }}">
                                @error('new_price')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div class="col-12 mb-3">
                                <label class="form-label custom-label">Description</label>
                                <textarea name="description" rows="4" class="form-control custom-input"
                                    placeholder="Write product details...">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side -->
            <div class="col-md-4 col-12">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="card table-card">
                            <div class="table-header">
                                <div class="table-title">Action</div>
                            </div>
                            <div class="custom-form card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn submit-button">
                                            Save
                                            <span class="ms-1 spinner-border spinner-border-sm d-none" role="status"></span>
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('products.index') }}" class="btn leave-button">Leave</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Product Image with live preview --}}
                    <div class="col-12 mb-3">
                        <div class="card table-card">
                            <div class="table-header">
                                <div class="table-title">Product Image</div>
                            </div>
                            <div class="custom-form card-body">
                                <div class="image-select-file">
                                    <label class="form-label custom-label" for="product_image">
                                        <input type="hidden" id="product_image_data" name="product_image_data">
                                        <input type="file"
                                            id="product_image"
                                            name="image"
                                            class="form-file-input form-control custom-input d-none"
                                            onchange="imageUpload(this)">
                                        <div class="user-image">
                                            <img id="product_imagePreview"
                                                src="{{ asset('images/default.jpg') }}"
                                                class="image-preview">
                                            <img id="product_imagePreviewNo"
                                                src="{{ asset('images/default.jpg') }}"
                                                class="image-preview d-none">
                                            <span class="formate-error product_imageerror"></span>
                                        </div>
                                        <span class="upload-btn">Upload Image</span>
                                    </label>
                                </div>

                                {{-- Remove button --}}
                                <div class="delete-btn mt-2 d-none remove-image"
                                    id="product_imageDelete"
                                    onclick="removeImage('product_image')">Remove image
                                </div>

                                @error('image')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('custom-scripts')
<script>
    $(function () {
        $('#category_id').on('change', function () {
            const catId = $(this).val();
            const subSelect = $('#subcategory_id');

            subSelect.html('<option value="">Loading...</option>');

            if (catId) {
                $.ajax({
                    url: "{{ route('categories.subcategories', ':id') }}".replace(':id', catId),
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        subSelect.empty().append('<option value="">-- Select Subcategory --</option>');
                        $.each(data, function (i, s) {
                            subSelect.append(`<option value="${s.id}">${s.name}</option>`);
                        });
                    },
                    error: function () {
                        subSelect.html('<option value="">Error loading subcategories</option>');
                    }
                });
            } else {
                subSelect.html('<option value="">-- Select Subcategory --</option>');
            }
        });

        // Submit button spinner
        $('.submit-button').on('click', function () {
            $(this).prop('disabled', true)
                   .find('.spinner-border').removeClass('d-none');
            $(this).closest('form').submit();
        });
    });
</script>




{{-- Image upload preview script --}}
<script>
    function imageUpload(input) {
        const id = input.id;
        const file = input.files[0];
        const errorBox = $('.' + id + 'error');

        if (!file) return;

        const ext = file.name.split('.').pop().toLowerCase();
        if (['jpg', 'jpeg', 'png', 'gif'].includes(ext)) {
            errorBox.hide();
            readURL(input, id);
            $('#' + id + 'Delete').removeClass('d-none');
        } else {
            errorBox.html('Select a jpg, jpeg, png or gif image.').show();
            resetImage(id);
        }
    }

    function readURL(input, id) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#' + id + 'Preview').attr('src', e.target.result).removeClass('d-none');
                $('#' + id + 'PreviewNo').addClass('d-none');
                $('#' + id + '_data').val(input.files[0].name);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeImage(id) {
        resetImage(id);
        $('#' + id).val(null);
    }

    function resetImage(id) {
        $('#' + id + 'Preview').addClass('d-none').attr('src', '');
        $('#' + id + 'PreviewNo').removeClass('d-none');
        $('#' + id + '_data').val('');
        $('#' + id + 'Delete').addClass('d-none');
    }
</script>
@endpush

