<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommerceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
       return true;
       
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {


        $commerce = $this->route()->parameter('commerce');

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:commerces',
            'license' => 'required',
            'location' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'status' => 'required|in:1,2',
            'file' => 'image'
        ];

        if ($commerce) {
            $rules['slug'] ='required|unique:commerces,slug,' . $commerce->id;
        }

        return $rules;
    }
}
