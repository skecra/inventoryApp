<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return [
            "name"=> "required|min:3|max:255",
            "email"=> "required|min:3|max:255|email",
            "password"=> "required|min:8|max:255|alpha_num",
            'position_id' => 'required|exists:positions,id',
            
        ];
    }

    public function validated(){
        $validated = $this->validate($this->rules());
        $validated['password'] = Hash::make($validated['password']);
        return $validated;
        }
}
