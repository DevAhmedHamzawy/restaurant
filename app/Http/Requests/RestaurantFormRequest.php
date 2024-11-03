<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantFormRequest extends FormRequest
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
        $rules =  [
            'category_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'delivery_time' => 'required|numeric',
            'delivery_fees' => 'required|numeric',
            'description' => 'required',
        ];

        $custom = [
            'main_image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'main_cover' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'latlng' => 'required'
        ];

        $customOne = [
            'main_image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'main_cover' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ];

        if ($this->method() == 'POST') { $rules = array_merge($rules, $custom); }

        if ($this->method() == 'PUT') { $rules = array_merge($rules, $customOne); }

        return $rules;
    }
}
