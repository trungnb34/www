<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditMenuAdminRequest extends FormRequest
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
            'name_menu' => 'required',
            'status_show' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name_menu.required' => 'Nhập tên menu',
            'status_show.required'  => 'Chọn kiểu hiển thị',
        ];
    }
}
