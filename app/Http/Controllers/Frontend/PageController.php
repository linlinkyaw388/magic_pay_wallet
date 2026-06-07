<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function home(){
        return view('frontend.home');
    }

    public function profile(){
        $user = Auth::guard('web')->user();
        return view('frontend.profile',compact('user'));
    }

    public function updatePassword(){
        return view('frontend.update-password');
    }

    public function updatePasswordStore(UpdatePassword $requet){

        $old_password = $requet->old_password;      
        $new_password = $requet->new_password;
        $user = Auth::guard('web')->user();

        if(Hash::check($old_password, $user->password)){
            $user->password = Hash::make($new_password);
            $user->update();
            return redirect()->route('profile')->with('update', 'Password updated successfully');
        }else{
            // return redirect()->route('update-password')->with('error', 'Old password is not correct');
            return back()->withErrors(['old_password' => 'Old password is not correct'])->withInput();  //input ပါမှ old နှင့်ရိုက်ပြီးသား data ပြန်ဖမ်းလို့ရ။
        }
    }
}
