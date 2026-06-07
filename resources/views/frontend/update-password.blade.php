@extends('frontend.layouts.app')
@section('title', 'Update Password')
@section('content')

    <div class="update-password">
  
        <div class="card mb-3">
            <div class="card-body">
                <div class="text-center">
                    <img src="{{asset('img/security.png')}}" alt="">
                </div>
                <div class="form-group">
                    <label for="">Old Password</label>
                    <input type="password" name="old_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">New Password</label>
                    <input type="password" name="new-password" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-theme btn-block mt-5">Update Password</button>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        
    });
</script>
@endsection