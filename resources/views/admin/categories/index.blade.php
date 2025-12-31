@extends('admin.app')
@section('title')
    Category
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
                            <div class="table-title">Category</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Category</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{ route('categories.index') }}" class="add-new">Category <i class="ms-1 ri-add-line"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table w-100" id="category-table">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">Name</th>
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
                <form action="{{ isset($category) ? route('categories.update', ['category' => $category->id]) : route('categories.store') }}" method="POST" autocomplete="off">
                    @csrf
                    @if(isset($category)) @method('PUT') @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="card table-card">
                                <div class="card-header table-header">
                                    <div class="title-with-breadcrumb">
                                        <div class="table-title">Category Form</div>
                                    </div>
                                    <button type="submit" class="btn add-new">
                                        {{ isset($category) ? 'Update' : 'Save' }}
                                        <span class="ms-1 spinner-border spinner-border-sm d-none" role="status"></span>
                                    </button>
                                </div>
                                <div class="card-body custom-form">
                                    <div class="row">
                                        {{-- Name --}}
                                        <div class="col-md-12 mb-3">
                                            <label for="name" class="form-label custom-label">Category Name</label>
                                            <input type="text" class="form-control custom-input" name="name" id="name"
                                                value="{{ isset($category) ? $category->name : old('name') }}"
                                                placeholder="Category Name">
                                            @error('name')
                                                <div class="error_msg">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Description --}}
                                        <div class="col-md-12 mb-3">
                                            <label for="description" class="form-label custom-label">Description</label>
                                            <textarea name="description" id="description" rows="3" class="form-control custom-input" placeholder="Description">{{ isset($category) ? $category->description : old('description') }}</textarea>
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
        const listUrl = "{{ route('categories.index') }}";
        $(document).ready(function () {
            $('#category-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: listUrl,
                columns: [
                    { data: 'id' },
                    { data: 'name', name: 'name', orderable: true, searchable: true },
                    { data: 'description', name: 'description', orderable: false, searchable: true },
                    {
                        data: 'action-btn',
                        orderable: false,
                        render: function (data) {
                            var btns = '';
                                btns += '<div class="action-btn">';

                                btns += '<a href="' + SITEURL + '/dashboard/categories/' + data + '/edit" title="Edit" class="btn btn-edit"><i class="ri-edit-line"></i></a>';

                                btns += '<form action="' + SITEURL + '/dashboard/categories/' + data + '" method="POST" style="display: inline;" onsubmit="return confirm(\'Are you sure to delete this category?\');">' +
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
