<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhotoRequest extends FormRequest
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
            "name" => "required" ,//|mimes:JPEG,JPG,bmp,PNG
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'no photo is selected',
            'displayName.required'=>'Please Enter Name Photo',
            'name.mimes'=>'the select file not a valid file',
        ];
    }
}
