@extends('admin.app')
@section('title')
    Edit Product
@endsection

@push('custom-style')
    <style>
        .gallery-upload-wrapper {
            position: relative;
        }

        .gallery-upload-label {
            cursor: pointer;
            display: block;
        }

        .gallery-upload-box {
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            padding: 40px 20px;
            text-align: center;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .gallery-upload-label:hover .gallery-upload-box {
            border-color: #007bff;
            background-color: #e7f3ff;
        }

        .gallery-upload-label.dragover .gallery-upload-box {
            border-color: #007bff;
            background-color: #e7f3ff;
            transform: scale(1.02);
        }

        .upload-icon {
            font-size: 48px;
            color: #007bff;
        }

        .gallery-upload-box h5 {
            color: #333;
            font-weight: 600;
        }

        .existing-image-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            aspect-ratio: 1;
        }

        .existing-image-wrapper:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
        }

        .existing-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .existing-image-actions {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .existing-image-wrapper:hover .existing-image-actions {
            opacity: 1;
        }

        .gallery-image-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            aspect-ratio: 1;
        }

        .gallery-image-wrapper:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .gallery-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .gallery-image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 123, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-image-wrapper:hover .gallery-image-overlay {
            opacity: 1;
        }

        .image-number {
            background: #007bff;
            color: white;
            padding: 8px 12px;
            border-radius: 50%;
            font-weight: 600;
            font-size: 14px;
        }

        .formate-error {
            color: #dc3545;
            font-size: 14px;
            display: block;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid my-3">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-4">
                <!-- Left Side -->
                <div class="col-md-8 col-12">
                    <div class="card table-card">
                        <div class="card-header table-header">
                            <div class="title-with-breadcrumb">
                                <div class="table-title">Edit Product</div>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('products.index') }}">Products</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Edit Product
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
                                        placeholder="Product Name" value="{{ old('title', $product->title) }}">
                                    @error('title')
                                        <div class="error_msg">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Category --}}
                                <div class="col-12 mb-3">
                                    <label class="form-label custom-label">Category</label>
                                    <select name="category_id" id="category_id" class="form-select custom-input">
                                        <option value="" disabled>-- Select Category --</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}"
                                                {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="error_msg">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Tag --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label custom-label">Tag</label>
                                    <select name="tag" id="tag" class="form-select custom-input">
                                        <option value="">-- Select Tag --</option>
                                        <option value="featured" {{ old('tag', $product->tag) === 'featured' ? 'selected' : '' }}>Featured</option>
                                        <option value="popular" {{ old('tag', $product->tag) === 'popular' ? 'selected' : '' }}>Popular</option>
                                        <option value="limited" {{ old('tag', $product->tag) === 'limited' ? 'selected' : '' }}>Limited</option>
                                        <option value="sale" {{ old('tag', $product->tag) === 'sale' ? 'selected' : '' }}>Sale</option>
                                        <option value="new" {{ old('tag', $product->tag) === 'new' ? 'selected' : '' }}>New</option>
                                        <option value="general" {{ old('tag', $product->tag) === 'general' ? 'selected' : '' }}>General</option>
                                    </select>
                                    @error('tag')
                                        <div class="error_msg">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Unit --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label custom-label">Unit</label>
                                    <input type="text" class="form-control custom-input" name="unit"
                                        placeholder="e.g., kg, box, piece" value="{{ old('unit', $product->unit) }}">
                                    @error('unit')
                                        <div class="error_msg">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Old Price --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label custom-label">Old Price</label>
                                    <input type="number" step="0.01" class="form-control custom-input" name="old_price"
                                        placeholder="Old Price" value="{{ old('old_price', $product->old_price) }}">
                                    @error('old_price')
                                        <div class="error_msg">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- New Price --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label custom-label">New Price</label>
                                    <input type="number" step="0.01" class="form-control custom-input" name="new_price"
                                        placeholder="New Price" value="{{ old('new_price', $product->new_price) }}">
                                    @error('new_price')
                                        <div class="error_msg">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Description --}}
                                <div class="col-12 mb-3">
                                    <label class="form-label custom-label">Description</label>
                                    <textarea name="description" rows="4" class="form-control custom-input" placeholder="Write product details...">{{ old('description', $product->description) }}</textarea>
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
                                                Update
                                                <span class="ms-1 spinner-border spinner-border-sm d-none"
                                                    role="status"></span>
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
                                            <input type="file" id="product_image" name="image"
                                                class="form-file-input form-control custom-input d-none"
                                                onchange="imageUpload(this)">
                                            <div class="user-image">
                                                <img id="product_imagePreview"
                                                    src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default.jpg') }}"
                                                    class="image-preview">
                                                <img id="product_imagePreviewNo" src="{{ asset('images/default.jpg') }}"
                                                    class="image-preview {{ $product->image ? 'd-none' : '' }}">
                                                <span class="formate-error product_imageerror"></span>
                                            </div>
                                            <span class="upload-btn">Upload Image</span>
                                        </label>
                                    </div>

                                    {{-- Remove button --}}
                                    <div class="delete-btn mt-2 {{ $product->image ? '' : 'd-none' }} remove-image"
                                        id="product_imageDelete" onclick="removeImage('product_image')">Remove image
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

            <div class="row">

                {{-- Product Multiple Images --}}
                <div class="col-12 mb-3">
                    <div class="card table-card">
                        <div class="table-header">
                            <div class="table-title">Product Gallery Images</div>
                        </div>
                        <div class="custom-form card-body">
                            {{-- Display existing images --}}
                            @if ($product->images->count() > 0)
                                <div class="mb-4">
                                    <h6 class="mb-3">
                                        <i class="ri-images-line me-2"></i>
                                        Current Gallery
                                        <span class="badge bg-success">{{ $product->images->count() }}</span>
                                    </h6>
                                    <div class="row g-3" id="existingImagesContainer">
                                        @foreach ($product->images as $image)
                                            <div class="col-lg-3 col-md-4 col-6 existing-image-item"
                                                data-image-id="{{ $image->id }}">
                                                <div class="existing-image-wrapper">
                                                    <img src="{{ asset('storage/' . $image->image_path) }}"
                                                        class="img-fluid" alt="Product Image">
                                                    <div class="existing-image-actions">
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            onclick="deleteExistingImage(this, {{ $image->id }})"
                                                            title="Delete image">
                                                            <i class="ri-delete-bin-line"></i> Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                            @endif

                            {{-- Add more images section --}}
                            <div class="gallery-upload-wrapper">
                                <input type="file" id="product_images" name="images[]" class="form-file-input d-none"
                                    multiple accept="image/*" onchange="handleMultipleImages(this)">

                                <label for="product_images" class="gallery-upload-label">
                                    <div class="gallery-upload-box">
                                        <div class="upload-icon mb-3">
                                            <i class="ri-add-circle-line"></i>
                                        </div>
                                        <h5 class="mb-2">Click to add more images</h5>
                                        <p class="text-muted mb-0">
                                            <small>or drag and drop<br>
                                                JPG, PNG, GIF or WEBP (Max 2MB each)
                                            </small>
                                        </p>
                                    </div>
                                </label>

                                <span class="formate-error product_imageserror mt-2" style="display: none;"></span>
                            </div>

                            {{-- New images preview --}}
                            <div id="product_imagesPreview" class="mt-4 d-none">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="mb-0">
                                        <i class="ri-eye-line me-2"></i>
                                        New Images Preview
                                        <span class="badge bg-primary ms-2" id="imageCountBadge">0</span>
                                    </h6>
                                </div>
                                <div id="imagesPreviewContainer" class="row g-3"></div>
                            </div>

                            @error('images')
                                <div class="error_msg">{{ $message }}</div>
                            @enderror
                            @error('images.*')
                                <div class="error_msg">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
        </form>

        {{-- Hidden form for deleting existing images --}}
        <form id="deleteImageForm" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection

