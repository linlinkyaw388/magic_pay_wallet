
@extends('backend.layouts.app')
@section('title','Edit Admin Users')

@section('admin-user-active','mm-active')

@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Edit Admin Users</div>
        </div>
                               
    </div>
</div>


<div class="content pt-3">
    <div class="card">
        <div class="card-body">

            @include('backend.layouts.flash')

            <form action="{{route('admin.admin-user.update',$admin_user->id)}}" method="POST" id="update">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$admin_user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$admin_user->email}}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{$admin_user->phone}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password">
                </div>

                <div class="d-flex justify-content-center">
                    <button class="btn btn-secondary mr-2 back-btn">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')

{!! JsValidator::formRequest('App\Http\Requests\UpdateAdminUser','#update') !!}

 <script>
    $(document).ready(function () {
        $('.btn-close').on('click',function(){
            $(this).parent().parent().hide();
        })
    });
 </script>
@endsection