<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //id ကိုခေါ်ပေးနိုင်။ resource ထဲက နာမည်ပြန်သုံးလို့ရ။
        $id = $this->route('user');
       return [
            //ကိုယ့် id ကို ထည့်မတွက်အောင်ပေး။
            'name'=>'required',
            'email'=>'required|email|unique:users,email,' .$id,
            'phone'=>'required|unique:users,phone,'.$id,
            
        ];
    }
}