@push('custom-scripts')
    <script>
        $(function() {
            // Submit button spinner
            $('.submit-button').on('click', function() {
                $(this).prop('disabled', true)
                    .find('.spinner-border').removeClass('d-none');
                $(this).closest('form').submit();
            });
        });
    </script>

    {{-- Image upload preview script --}}
    <script>
        const ALLOWED_IMAGE_TYPES = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        const ALLOWED_EXTENSIONS = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        const MAX_FILE_SIZE = 2 * 1024 * 1024; // 2MB

        function imageUpload(input) {
            const id = input.id;
            const file = input.files[0];
            const errorBox = $('.' + id + 'error');

            if (!file) return;

            // Validate file type
            if (!validateImageFile(file)) {
                errorBox.html('Please select a valid image (JPG, PNG, GIF, WEBP)').show();
                resetImage(id);
                return;
            }

            // Validate file size
            if (file.size > MAX_FILE_SIZE) {
                errorBox.html('Image size must not exceed 2MB').show();
                resetImage(id);
                return;
            }

            errorBox.hide();
            readURL(input, id);
            $('#' + id + 'Delete').removeClass('d-none');
        }

        function validateImageFile(file) {
            // Check MIME type
            if (!ALLOWED_IMAGE_TYPES.includes(file.type)) {
                return false;
            }

            // Also check extension for extra validation
            const ext = file.name.split('.').pop().toLowerCase();
            return ALLOWED_EXTENSIONS.includes(ext);
        }

        function handleMultipleImages(input) {
            const files = input.files;
            const errorBox = $('.product_imageserror');
            const previewContainer = $('#imagesPreviewContainer');

            if (!files || files.length === 0) {
                previewContainer.html('');
                $('#product_imagesPreview').addClass('d-none');
                return;
            }

            previewContainer.html('');
            let validFilesCount = 0;
            let errorMessages = [];

            // Process each file for validation and preview
            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                // Validate file type
                if (!validateImageFile(file)) {
                    errorMessages.push(`${file.name} - Invalid file type`);
                    continue;
                }

                // Validate file size
                if (file.size > MAX_FILE_SIZE) {
                    errorMessages.push(`${file.name} - Exceeds 2MB limit`);
                    continue;
                }

                validFilesCount++;
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imageItem = `
                    <div class="col-lg-3 col-md-4 col-6 gallery-image-item">
                        <div class="gallery-image-wrapper">
                            <img src="${e.target.result}" class="img-fluid rounded" alt="Preview">
                            <div class="gallery-image-overlay">
                                <span class="image-number">${validFilesCount}</span>
                            </div>
                        </div>
                    </div>
                `;
                    previewContainer.append(imageItem);
                };
                reader.readAsDataURL(file);
            }

            // Display error messages if any
            if (errorMessages.length > 0) {
                errorBox.html('<i class="ri-alert-line me-1"></i>' + errorMessages.join('<br>')).show();
            } else {
                errorBox.hide();
            }

            // Update badge and show/hide preview section
            if (validFilesCount > 0) {
                $('#imageCountBadge').text(validFilesCount);
                $('#product_imagesPreview').removeClass('d-none');
            } else {
                $('#product_imagesPreview').addClass('d-none');
            }
        }

        function deleteExistingImage(btn, imageId) {
            if (confirm('Are you sure you want to delete this image?')) {
                // Remove from UI
                $(btn).closest('.existing-image-item').fadeOut(300, function() {
                    $(this).remove();
                });

                // Send delete request via AJAX
                $.ajax({
                    url: "{{ route('product-images.destroy', ':id') }}".replace(':id', imageId),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function() {
                        console.log('Image deleted successfully');
                    },
                    error: function(xhr) {
                        alert('Error deleting image');
                        location.reload();
                    }
                });
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

        // Drag and drop support for gallery upload
        $(document).ready(function() {
            const galleryUploadLabel = $('.gallery-upload-label');
            const fileInput = $('#product_images');

            galleryUploadLabel.on('dragover dragenter', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).addClass('dragover');
            });

            galleryUploadLabel.on('dragleave dragend', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).removeClass('dragover');
            });

            galleryUploadLabel.on('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).removeClass('dragover');

                const files = e.originalEvent.dataTransfer.files;
                fileInput[0].files = files;
                handleMultipleImages(fileInput[0]);
            });
        });
    </script>
@endpush
