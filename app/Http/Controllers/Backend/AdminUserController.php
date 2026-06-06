<?php

namespace App\Http\Controllers\Backend;

use App\AdminUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminUser;
use App\Http\Requests\UpdateAdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\Cloner\Data;
use Yajra\DataTables\DataTables;

class AdminUserController extends Controller
{
    public function index(){
        return view('backend.admin_user.index');
    }

    public function ssd(){
        $data = AdminUser::query();
        return DataTables::of($data)
        ->addColumn('action', function ($each) {
          $edit_icon = '<a href="'.route('admin.admin-user.edit',$each->id).'" class="text-warning"><i class="fa fa-edit"></i></a>';
          $delete_icon = '<a href="#" class="text-danger delete" data-id="'.$each->id.'"><i class="fa fa-trash"></i></a>';
          return '<div class="action-icon">'. $edit_icon.$delete_icon . '</div>';
        })
        ->make(true);
    }

    public function create(){
        return view('backend.admin_user.create');
    }

    public function store(StoreAdminUser $request){
        // return $request->all();
        // $this->validate($request,[
        //     'name'=>'required',
        //     'email'=>'required|email',
        //     'phone'=>'required|numeric',
        // ]);
        // AdminUser::create($request->all());
        // return redirect()->route('admin.admin-user.index')->with('success','Admin User Created Successfully');
        $admin_user = new AdminUser();
        $admin_user->name = $request->name;
        $admin_user->email = $request->email;
        $admin_user->phone = $request->phone;
        $admin_user->password = Hash::make($request->password);
        $admin_user->save();
        return redirect()->route('admin.admin-user.index')->with('create','Admin User Created Successfully');
    }

    public function edit($id){
        $admin_user = AdminUser::findorFail($id);
        return view('backend.admin_user.edit',compact('admin_user'));
    }

    public function update($id , UpdateAdminUser $request){

        $admin_user = AdminUser::findorFail($id);
        $admin_user->name = $request->name;
        $admin_user->email = $request->email;
        $admin_user->phone = $request->phone;
        $admin_user->password = $request->password ? Hash::make($request->password) : $admin_user->password;
        $admin_user->update();
        return redirect()->route('admin.admin-user.index')->with('update','Admin User Update Successfully');
    }
    //'disable_remote_validation' => true,

    public function destroy($id){
        $admin_user = AdminUser::findorFail($id);
        $admin_user->delete();
        return 'success';
    }
}
