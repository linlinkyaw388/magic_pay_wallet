<?php

namespace App\Http\Controllers\Backend;

use App\AdminUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminUser;
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
        return DataTables::of($data)->make(true);
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
}
