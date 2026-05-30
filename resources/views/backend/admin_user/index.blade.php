
@extends('backend.layouts.app')
@section('title','Admin Users')

@section('admin-user-active','mm-active')

@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Admin Users</div>
        </div>
                               
    </div>
</div>

<div class="content">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered Datables">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>phone</th>
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
        $('.Datables').DataTable({
             ajax: '/admin/admin-user/datatable/ssd',
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
                }
             ]
             
        });
    });
 </script>
@endsection