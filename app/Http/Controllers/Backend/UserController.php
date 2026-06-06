<?php

namespace App\Http\Controllers\Backend;

use App\AdminUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminUser;
use App\Http\Requests\UpdateAdminUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Agent;
use Symfony\Component\VarDumper\Cloner\Data;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(){
        return view('backend.user.index');
    }

    public function ssd(){
        $data = User::query();

        return DataTables::of($data)
        ->editColumn('user_agent',function($each){
            if($each->user_agent){
                $agent = new Agent();

                $agent->setUserAgent($each->user_agent);
                $device = $agent->device();
                $platform = $agent->platform();
                $browser = $agent->browser();

                // return $device->name.' '.$platform->name.' '.$browser->name;
                return '<table class="table table-bordered">
                <tbody>
                <tr><td>Device</td><td>'.$device.'</td></tr>
                <tr><td>Platform</td><td>'.$platform.'</td></tr>
                <tr><td>Browser</td><td>'.$browser.'</td></tr>
                </tbody>
                </table>';
            }
            return '-';
        })
        ->editColumn('created_at',function($each){
            return Carbon::parse($each->created_at)->format('Y-m-d H:i:s');
        })
        ->editColumn('updated_at',function($each){
            return Carbon::parse($each->updated_at)->format('Y-m-d H:i:s');
        })
        ->addColumn('action', function ($each) {
          $edit_icon = '<a href="'.route('admin.user.edit',$each->id).'" class="text-warning"><i class="fa fa-edit"></i></a>';
          $delete_icon = '<a href="#" class="text-danger delete" data-id="'.$each->id.'"><i class="fa fa-trash"></i></a>';
          return '<div class="action-icon">'. $edit_icon.$delete_icon . '</div>';
        })
        ->rawColumns(['user_agent','action'])//datable က html တွေသုံးချင်ရင် row Column ထဲမှာ action ဆိုပြီးပေးဖို့လို။
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
