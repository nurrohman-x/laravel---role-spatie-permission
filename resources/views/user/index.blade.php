@extends('layouts.index')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Data Users</h4>
    <div class="card">
        <h5 class="card-header">Data user</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="table-user" style="width: 100%;">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('style')
<link rel="stylesheet" href="{{ url('assets') }}/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="{{ url('assets') }}/css/select.bootstrap5.min.css">

@endpush

@push('script')
<script src="{{ url('assets') }}/js/jquery.dataTables.min.js"></script>
<script src="{{ url('assets') }}/js/dataTables.bootstrap5.min.js"></script>
<script>
    let table;
    $(function() {
        table = $('#table-user').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: "{{ route('user.data') }}"
            },
            columns: [{
                data: 'name'
            }, {
                data: 'email'
            }, {
                data: 'role'
            }, {
                data: 'status'
            }, {
                data: 'action',
                searchable: false,
                sortable: false
            }]
        });
    });

    function updateStatus(url) {
        if (confirm('Yakin ingin mengubah data terpilih?')) {
            $.post(url, {
                '_token': $('[name=csrf-token]').attr('content'),
                '_method': 'post'
            }).done((response) => {
                table.ajax.reload();
            }).fail((errors) => {
                alert('Tidak dapat menghapus data');
                return;
            });
        }
    }
</script>
@endpush