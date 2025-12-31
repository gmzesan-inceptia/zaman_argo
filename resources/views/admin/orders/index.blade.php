@extends('admin.app')

@section('title', 'Manage Orders')

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
                        <div class="table-title">Manage Orders</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Orders</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card-body" style="overflow-x: auto">
                    <table class="table dataTable w-100" id="orders-table" style="min-width: 1000px;">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Payment Method</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Date</th>
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
        const listUrl = "{{ route('orders.index') }}";
        $(document).ready(function () {
            $('#orders-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: listUrl,
                columns: [
                    { data: 'id', name: 'id', orderable: true, searchable: true },
                    { data: 'customer_name', name: 'customer_name', orderable: true, searchable: true },
                    { data: 'product_title', name: 'product_title', orderable: true, searchable: true },
                    { data: 'quantity', name: 'quantity', orderable: true, searchable: false },
                    { data: 'payment_method', name: 'payment_method', orderable: true, searchable: true },
                    { data: 'total_price', name: 'total_price', orderable: true, searchable: false },
                    { data: 'status', name: 'status', orderable: true, searchable: true },
                    { data: 'created_at', name: 'created_at', orderable: true, searchable: false },
                    {
                        data: 'action-btn',
                        orderable: false,
                        searchable: false,
                        render: function (data) {
                            var btns = '';
                            btns += '<div class="action-btn">';
                            btns += '<a href="' + SITEURL + '/dashboard/orders/' + data.id + '" title="View" class="btn btn-show"><i class="ri-eye-line"></i></a>';
                            btns += '</div>';
                            return btns;
                        }
                    }
                ],
                columnDefs: [
                    {
                        targets: 4,
                        render: function (data) {
                            if (data === 'manual-bkash') {
                                return '<span class="badge bg-primary">Bkash/Nagad</span>';
                            } else if (data === 'cod') {
                                return '<span class="badge bg-warning">Cash on Delivery</span>';
                            } else {
                                return '<span class="badge bg-secondary">' + data + '</span>';
                            }
                        }
                    },
                    {
                        targets: 5,
                        render: function (data) {
                            return 'BDT ' + new Intl.NumberFormat('en-US').format(data);
                        }
                    },
                    {
                        targets: 6,
                        render: function (data) {
                            if (data === 'pending') {
                                return '<span class="badge bg-warning text-dark">Pending</span>';
                            } else if (data === 'confirmed') {
                                return '<span class="badge bg-info">Confirmed</span>';
                            } else if (data === 'shipped') {
                                return '<span class="badge bg-primary">Shipped</span>';
                            } else if (data === 'delivered') {
                                return '<span class="badge bg-success">Delivered</span>';
                            } else if (data === 'cancelled') {
                                return '<span class="badge bg-danger">Cancelled</span>';
                            } else {
                                return '<span class="badge bg-secondary">' + data + '</span>';
                            }
                        }
                    },
                    {
                        targets: 7,
                        render: function (data) {
                            return new Date(data).toLocaleDateString('en-US', {
                                year: 'numeric',
                                month: 'short',
                                day: 'numeric'
                            });
                        }
                    }
                ]
            });
        });
    </script>
@endpush
