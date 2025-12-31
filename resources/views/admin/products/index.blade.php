@extends('admin.app')
@section('title') Products @endsection

@push('custom-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
@endpush

@section('content')
<div class="container-fluid my-3">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">Products</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Products</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{ route('products.create') }}" class="add-new">Add Product <i class="ms-1 ri-add-line"></i></a>
                </div>
                <div class="card-body" style="overflow-x: auto">
                    <table class="table dataTable w-100" id="product-table" style="min-width: 900px;">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Product Title</th>
                                <th>Category</th>
                                <th>Tag</th>
                                <th>Unit</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Old Price</th>
                                <th>New Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script>
        const listUrl = "{{ route('products.index') }}";
        $(document).ready(function () {
            $('#product-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: listUrl,
                columns: [
                    { data: 'id' },
                    { data: 'title', name: 'title', orderable: true, searchable: true },
                    { data: 'category_id', name: 'category_id', orderable: true, searchable: true },
                    { data: 'tag', name: 'tag', orderable: true, searchable: true },
                    { data: 'unit', name: 'unit', orderable: true, searchable: true },
                    { data: 'description', name: 'description', orderable: false, searchable: true },
                    {
                        data: 'image',
                        render: function (data) {
                            return '<img src="' + data + '" alt="Product Image" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">';
                        },
                        orderable: false,
                        searchable: false
                    },
                    { data: 'old_price', name: 'old_price' },
                    { data: 'new_price', name: 'new_price' },
                    {
                        data: 'action-btn',
                        orderable: false,
                        render: function (data) {
                            console.log(data);
                            var btns = '';
                                btns += '<div class="action-btn">';

                                btns += '<a href="' + SITEURL + '/dashboard/products/' + data.id + '/edit" title="Edit" class="btn btn-edit"><i class="ri-edit-line"></i></a>';

                                btns += '<a href="' + SITEURL + '/dashboard/products/' + data.slug + '/show" title="View" class="btn btn-show"><i class="ri-eye-line"></i></a>';



                                btns += '<form action="' + SITEURL + '/dashboard/products/' + data.id + '" method="POST" style="display: inline;" onsubmit="return confirm(\'Are you sure to delete this product?\');">' +
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
