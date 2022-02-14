<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'email' =>'required|string|min:3|max:255|unique:users',
            'password' =>'required|string|min:7|max:32',
            'first_name'=>['max:32','required'],
            'last_name'=>['max:32'],
        ];
    }

    public function attributes()
    {
        return [
          'name' =>'Your Name',
        ];
    }
    public function messages()
    {
        return [
          'email.required' =>'Field "E-mail" is required',
          'email.string' =>'Filed "E-mail" must be of string type'
        ];
    }
}
