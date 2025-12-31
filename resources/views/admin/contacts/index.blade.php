@extends('admin.app')
@section('title')
    Contacts
@endsection

@push('custom-style')
    {{-- Datatable CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
@endpush

@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Contact Messages</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contacts</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table w-100" id="contact-table">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
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
        const listUrl = "{{ route('contacts.index') }}";
        $(document).ready(function () {
            $('#contact-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: listUrl,
                order: [[0, 'desc']],
                columns: [
                    { data: 'id' },
                    { data: 'name', name: 'name', orderable: true, searchable: true },
                    { data: 'email', name: 'email', orderable: true, searchable: true },
                    { data: 'phone', name: 'phone', orderable: true, searchable: true },
                    { data: 'subject', name: 'subject', orderable: true, searchable: true },
                    { 
                        data: 'message', 
                        name: 'message', 
                        orderable: false, 
                        searchable: true,
                        render: function(data) {
                            if (data.length > 50) {
                                return data.substr(0, 50) + '...';
                            }
                            return data;
                        }
                    },
                    { data: 'created_at', name: 'created_at', orderable: true, searchable: false },
                    {
                        data: 'action-btn',
                        orderable: false,
                        render: function (data) {
                            var btns = '';
                            btns += '<div class="action-btn">';

                            btns += '<form action="' + SITEURL + '/dashboard/contacts/' + data + '" method="POST" style="display: inline;" onsubmit="return confirm(\'Are you sure to delete this message?\');">' +
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
