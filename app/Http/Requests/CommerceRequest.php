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
            'description' => 'required',
            'validate' => 'required',
            'categories' => 'required',
            'file' => 'image'
        ];

        if ($commerce) {
            $rules['slug'] ='required|unique:commerces,slug,' . $commerce->id;
        }

        if($this->validate == 2){
            $rules = array_merge($rules,[
                'status' => 'required'
            ]);
        }
        return $rules;
    }
}
