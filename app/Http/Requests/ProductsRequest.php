<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $product =  $this->route()->parameter('product');

        $rules = [
            'title' => 'required',
            'categories' => 'required',
            'slug' => 'required|unique:products',
            'price' => 'required',
            'file' => 'image',
            'votes_valoration' => 'required',
            'total_votes' => 'required',
        ];

        if($product){
            $rules['slug'] = 'required|unique:products,slug,' . $product->id;
        }

     


        return $rules;
    }
}
