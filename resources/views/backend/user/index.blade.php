
@extends('backend.layouts.app')
@section('title','Users')

@section('user-active','mm-active')

@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Users</div>
        </div>
                               
    </div>
</div>

<div class="py-3">
    <a href="{{route('admin.user.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create User</a>
</div>

<div class="content pt-3">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered Datatables">
                <thead>
                    <tr class="bg-light">
                        <th>Name</th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>Ip</th>
                        <th>User agent</th>
                        <th>Login At</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')

 <script>
    $(document).ready(function () {
        var table = $('.Datatables').DataTable({
             ajax: '/admin/user/datatable/ssd',
             processing: true,
             serverSide: true,
            //  columns: [
            //      { data: 'name' },
            //      { data: 'email' },
            //      { data: 'phone' },
            //  ]
             columns:[
                {
                    data:'name',
                    name:'name'
                },
                {
                    data:'email',
                    name:'email'
                },
                {
                    data:'phone',
                    name:'phone'
                },
                {
                    data:'ip',
                    name:'ip'
                },
                {
                    data:'user_agent',
                    name:'user_agent'
                },
                {
                    data:'login_at',
                    name:'login_at'
                },
                {
                    data:'created_at',
                    name:'created_at'
                },
                {
                    data:'updated_at',
                    name:'updated_at'
                },
                {
                    data:'action',
                    name:'action',
                    searchable:false,
                }
             ],
             order:[[6,'desc']],
             columnDefs: [
            { targets: 1, sortable: false},
            ]
        });

        //document.getElementById('delete').addEventListener('click',function(e){
        //    e.preventDefault();
        //})
        $(document).on('click','.delete',function(e){
            e.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
            title: "Are you sure.You want to delete this user?",
            showCancelButton: true,
            confirmButtonText: "Confirm",
            }).then((result) => {
             if (result.isConfirmed){
                $.ajax({
                    url : '/admin/user/'+id,
                    type : 'DELETE',
                    success : function(){
                        table.ajax.reload();
                    }
                })
             }
            });
        })
    });
 </script>
@endsection