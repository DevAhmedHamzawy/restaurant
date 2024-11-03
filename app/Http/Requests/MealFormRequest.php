<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealFormRequest extends FormRequest
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
            'tag_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'main_image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'features*' => 'required',
            'ingredients*' => 'required',
            'sizes*' => 'required',
            'options*' => 'required',
            'drinks*' => 'required',
            'sides*' => 'required',
        ];
    }
}
