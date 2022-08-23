<?php

namespace App\Http\Requests;

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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:150',
            'phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'email' => 'email|required',
            'm_address' => 'required|string|max:500',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Email không được để trống',
            'phone.required' => 'Số điện thoại qua dài!',
            'email.email' => 'Email không đúng định dạng ',
        ];
    }
}
