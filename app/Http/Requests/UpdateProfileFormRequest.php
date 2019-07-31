<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileformRequest extends FormRequest
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
        $id = auth()->user()->id;
        $email = auth()->user()->email;

        return [
            'name'      => 'required|string|max:255',
            'email'     => "required|string|email|max:255|unique:users,email,{$id},id",
            'current_password' => 'required_with:password',
            'password' => 'nullable|min:6|confirmed',
            'image'     => 'image'
        ];
    }
}
