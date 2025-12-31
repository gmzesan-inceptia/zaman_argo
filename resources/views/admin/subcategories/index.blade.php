@extends('admin.app')
@section('title')
    Subcategory
@endsection

@push('custom-style')
    {{-- Datatable CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
@endpush

@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            {{-- Left Side: DataTable --}}
            <div class="col-7">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Subcategory</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Subcategory</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{ route('subcategories.index') }}" class="add-new">Subcategory <i class="ms-1 ri-add-line"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table w-100" id="subcategory-table">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Right Side: Form --}}
            <div class="col-5">
                <form action="{{ isset($subcategory) ? route('subcategories.update', ['subcategory' => $subcategory->id]) : route('subcategories.store') }}" method="POST" autocomplete="off">
                    @csrf
                    @if(isset($subcategory)) @method('PUT') @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="card table-card">
                                <div class="card-header table-header">
                                    <div class="title-with-breadcrumb">
                                        <div class="table-title">Subcategory Form</div>
                                    </div>
                                    <button type="submit" class="btn add-new">
                                        {{ isset($subcategory) ? 'Update' : 'Save' }}
                                        <span class="ms-1 spinner-border spinner-border-sm d-none" role="status"></span>
                                    </button>
                                </div>
                                <div class="card-body custom-form">
                                    <div class="row">
                                        {{-- Category Selection --}}
                                        <div class="col-md-12 mb-3">
                                            <label for="category_id" class="form-label custom-label">Category</label>
                                            <select name="category_id" id="category_id" class="form-select custom-input">
                                                <option value="">-- Select Category --</option>
                                                @foreach($categories as $cat)
                                                    <option value="{{ $cat->id }}" {{ isset($subcategory) && $subcategory->category_id == $cat->id ? 'selected' : '' }}>
                                                        {{ $cat->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="error_msg">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Name --}}
                                        <div class="col-md-12 mb-3">
                                            <label for="name" class="form-label custom-label">Subcategory Name</label>
                                            <input type="text" class="form-control custom-input" name="name" id="name"
                                                value="{{ isset($subcategory) ? $subcategory->name : old('name') }}"
                                                placeholder="Subcategory Name">
                                            @error('name')
                                                <div class="error_msg">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Description --}}
                                        <div class="col-md-12 mb-3">
                                            <label for="description" class="form-label custom-label">Description</label>
                                            <textarea name="description" id="description" rows="3" class="form-control custom-input" placeholder="Description">{{ isset($subcategory) ? $subcategory->description : old('description') }}</textarea>
                                            @error('description')
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
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script>
        const listUrl = "{{ route('subcategories.index') }}";
        $(document).ready(function () {
            $('#subcategory-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: listUrl,
                columns: [
                    { data: 'id' },
                    { data: 'name', name: 'name', orderable: true, searchable: true },
                    { data: 'category_id', name: 'category_id', orderable: true, searchable: true },
                    { data: 'description', name: 'description', orderable: false, searchable: true },
                    {
                        data: 'action-btn',
                        orderable: false,
                        render: function (data) {
                            var btns = '';
                                btns += '<div class="action-btn">';

                                btns += '<a href="' + SITEURL + '/dashboard/subcategories/' + data + '/edit" title="Edit" class="btn btn-edit"><i class="ri-edit-line"></i></a>';

                                btns += '<form action="' + SITEURL + '/dashboard/subcategories/' + data + '" method="POST" style="display: inline;" onsubmit="return confirm(\'Are you sure to delete this sub-category?\');">' +
                                    '@csrf' +
                                    '@method("DELETE")' +
                                    '<button type="submit" class="btn btn-delete"><i class="ri-delete-bin-2-line"></i></button>' +
                                '</form>';

                            btns += '</div>';
                            return btns;
                        }
                    }
                ]
            });
        });
    </script>
@endpush
