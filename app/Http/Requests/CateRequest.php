<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CateRequest extends Request
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
            //tham so truyen vao unique: cates: ten bang, name: truong name
            //'name' => 'required',
            //'name' => 'unique:cates'
        ];
    }

    public function messages(){
        return [
           // 'name.required' => 'please enter name category',
           // 'name.unique' => 'This name category is existsed'
        ];
    }
}
