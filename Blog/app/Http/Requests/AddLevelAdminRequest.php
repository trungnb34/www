<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddLevelAdminRequest extends FormRequest
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
            'level_name' => 'required|unique:level,level_name',
            'level'      => 'required|integer',
            'status_show'=> 'required'
        ];
    }
    public function messages()
    {
        return [
            'level_name.required' => 'Nhập tên level',
            'level_name.unique'   => 'Tên level đã bị trùng',
            'level.required'      => 'Nhập level',
            'level.integer'       => 'Bạn nhập đúng định dạnh level',
            'status_show.required'=> 'Bạn chọn cách hiển thị'
        ];
    }
}
